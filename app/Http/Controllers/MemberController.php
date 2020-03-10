<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Admin;

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

      $writePermissions = $admin->permissions->where('entity','member')->where('type','write');
      $attributesToUpdate = collect([]);

      foreach ($writePermissions as $permission)
      {
        $attribute = $permission->attribute;
        $attributesToUpdate->put($attribute,request()[$attribute]);
      }
      //dd($attributesToUpdate->all());
      $member->update($attributesToUpdate->all());

      return 'saved!';
    }

    public function all()
    {
      $members = Member::all();
      return view('dashboard.members',compact('members'));
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
    public function store(Request $request)
    {
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
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
