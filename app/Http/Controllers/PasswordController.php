<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PendingUser;
use App\User;
use App\Member;

class PasswordController extends Controller
{
  public function firstPassword(Request $request)
  {
    $this->validate(request(),[
      'password'=>'confirmed|min:8',
    ]);

    $pendingUser = PendingUser::where('email_token',request()->email_token)->where('verify_token',request()->token)->get();

    if($pendingUser->isNotEmpty())
    {
      $pendingUser = $pendingUser[0];
      $rememberToken = hash('sha256',rand(0,999999999));
      $hashedPassword = bcrypt(request()->password);
      $email = $pendingUser->email;
      $user = User::Create(["email" => $email,"admin_level" => 1,"password" => $hashedPassword,"remember_token" => $rememberToken]);
      $member = Member::Create(["id" => $user->id,
                                "f_name" => $pendingUser->f_name,
                                "surname" => $pendingUser->surname,
                                "cell_number" => $pendingUser->contact_no]);
      $pendingUser->delete();

      $message = "passwordSuccess";
      return view('messages',compact('message'));
    }else{
      $message = "defaultMessage";
      return view("messages",compact("message"));
    }
  }
}
