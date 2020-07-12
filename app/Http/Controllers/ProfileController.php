<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Member;

class ProfileController extends Controller
{
  public function show()
  {
    $member = Member::find(auth()->user()->id);
    $home_address = $member->home_address;
    $post_address = $member->post_address;
    $nextOfKin = $member->next_of_kin;
    $beneficiaries = $member->beneficiaries;
    return view('edit_profile',compact('member','home_address','post_address','nextOfKin','beneficiaries'));
  }

  public function save(Request $request)
  {
    $member = Member::find(auth()->user()->id);

    $validateMember = Validator::make($request->member,[
      'title'=>'required',
      'initials'=>'required',
      'cell_number' => 'required',
    ]);
    if($validateMember->fails())
      return redirect('/edit_profile')->withErrors($validateMember);

    $validateHomeAddress = Validator::make($request->home_address,[
      'addr_line1' => 'required',
      'suburb' => 'required',
      'city' => 'required',
      'area_code' => 'required',
    ],[
      'addr_line1.required'=>'Physical Address line 1 is required',
    ]);
    if($validateHomeAddress->fails())
      return redirect('/edit_profile')->withErrors($validateHomeAddress);

    //Validate Post Address--------------------------------------------
    $validatePostAddress = Validator::make($request->post_address,[
      'post_line1' => 'required',
      'post_code' => 'required',
    ],[
      'post_line1.required'=>'Postal address is required',
    ]);
    if($validatePostAddress->fails())
      return redirect('/edit_profile')->withErrors($validatePostAddress);

    //Validate Next Of Kin-----------------------------------------------------
    $validateNextOfKin = Validator::make($request->next_of_kin,[
      'title' => 'required',
      'initials' => 'required',
      'name' => 'required',
      'surname' => 'required',
      'relationship' => 'required',
    ],['address_line_1.required'=>'Address is required']);
    if($validateNextOfKin->fails())
      return redirect('/edit_profile')->withErrors($validateNextOfKin);

    //Add beneficiary
    $beneficiaryPresent = strlen($request->beneficiary['name'])>0 &&
                          strlen($request->beneficiary['surname'])>0 &&
                          strlen($request->beneficiary['relationship'])>0 &&
                          strlen($request->beneficiary['id_number'])>0;
    if($beneficiaryPresent)
      $member->beneficiaries()->create($request->beneficiary);

    $member->update($request->member);
    $member->home_address->update($request->home_address);
    $member->post_address->update($request->post_address);
    $member->next_of_kin->update($request->next_of_kin);

    return redirect('/edit_profile')->withErrors(['success','Profile Saved']);
  }

  public function userDeleteBenef(Request $request)
  {
    $member = Member::find(auth()->user()->id);
    $member->beneficiaries()->where('id',$request->benefId)->first()->delete();
  }

}
