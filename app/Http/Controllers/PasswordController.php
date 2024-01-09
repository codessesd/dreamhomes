<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PendingUser;
use App\User;
use App\Member;
use App\Resets;
use Illuminate\Support\Facades\Mail;
use App\Mail\accounts;

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
      
      $user = User::Create(["email" => $email,"admin_level" => 0,"password" => $hashedPassword,"remember_token" => $rememberToken]);
      $member = Member::Create(["id" => $user->id,
                                "user_id"=>$user->id,
                                "f_name" => $pendingUser->f_name,
                                "surname" => $pendingUser->surname,
                                "cell_number" => $pendingUser->contact_no]);
      $status = MemberController::status();
      $member->misc()->create(['status'=> $status['in']]);//status => incomplete
      $pendingUser->delete();

      $erSMessage = ["bigTitle"=>"",
                     "bgColor"=>"bg-success",
                     "smallTitle"=>"Success",
                     "theMessages"=>['Password set Successfully.','Welcome to Dream Homes.','You can now login!']];

      return view('messages',compact('erSMessage'));
    }else{
      $erSMessage = ["bigTitle"=>"",
                     "bgColor"=>"bg-error",
                     "smallTitle"=>"Error",
                     "theMessages"=>['Something went wrong.','Error Code: #101.']
                   ];
      return view("messages",compact("erSMessage"));
    }
  }

  public function createResetToken(Request $request)
  {
    $this->validate(request(),[
            "email"=> "required|email"]);

    $user = User::where("email",request()->email)->get();
    
    if($user->isNotEmpty()){
      $member = Member::find($user->first()->id);
      $resetToken = hash('sha256',rand(0,999999999));
      $userInResets = Resets::where("email",request()->email)->get();
      
      //if user has already requested a resend the old reset link
      if ($userInResets->isNotEmpty()){
        Resets::where("email",request()->email)->delete();
      }

      Resets::create(['email'=>request()->email,'token'=>$resetToken]);
      if ($member != null)
        $name = $member->f_name;
      else
        $name = "there";
      $emailMessage = "You have requested a new password for your account. Click on the link below to reset you password. This link will expire in 24 hours";
      $link = "https://dreamhomes.obscode.joburg/resetPassword/".request()->email."/".$resetToken;
      if(config('app.env') == 'local')
        $link = "localhost:8000/resetPassword/".request()->email."/".$resetToken;//For local environment only

      Mail::to(request('email'))->queue(new accounts($name, $link,$emailMessage));

      $erSMessage = ["bigTitle"=>"",
                     "bgColor"=>"bg-success",
                     "smallTitle"=>"Success",
                     "theMessages"=>['Password reset link sent.']
                   ];
      return view('messages',compact('erSMessage'));
    }else{
      return redirect()->back()->withErrors(["Opps! This email address is not registered."])->withInput();
    }

  }


  public function resetPassword($email,$token)
  {
    $userInResets = Resets::where('email',$email)->where('token',$token)->get();

    if($userInResets->isNotEmpty())
    {
      $formAction = 'newPassword';
      $email_token = $email;
      return view('setPassword',compact('token','email_token','formAction'));
    }else{
      $erSMessage = ["bigTitle"=>"Invalid Link",
                    "bgColor"=>"bg-error",
                    "smallTitle"=>"Error",
                    "theMessages"=>['This link is invalid or may have expired.','Please check the link or try to reset your password again.']];

      return view("messages",compact("erSMessage"));
    }
  }

  public function newPassword(Request $request)
  {
    $this->validate(request(),[
              'password' => 'confirmed|min:8'
            ]);

    $userInResets = Resets::where('email',request('email_token'))->where('token',request('token'))->get();

    if($userInResets->isNotEmpty())
    {
      //dd($userInResets->first()->email);
      $user = User::where('email',$userInResets->first()->email)->first();
      $user->password = bcrypt(request()->password);

      Resets::where('email',$userInResets->first()->email)->delete();
      $user->save();

       $erSMessage = ["bigTitle"=>"",
                    "bgColor"=>"bg-success",
                    "smallTitle"=>"Password Changed!",
                    "theMessages"=>['You have successfully changed your Password','You can now login']];

      return view("messages",compact("erSMessage"));

    }

  }

}