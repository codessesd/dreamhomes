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
    {
      $member = Member::find(request()->id);
      $admin = Admin::find(auth()->user()->id);
      $requestKeys = array_keys($request->all());
      $message = 'Something went wrong!';
      $entities = ['miscs','members','next_of_kin'];
      foreach($entities as $entity){
        $arrayToSave = [];
        $writePermissions = $admin->permissions->where('type','write')->where('entity',$entity)->pluck('attribute')->all(); 
        $requestArray = ($request[$entity] == null) ? [] : $request[$entity];
        $arrayToSave = array_intersect_key($requestArray, array_flip($writePermissions));

        if(!empty($arrayToSave)){
          $message = 'Something went wrong...!';
          $editor['processed_by'] = $admin->id;
          switch($entity){
            case 'miscs':
              $arrayToSave['processed_by'] = $admin->id;
              $member->misc->update($arrayToSave);
              $message = 'Save Successful!';
              break;
            case 'members':
              $member->update($arrayToSave);
              break;
            case 'next_of_kin':
              $member->next_of_kin->updateOrCreate($arrayToSave);
              break;
            default:
              break;
          }
        }
      }
      return $message;
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
      return view('dashboard.member',compact('member'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //return view('app_step1');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
