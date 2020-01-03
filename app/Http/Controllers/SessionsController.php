<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function userLogin(Request $request){
      //dd(session());
      if(auth()->attempt(["email"=>request()->email,"password"=>request()->password])){
        //dd(session());
        return redirect('/profile');
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
