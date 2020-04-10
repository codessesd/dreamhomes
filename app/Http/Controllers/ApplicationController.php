<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use symfony\httpfoundation\File;
use App\Member;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
  public function show($step)
  {
    switch ($step)
    {
      case 'step1':
        $member = Member::find(auth()->user()->id);
        $home_address = $member->home_address;
        $post_address = $member->post_address;
        return view('app_step1',compact('member','home_address','post_address'));
        break;
      case 'step2':
        $member = Member::find(auth()->user()->id);
        $nextOfKin = $member->next_of_kin;
        return view('app_step2',compact('nextOfKin'));
        break;
      case 'step3':
        $member = Member::find(auth()->user()->id);
        $beneficiaries = $member->beneficiaries;
        return view('app_step3',compact('beneficiaries'));
        break;
      case 'step4':
        $member = Member::find(auth()->user()->id);
        $areas = $member->areas;
        return view('app_step4',compact('areas'));
        break;
      case 'step5':
        return view('app_step5');
      default:
        return redirect('apply/step1')->withErrors(['Error'=>'Path Not Found']);
    }
  }

  public function save($step, Request $request)
  {
    switch($step)
    {
      case 'step1':
        $member = Member::find(auth()->user()->id);
        //dd($request->member);
        $member->update($request->member);
        $member->home_address()->updateOrCreate(['member_id'=>$member->id],$request->home_address);
        $member->post_address()->updateOrCreate(['member_id'=>$member->id],$request->post_address);
        return redirect('/apply/step2');
        break;
      case 'step2':
        $id = auth()->user()->id;
        $member = Member::find($id);
        $member->next_of_kin()->updateOrCreate(['member_id' => $id],$request->all());
        return redirect('/apply/step3');
        break;
      case 'step3':
        $id = auth()->user()->id;
        $member = Member::find($id);
        $member->beneficiaries()->create($request->all());
        return redirect('/apply/step3');
        break;
      case 'step4':
        $id = auth()->user()->id;
        $member = Member::find($id);
        $member->areas()->create($request->all());
        return redirect('/apply/step4');
        break;
      case 'step5':
        // There is no step 5 instead I used validateInfo
        break;
      default:
        return redirect('apply/step1')->withErrors(['Error'=>'Path Not Found']);
    }
  }

  public function removeBeneficiary($id)
  {
    $member = Member::find(auth()->user()->id);
    $member->beneficiaries()->where('id',$id)->first()->delete();
    return redirect('/apply/step3');
  }

  public function removeArea($id)
  {
    $member = Member::find(auth()->user()->id);
    //dd($id);
    //dd($member->areas()->where('id',$id)->first());
    $member->areas()->where('id',$id)->first()->delete();
    return redirect('/apply/step4');
  }

  public function validateInfo(Request $request)
  {
    $member = Member::find(auth()->user()->id);
    //Validate member
    $validateMember = Validator::make($member->getAttributes(),[
      'title'=>'required',
      'initials'=>'required',
      'f_name'=>'required',
      'surname' => 'required',
      'id_passport_no' => 'required',
      'cell_number' => 'required',
      'marital_status' => 'required',
      'insolvency' => 'required',
      'liquidation' => 'required',
    ],[
      'f_name.required'=>'First name is required',
      'id_passport_no.required'=>'ID or Passport is required',
    ]);
    if($validateMember->fails())
      return redirect('/apply/step1')->withErrors($validateMember);

    $validateHomeAddress = Validator::make($member->home_address->getAttributes(),[
      'addr_line1' => 'required',
      'suburb' => 'required',
      'city' => 'required',
      'area_code' => 'required',
    ],[
      'addr_line1.required'=>'Physical Address line 1 is required',
    ]);
    if($validateHomeAddress->fails())
      return redirect('/apply/step1/')->withErrors($validateHomeAddress);

    //Validate Post Address
    $validatePostAddress = Validator::make($member->post_address->getAttributes(),[
      'post_line1' => 'required',
      'post_code' => 'required',
    ],[
      'post_line1.required'=>'Postal address is required',
    ]);
    if($validatePostAddress->fails())
      return redirect('/apply/step1/')->withErrors($validatePostAddress);

    //Validate Next Of Kin
    $validateNextOfKin = Validator::make($member->next_of_kin->getAttributes(),[
      'id' => 'bail|required',
      'title' => 'required',
      'initials' => 'required',
      'name' => 'required',
      'surname' => 'required',
      'relationship' => 'required',
      'contact_no' => 'required',
      'postal_address' => 'required',
      'postal_code' => 'required',
      'address_line_1' => 'required',
      'suburb' => 'required',
      'city' => 'required',
      'area_code' => 'required',
    ],[
      'id.required'=>'Next of kin is required',
      'address_line_1.required'=>'Address is required',
    ]);
    if($validateNextOfKin->fails())
      return redirect('/apply/step2')->withErrors($validateNextOfKin);

    //Validate Area
    $validateArea = Validator::make(['numberOfAreas'=>$member->areas->count()],[
      'numberOfAreas'=>'gt:2',
    ]);
    if($validateArea->fails())
      return redirect('apply/step4')->withErrors($validateArea);
    
    //validate declarations
    $request->validate(['agreement'=>'required'],['agreement.required'=>'You have to agree to the terms to continue.']);
    $member->subscriptions()->sync($request->subscriptions);//should test sync 3,4
    $status = MemberController::status();
    $member->misc()->update(['status'=>$status['re']]); //status => review

    return redirect('/profile')->withErrors(['success','You application has been sent.']);
  }

}