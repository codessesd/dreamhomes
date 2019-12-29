<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PendingUser;
use App\User;

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
      if ($userExists->isEmpty()){
        request()['verify_token'] = (hash('sha256',rand(0,99999999)));
        request()['email_token'] = md5(request()->email);
        $userInPending = PendingUser::where('email',request()->email)->get();
        if($userInPending->isEmpty())
        {
          //Create a new user
          PendingUser::Create(request()->all());
          $msg = "Thank you for registering. A verification email was sent to your email address. Please check your email and click on \"Verify Email Address.\"";
          //send email to the user
          $headers ="From: verification@dhs.org.za";
            $to = "rendyshane@gmail.com,".request()->email;
            $subject = "DreamHomes: Verify Email address";

            $message = "Hello ".request()->f_name." \n\nClick on the link below to verify your email address. Alternatively, you can copy the link into your browser. This link will expire in 24 Hours.\n\n";
            $message.= "https://www.dhs.org.za/verify/".request()->email_token."/".request()->verify_token;

            //mail($to,$subject,$message,$headers);//uncomment this on live web
          return redirect()->back()->withErrors(['success',$msg]);
        }else
        {
          //user already in pending users table
          $msg = "This email already exists. A verification email was sent to your email address. Please check your email and click on \"Verify Email Address.\"";
          return redirect()->back()->withErrors([$msg])->withInput();
        }
      }
      else{
        //user already registered
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
        return view("setPassword",compact("token","email_token"));
      }else{
        $message = "verifyLinkExpired";
        return view("messages",compact("message"));
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
