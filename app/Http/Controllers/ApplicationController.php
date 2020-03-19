<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use symfony\httpfoundation\File;
use App\Member;

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
        dd('Not Found');
    }
  }

  public function store($step, Request $request)
  {
    switch($step)
    {
      case 'step1':
        $member = Member::find(auth()->user()->id);
        $member->update($request->member);
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
      default:
        dd('Illegal');
    }
  }

  public function removeBeneficiary($id)
  {
    $member = Member::find(auth()->user()->id);
    $member->beneficiaries()->where('id',$id)->first()->delete();
    return redirect('/apply/step3');
  }


}