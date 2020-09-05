<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function userLogin(Request $request){
      if(auth()->attempt(["email"=>request()->email,"password"=>request()->password])){
        if(auth()->user()->admin_level == 4)
          return redirect()->intended('/members');
        else
          return redirect()->intended('/profile');
      }else{
        return redirect()->back()->withErrors(["Incorrect password or email"])->withInput();
      }
    }

    public function logoutUser(){
      auth()->logout();
       $erSMessage = ["bigTitle"=>"",
                    "bgColor"=>"bg-success",
                    "smallTitle"=>"Logged out!",
                    "theMessages"=>['See you soon.']];

      return view("messages",compact("erSMessage"));
    }
}
