<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Admin;
use App\Misc;
use App\Payment;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {//I need to look over this update function. It's not as crisp as I want it to be. Something just doesn't feel solid
      $member = Member::find(request()->id);
      $admin = Admin::where('user_id',auth()->user()->id)->first();
      $requestKeys = array_keys($request->all());
      $message = 'No Permissions Granted!';
      $entities = ['miscs','members','next_of_kin','beneficiaries','areas'];
      /*
       * $entities are databases and should be written as database names because that's how they're stored in the permissions table
       * therefore the code, where('entity',$entity), for retrieving permissions will work as supposed to.
       * Input names on the form should always follow this structure name="entityName[field]". Otherwise the code foreach($entities as $entity)
       * will not read the input properly.
       */

      foreach($entities as $entity){
        $arrayToSave = [];
        $writePermissions = $admin->permissions->where('type','write')->where('entity',$entity)->pluck('attribute')->all();
        $requestArray = ($request[$entity] == null) ? [] : $request[$entity];
        $arrayToSave = array_intersect_key($requestArray, array_flip($writePermissions));

        if(!empty($arrayToSave)){
          $message = 'Something went wrong...!';
          $member->misc->update(['processed_by'=>$admin->id]);
          switch($entity){
            case 'miscs':
              $arrayToSave['processed_by'] = $admin->id;//This seems redundant but the statement below has the potential to change this value so we should ensure that it remains $admin->id
              $member->misc->update($arrayToSave);
              $message = 'Save Successful!';
              break;
            case 'members':
              $member->update($arrayToSave);
              $message = 'Save Successful!';
              break;
            case 'next_of_kin':
              $member->next_of_kin->updateOrCreate($arrayToSave);
              $message = 'Save Successful!';
              break;
            case 'beneficiaries':
              $allFieldsPresent = ($arrayToSave['name'] != null)&&($arrayToSave['surname'] != null)&&
                                  ($arrayToSave['relationship'] != null)&&($arrayToSave['id_number'] != null);
              if ($allFieldsPresent)
                $member->beneficiaries()->create($arrayToSave);
              $message = 'Save Successful!';
              break;
            case 'areas':
              $allFieldsPresent = ($arrayToSave['municipality'] != null)&&($arrayToSave['area'] != null);
              if ($allFieldsPresent)
                $member->areas()->create($arrayToSave);
              $message = 'Save Successful!';
              break;
            default:
              break;
          }
        }
      }
      return response()->json(["message"=>$message]);
    }

    public function displayRecords($miscs,$listNum,$listName,$view)
    {
      /*
        $listNum: determines which menu item to highlight. Menu items have an if statement that respsonds to this
        $listName: determines what name to be displayed as the name of the view
      */
      $show = session('show',25);
      $pages = $miscs;
      $members = collect([]);
      foreach($miscs as $misc)
      $members = $members->concat([$misc->member]);
      $processedBy = Admin::select('id','name','surname')->get()->keyBy('id')->toArray();
      $allStatus = $this->status();
      array_pop($allStatus);//removes the last item which is called "deleted"
      return view($view,compact('members','processedBy','listName','listNum','allStatus','show','pages'));
    }

    public function all()
    {
      $show = session('show',25);
      $miscs = Misc::where('status','NOT LIKE','deleted|%')->paginate($show);
      return $this->displayRecords($miscs,1,'All Members','dashboard.members');
    }

    public function showOne($id)
    {
      $member = Member::find($id);
      return view('dashboard.member_details',compact('member'));
    }

    public function completed()
    {
      $show = session('show',25);
      $miscs = Misc::where('status',$this->status()['re'])->paginate($show);
      return $this->displayRecords($miscs,2,'Approved','dashboard.members');
    }

    public function pending()
    {
      $show = session('show',25);
      $miscs = Misc::where('status',$this->status()['in'])->paginate($show);
      return $this->displayRecords($miscs,3,'Pending','dashboard.members');
    }

    public function approved()
    {
      $show = session('show',25);
      $miscs = Misc::where('status',$this->status()['ap'])->paginate($show);
      return $this->displayRecords($miscs,4,'Approved','dashboard.members');
    }
    public function deleted()
    {
      $show = session('show',25);
      $miscs = Misc::where('status','LIKE','deleted|%')->paginate($show);
      return $this->displayRecords($miscs,6,'Deleted','dashboard.deleted ');
    }

    public static function status()
    {
      return [
        'in'=>'incomplete',
        're'=>'review',
        'ap'=>'approved',
        'at'=>'attention',
        'bl'=>'blocked',
        'de'=>'deleted'//This item 'deleted' should always be last
      ];
    }

    public function removeBeneficiary($memId,$benefId)
    {
      $member = Member::find($memId);
      $admin = Admin::find(auth()->user()->id);
      $delPermission = $admin->permissions->where('type','delete')->where('entity','beneficiaries');
      if($delPermission->isNotEmpty())
        $member->beneficiaries()->where('id',$benefId)->first()->delete();
    }

    public function removeArea($memId,$areaId)
    {
      $member = Member::find($memId);
      $admin = Admin::find(auth()->user()->id);
      $delPermission = $admin->permissions->where('type','delete')->where('entity','areas');
      if($delPermission->isNotEmpty())
        $member->areas()->where('id',$areaId)->first()->delete();
    }

    public function deleteRow(Request $request)
    {
      $memberMisc = Misc::where('member_id',$request->memberId)->get();
      if($memberMisc->isNotEmpty())
      {
        $memberMisc = $memberMisc->first();
        $previousStatus = $memberMisc->status;
        if(in_array($previousStatus,$this->status()))
          $memberMisc->status = $this->status()['de'].'|'.$previousStatus;
        else
          return response()->JSON(['type'=>'error','message'=>'Problem ecountered while deleting. Please try again.']);
        $memberMisc->save();
        return response()->JSON(['type'=>'success','message'=>'Deleted']);
      }
    }

    public function restoreRow(Request $request)
    {
      $memberMisc = Misc::where('member_id',$request->memberId)->get();
      if($memberMisc->isNotEmpty())
      {
        $memberMisc = $memberMisc->first();
        $previousStatus = explode('|',$memberMisc->status)[1];
        if(in_array($previousStatus,$this->status()))
          $memberMisc->status = $previousStatus;
        else
          return response()->JSON(['type'=>'error','message'=>'Problem ecountered while restoring. Please try again.']);
        $memberMisc->save();
        return response()->JSON(['type'=>'success','message'=>'Restored']);
      }
    }

    public function setShow(Request $request)
    {
      session(['show'=>$request->max]);
    }

    public function referrals(){
      $requiredMiscs = Misc::select('member_id','membership_no','referred_by')->get();
      $referrals = $requiredMiscs->pluck('referred_by');
      $referralsCount = $referrals->countBy()->toArray();
      arsort($referralsCount);
      $top10 = array_splice($referralsCount,0,11);

      return view('dashboard.referrals',compact('top10'));
    }

    public function payments(){
      $show = session('show',25);
      $miscs = Misc::where('status',$this->status()['ap'])->paginate($show);
      return $this->displayRecords($miscs,7,'Approved','dashboard.payments');
    }

    public function savePay(Request $request){
      $validator = Validator::make($request->all(),[
        'id' => 'required',
        'pay_date' => 'required',
        'amount' => 'required'
      ]);

      if ($validator->fails()){
        return response()->json(['message'=>'Error. Some required fileds are not filled']);
      }
      $member = Member::find($request->id);
      $member->payments()->create([
        'pay_date'=>$request->pay_date,
        'amount'=>$request->amount,
        'notes'=>$request->notes,
      ]);

      return response()->json(["message"=>"Payment accepted"]);
    }

    public function deletePay(Request $request){
      $member = Member::find($request->memberId);
      $payment = Payment::find($request->payId);
      //dd($payment);
      $payment['member_id'] = -1*$request->memberId;
      $payment->save();
    }

    public function restorePay(Request $request){
      $payment = Payment::find($request->payId);
      $payment['member_id'] = $request->memberId;
      $payment->save();
    }
}
