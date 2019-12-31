<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function userLogin(Request $request){
      if(auth()->attempt(["email"=>request()->email,"password"=>request()->password])){
        //dd(auth()->user());
        return redirect()->back();
      }else{
        return redirect()->back()->withErrors(["Incorrect password or email"])->withInput();
      }
    }

    public function logoutUser(){
      auth()->logout();
      $message = "loggedOut";
      return view('messages',compact('message'));
    }
}
