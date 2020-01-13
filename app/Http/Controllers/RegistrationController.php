<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PendingUser;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\accounts;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
      $this->validate(request(),[
        'f_name'=>'required',
        'surname'=>'required',
        'contact_no'=>'required',
        'email'=>'required'
      ]);

      #New users are stored in Pending Users table. They are never removed from this table (for now)
      #Once users confirm their email addressed they are then moved to the users table????
      $userExists = User::where('email',request()->email)->get();
      if ($userExists->isEmpty())
      {
        $userInPending = PendingUser::where('email',request()->email)->get();
        if($userInPending->isEmpty())
        {//user not in pending users table

          if(isset(request()->resend)){
            //If the user clicked the resend button but he is not in pending users then we 
            $msg = "This email address does not have a verification code. Double check your email address and try again";
            return redirect()->back()->withErrors(['resend',$msg])->withInput();
          }else{//otherwise it means the user clicked the submit button
            request()['verify_token'] = (hash('sha256',rand(0,99999999)));
            request()['email_token'] = md5(request()->email);
            PendingUser::Create(request()->all());
          }
          //send first verification email to the user
          $emailMessage = "Welcome to Dream Homes. Click on the link below to verify your email address. Alternatively, you can copy the link into your browser. This link will expire in 24 Hours.";
          $name = request('f_name').' '.request('surname');
          #$link = "localhost:8000/verify/".request()->email_token."/".request()->verify_token;//for testing only. comment out on live website
          $link = "https://www.dhs.org.za/verify/".request()->email_token."/".request()->verify_token;
          Mail::to(request('email'))->queue(new accounts($name, $link, $emailMessage));
          $msg = "Thank you for registering. A verification email was sent to your email address. Please check your email and click on the link provided";
          return redirect()->back()->withErrors(['success',$msg]);

        }else{//if user is already in pending users table
          if(request('resend') == 'resend'){
            //and if user has requested to be resent the code
            $userInPending = $userInPending->first();
            $emailMessage = "You have requested to be resent the verification link. Click on the link below to verify your email address. Alternatively, you can copy the link into your browser. Note that resent links may expire in less than 24 Hours.";
            $name = request('f_name').' '.request('surname');
            //$link = "localhost:8000/verify/".$userInPending->email_token."/".$userInPending->verify_token;//for testing only comment out on live website
            $link = "https://www.dhs.org.za/verify/".$userInPending->email_token."/".$userInPending->verify_token;
            Mail::to(request('email'))->queue(new accounts($name, $link, $emailMessage)); 
            $msg = "A verification email was resent to your email address. Please check your email and click on the link provided";
            return redirect()->back()->withErrors(['success',$msg]);
          }

          $msg = "A verification email was already sent to your email address. Please check your email and click on the link provided";
          return redirect()->back()->withErrors(['resend',$msg])->withInput();
        }
      }else{//the user already registered
        $msg = "This email is already registered. Please login.";
        return redirect()->back()->withErrors([$msg])->withInput();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify($email_token, $token)
    {
      $pendingUser = PendingUser::where("email_token",$email_token)->where("verify_token",$token)->get();
      if ($pendingUser->isNotEmpty())
      {
        $formAction = "setPassword";
        return view("setPassword",compact("token","email_token","formAction"));
      }else{
        $erSMessage = ["bigTitle"=>"Invalid Link",
                       "bgColor"=>"bg-error",
                       "smallTitle"=>"Error",
                       "theMessages"=>['This link is invalid or may have expired. Please check the link or try to register again.']];
        return view("messages",compact("erSMessage"));
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
