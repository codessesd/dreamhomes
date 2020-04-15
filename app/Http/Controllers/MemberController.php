<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Schema;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {//I need to look over this update function. It's not as crisp as I want it to be. Something just doesn't feel right
      $member = Member::find(request()->id);
      $admin = Admin::find(auth()->user()->id);
      $requestKeys = array_keys($request->all());
      $message = 'No Permissions Granted!';
      $entities = ['miscs','members','next_of_kin','beneficiaries','areas'];
      /*
       * $entities are databases and should be written as database names because that's how they're stored in the permissions table
       * therefore the code, where('entity',$entity), for retrieving permissions will be able to work as supposed to.
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
              $arrayToSave['processed_by'] = $admin->id;//This seems redundant but the statement below has the potential to change this value so I must ensure that it remains $admin->id
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

    public function delete()
    {

    }

    public function all()
    {
      $members = Member::all();
      $processedBy = Admin::select('id','name','surname')->get()->keyBy('id')->toArray();
      return view('dashboard.members',compact('members','processedBy'));
    }

    public function showOne($id)
    {
      $member = Member::find($id);
      return view('dashboard.member_details',compact('member'));
    }

    public function completed()
    {
      $members = Member::where('status','completed');
      return view('dashboard.members',compact('members'));
    }

    public function pending()
    {
      $members = Member::where('status','incomplete');
      return view('dashboard.members',compact('members'));
    }
    public static function status()
    {
      return [
        'in'=>'incomplete',
        're'=>'review',
        'ap'=>'approved',
        'at'=>'attention',
        'bl'=>'blocked',
      ];
    }

    public function removeBeneficiary($memId,$benefId)
    {
      $member = Member::find($memId);
      $admin = Admin::find(auth()->user()->id);
      $delPermission = $admin->permissions->where('type','delete')->where('entity','beneficiaries');
      if($delPermission->isNotEmpty())
        $member->beneficiaries()->where('id',$benefId)->first()->delete();
      //else
        //return response()->json(['']);
    }

    public function removeArea($memId,$areaId)
    {
      $member = Member::find($memId);
      $admin = Admin::find(auth()->user()->id);
      $delPermission = $admin->permissions->where('type','delete')->where('entity','areas');
      if($delPermission->isNotEmpty())
        $member->areas()->where('id',$areaId)->first()->delete();
    }

}