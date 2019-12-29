<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PendingUser;
use App\User;

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
      $rememberToken = hash('sha256',rand(0,999999999));
      $hashedPassword = bcrypt(request()->password);
      $email = $pendingUser[0]['email'];

      $user = User::Create(["email" => $email,"admin_level" => 1,"password" => $hashedPassword,"remember_token" => $rememberToken]);
      $pendingUser[0]->delete();

      $message = "passwordSuccess";
      return view('messages',compact('message'));
    }
  }
}
