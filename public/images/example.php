<!DOCTYPE html>
<html>
<head>
  <title>Dream Homes Stokvel</title>
  <link rel="stylesheet" type="text/css" href="/css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway&display=swap" rel="stylesheet">
</head>
<body>
  <div class="website">
    <div class="info-bar"></div>

    <div class="header-container">
      <div class="logo">
        <a href="/"><img src="/images/logo.png" alt="dream homes stokvel"></a>
      </div>
      <div class="menu-container main-menu">
          <ul>
            <li class="@yield('home')"><a href="/">Home</a></li>
            <li class="@yield('about')"><a href="/about">About</a></li>
            <li class="@yield('contact')"><a href="/contact">Contact</a></li>
            @if (auth()->check())
              <li class="@yield('profile')"><a href="/profile">Profile</a></li>
            @else
              <li class="@yield('register')"><a href="/register">Register</a></li>
            @endif
          </ul>
        @if(auth()->check())
          <span class="btn login"><a href="/logout">Logout</a></span>
        @else
          <span class="btn login"><a href="/login">Login</a></span>
        @endif
      </div>
    </div>

    @yield('banner')

    <div class="section">
      @yield('section')
    </div>

  </div>
</body>
</html>
@extends('layouts.master')
@section('about','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="about">
    <h1 class="center-h"><span class="deBold">Our </span>Story</h1>
    <span class="center-img"><img src="/images/story.svg"></span>
    <p class="wide-par">
      <b>Dream Homes</b> Stokvel is a unique stokvel that is formed to help those with little income or cannot qualify for a bond. The idea is to help such individuals to be able to buy their dream homes without any hassle. Members help one another to buy houses and members have the power to amend the constitution and to elect those that they feel can run the stokvel to success. Members meet every first week of every month to discuss the progress of the stokvel and any matters arising.
    </p>
    <br><br><br>
    <h1 class="center-h">How <span class="deBold">does it Work?</span></h1>
    <span class="center-img"><img src="/images/howworks.svg"></span>
    <p>
      If you take a home a loan of say R500 000 over 20 years at an interest rate of 10%, your monthly repaymets amount to about R4 825.00. 10% is the current prime lending rate and most people will likely get more than 10% interest rate meaning that they will pay more that R4 825.00 per month. But for the sake of this calculation let's use 10%. Calculate this monthly repayment over a period of 20 years and it sums up to around R1 158 000.00. This is more than twice the bond amount given by the bank. This is because the bank charges you interests. At <b>Dream Homes</b> we use a stokvel system and thus there is no need to pay interests. Through each members contributions the stokvel is able to afford land and housing costs cash and thus saving the members on interests.
    </p>
  </div>
@endsection

@extends('layouts.master')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="application">
    <h1>APPLICANT</h1>

    <form class="applicant-details">
      <div class="title">
        <label for="title">Title</label>
        <input type="text" name="">
      </div>
      <div class="initials">
        <label for="initials">Initials</label>
        <input type="text" name="">
      </div>
      <div class="first-name">
        <label for="first-name">First Name</label>
        <input type="text" name="">
      </div>
      <div class="mid-name">
        <label for="mid-name">Middle Name</label>
        <input type="text" name="">
      </div>
      <div class="surname">
        <label for="surname">Surname</label>
        <input type="text" name="">
      </div>
      <div class="id-passport">
        <label for="id-passport">ID/Passport</label>
        <input type="text" name="">
      </div>
      <div class="tel-no">
        <label for="tel-no">Tel. No.</label>
        <input type="text" name="">
      </div>
      <div class="cell-no">
        <label for="cell-no">Cell Phone No.</label>
        <input type="text" name="">
      </div>
      <div class="email">
        <label for="email">Email</label>
        <input type="text" name="">
      </div>
      <div class="marital-status">
        <label for="marital-status">Marital Status</label>
        <select>
          <option>Single</option>
          <option>Married</option>
          <option>Divorced</option>
          <option>Civil Union</option>
          <option>Widowed</option>
        </select>
      </div>
      <div class="insolv1">
        <label>Have you been declared insolvent?</label>
        <select>
          <option>No</option>
          <option>Yes</option>
        </select>
      </div>
      <div class="insolv2">
        <label>If yes, have you been rehabilitated?</label>
        <select>
          <option>No</option>
          <option>Yes</option>
        </select>
      </div>
      <div class="insolv2">
        <label>Are you under debt management or liquidation?</label>
        <select>
          <option>No</option>
          <option>Yes</option>
        </select>
      </div>
      <div class="physical-address address">
        <label>Physical Address</label>
        <div class="clr"></div>
        <input type="text" class="" name="pp-address1" placeholder="Address Line 1">
        <input type="text" class="" name="pp-address2" placeholder="Address Line 2">
        <input type="text" class="" name="pp-suburb" placeholder="Surbub">
        <input type="text" class="" name="pp-city" placeholder="City">
        <input type="text" class="" name="pp-code" placeholder="Postal Code">
      </div>
      <div class="postal-address address">
        <label>Postal Address</label>
        <select>
          <option>Same as physical</option>
          <option>Use different address</option>
        </select>
        <div class="clr"></div>
        <input type="text" class="" name="post-address1" placeholder="Address Line 1">
        <input type="text" class="" name="post-address2" placeholder="Address Line 2">
        <input type="text" class="" name="post-suburb" placeholder="Surbub">
        <input type="text" class="" name="post-city" placeholder="City">
        <input type="text" class="" name="post-code" placeholder="Postal Code">
      </div>
      <div class="clr"></div>
      <button type="submit" class="btn">Submit</button>
  </form>
  </div>
@endsection
@extends("layouts.master")
@section('home','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="home-section">
    <h1 class="center-h"><span class="deBold">Welcome to</span> Dream Homes Stokvel</h1>
    <div class="about">
      <div class="about1">
        <img class="icon" src="/images/house3.svg"></img>
        <h2>Who are we</h2>
        <p>Dream Homes Stokvel was formed after meeting several clients who are either blacklisted or are earning less than what the banks require. With all that we failed to source property for our clients. We then came up with the idea of a Housing Stokvel</p>
      </div>
      <div class="about2">
        <img class="icon" src="/images/house4.svg"></img>
        <h2>What we offer</h2>
        <p>
          We are a 100% black owned Property Investment company. Established in 2016 and a Housing Stokvel established in 2016. We help our clients to acquire property lesser than the market.
        </p>
      </div>
      <div class="about3">
        <img class="icon" src="/images/vision1.svg"></img>
        <h2>Our vision</h2>
        <p>
          We want to build 1000 houses every year without a single loan from the bank. The idea is to show black people that together we can pull miracles.
        </p>
      </div>
    </div>
  </div>

@endsection
@extends("layouts.master")
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="register">
    <div class="form">
      <h1>Login</h1>

      @if (count($errors)  > 0)
        <div class="message bg-error">
          <h4>Error</h4>
          <ul>
          @foreach($errors->all() as $error)
             <li><span></span>{{$error}}</li>
          @endforeach
          </ul>
        </div>
      @endif

      <form class="register-form" action="/login" method="POST">
        {{csrf_field()}}
        <label for="email">Email</label>
        <input type="text" required name="email" value="{{old('email')}}">
        <label for="password">Password</label>
        <input type="password" required name="password">
        <button type="submit" class="btn">Login</button>
      </form>
    </div>
    <div class="side-pic">
      <img src="/images/house1.png">
    </div>
  </div>
@endsection
@extends("layouts.master")

@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="register">
    <div class="form">
      <?php
        //A different message is displayed depending on the $message variable
        if ($message == "verifyLinkExpired"){
          $msgHeading1 = "invalid Link";
          $msgHeading2 = "Error";
          $msgColour = "bg-error";
          $msgContent = ["This link is invalid or may have expired. Please check the link or try to register again."];
        }
        elseif ($message == "passwordSuccess"){
          $msgHeading1 = "Success";
          $msgHeading2 = "";
          $msgColour = "bg-success";
          $msgContent = ["Password set Successfully","You can now Login"];
        }elseif ($message == "loggedOut"){
          $msgHeading1 = "Logged Out";
          $msgHeading2 = "";
          $msgColour = "bg-success";
          $msgContent = ["You have successfully logged out!"];
        }
        else //default Error Message
          $msgContent = ["Error","bg-error","Opps...","Something went wrong"]
      ?>

      <h1>{{$msgHeading1}}</h1>
        <div class="message {{$msgColour}}">
          <h4>{{$msgHeading2}}</h4>
          <ul>
            @foreach($msgContent as $msg)
              <li><span></span>{{$msg}}</li>
            @endforeach
          </ul>
        </div>
    </div>
      <div class="side-pic">
        <img src="/images/house1.png">
      </div>
    </div>
    </div>
  </div>
@endsection
@extends("layouts.master")
@section('profile','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="profile-div">
    <div class="side-menu">
      <h3>Banking Details</h3>
      <hr>
      <p>
        Amount to be deposited R1500.00
        Bank Name: FNB <br>
        Account Holder: Su Casa Property Investment Group PTY LTD <br>
        Account Number: 62830853489 <br>
        Branch Name: Bank City <br>
        Branch Code: 250805 <br>
        Reference: Please put your name and surname
      </p>
      {{-- <span class="active menu-link">Application</span> --}}
      {{-- <span class="menu-link">Documents</span> --}}
      {{-- <span class="menu-link">Banking Details</span> --}}
    </div>
    <div class="profile-content">
      <div class="application">
        <span class="btn2 application-download">Download Application form</span>
        <span class="btn2 applicaiton-upload">Upload Application</span>
        <span class="btn2 apply-online">Apply Online (<i>Coming Soon</i>)</span>
      </div>
      <div class="documents">
        <span class="btn2">Upload ID/Passport</span>
        <span class="btn2">Upload Proof of payment</span>
        <span class="btn2">Upload More</span>
      </div>
    </div>
  </div>
@endsection
@extends("layouts.master")
@section('register','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="register">
    <div class="form">
      <h1>Register</h1>

      @if (count($errors)  > 0)
        @if (in_array('success',$errors->all()))
          <div class="message bg-success">
          <h4>Success!</h4>
        @else
          <div class="message bg-error">
            <h4>Error</h4>
        @endif
          <ul>
          @foreach($errors->all() as $error)
            @if($error == 'success')
             <li hidden>{{$error}}</li>
            @else
             <li><span></span>{{$error}}</li>
            @endif
          @endforeach
          </ul>
        </div>
      @endif

      <form class="register-form" action="/register" method="POST">
        {{csrf_field()}}
        <label for="name">First Name</label>
        <input type="text" required name="f_name" value="{{old('f_name')}}">
        <label for="surname">Surname</label>
        <input type="text" required name="surname" value="{{old('surname')}}">
        <label for="contact-no">Contact Number</label>
        <input type="text" required name="contact_no" value="{{old('contact_no')}}">
        <label for="email">Email</label>
        <input type="text" required name="email" value="{{old('email')}}">
        <button type="submit" class="btn">Submit</button>

      </form>
    </div>
    <div class="side-pic">
      <img src="/images/house1.png">
    </div>
  </div>
@endsection
@extends("layouts.master")

@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="register">
    <div class="form">
      <h1>Set Password</h1>

      @if (count($errors)  > 0)
        @if (in_array('success',$errors->all()))
          <div class="message bg-success">
          <h4>Success!</h4>
        @else
          <div class="message bg-error">
            <h4>Error</h4>
        @endif
          <ul>
          @foreach($errors->all() as $error)
            @if($error == 'success')
             <li hidden>{{$error}}</li>
            @else
             <li><span></span>{{$error}}</li>
            @endif
          @endforeach
          </ul>
        </div>
      @endif

      <form class="password-form" action="/setPassword" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="token" value="{{$token}}">
        <input type="hidden" name="email_token" value="{{$email_token}}">
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" required>
        <button type="submit" class="btn">Submit</button>

      </form>
    </div>
    <div class="side-pic">
      <img src="/images/house1.png">
    </div>
  </div>
@endsection

<?php
public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('admin_level');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    Schema::create('pending_users', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->string('f_name');
         $table->string('surname');
         $table->string('email');
         $table->string('contact_no');
         $table->string('email_token');
         $table->string('verify_token');
         $table->timestamps();
       });
       Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('membership_no')->nullable();
            $table->string('title')->nullable();
            $table->string('initials')->nullable();
            $table->string('f_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('maiden_name')->nullable();
            $table->string('id_passport_no')->nullable();
            $table->string('tel_number')->nullable();
            $table->string('cell_number')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('insolvency')->nullable();
            $table->string('liquidation')->nullable();
            $table->string('application_type')->nullable();
            $table->string('completed_at')->nullable();
            $table->timestamps();
        });
        Schema::create('uploads', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->integer('member_id');
           $table->string('name');
           $table->string('path');
           $table->timestamps();
       });
       Schema::create('documents', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->integer('member_id');
           $table->string('name');
           $table->string('path');
           $table->timestamps();
       });
   }
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
/*
*	CSS Styles
*	By Rendani Shane Netshikweta
*	At Obscode Freelace
*	12/2019
*
*	Logo Colours
*	Green 	#8ab242 #99cc66
*	Grey	#323941 #333333
*/


/*site wide css***********************************/
*{
	margin: 0px;
	padding: 0px;
	box-sizing: border-box;
	font-family: 'Montserrat', sans-serif;
	/*font-family: 'Raleway', sans-serif;*/
	/*font-size: 16px;*/
	line-height: 27px;
}
select{
	padding: 5px;
	border-radius: 5px;
	margin-top: 5px;
	margin-bottom: 20px;
}
input{
	padding: 5px;
	border-radius: 5px;
	/*background-color: #99cc6633;*/
	border: 1px solid #ccc;
	color: #555;
	box-shadow: 1px 1px 2px #ccc;
	margin: 5px 0px 20px 0px;
	outline: none;
}
input:focus{
	box-shadow: 0px 0px 4px #e00;
	border: 1px solid #e00;
}
button{
	border: none;
}
.clr{
	clear: both;
	width: 100%;
}
.btn{
	background-color: #99cc66;
	text-align: center;
	color: #FFFFFF;
	display: inline-block;
	min-width: 100px;
	border-radius: 30px;
	padding: 10px;
	box-shadow: 1px 1px 2px #000;
}
.btn:hover{
	background-color: #AADD77;
}
.btn:active{
	box-shadow: 1px 1px 2px #FFF;
}
.btn a{
	color: #FFFFFF !important;
	display: inline-block;
	text-decoration: none;
	/*background-color: orange;*/
	width: 100%;
	height: 100%;
	border-radius: 30px;
}
.section{
	width: 70%;
	margin-left: 15%;
	padding-top: 100px;
}
.bg-success{
	background-color: #99cc66;
}
.bg-error{
	background-color: #DD3333;
}
.message{
	padding: 10px;
	margin-top: 10px;
	border-radius: 10px;
	box-shadow: 2px 2px 4px #000;
	font-variant-caps: small-caps;
	color: #FFFFFF;
}
.message ul{
	list-style: none;
}
.message span{
	display: inline-block;
	margin-right: 3px;
	width: 0.5em;
	height: 0.5em;
	border-radius: 0.25em;
	background-color: yellow;
}
.message a{
	color: #FFFFFF;
}
.center-img{
	display: inline-block;
	width: 100%;
	text-align: center;
}
.center-img img{
	width: 100px;
}

/*END site wide css

/*header css*************************************/
.login{
	margin-top: 28px;
	width: 20%;
}
.info-bar{
	background-color: black;
	width: 100%;
	height: 30px;
}
.header-container{
	display: grid;
	padding-top: 20px;
	grid-template-columns: 40% 60%;
	width: 70%;
	margin-left: 15%;
}
.header-container div{
	height: 120px;
}
.logo img{
	width: 100%;
}
.menu-container{
	padding-left: 100px;
}
.menu-container ul{
	margin-top: 38px;
	width: 80%;
	float: left;
}
.menu-container ul li{
	width: 20%;
	float: left;
	list-style: none;
}
.menu-container ul a{
	display: inline-block;
	width: 100%;
	height: 100%;
	text-decoration: none;
	color: #333;
	text-align: center;
}
.menu-container ul a:active{

}
.main-menu .active{
	border-bottom: 2px solid #99cc66;
}

.banner-line{
	background-color: #99cc66;
	height: 30px;
}
.banner-pic{
	position: relative;
	height: 500px;
	overflow: hidden;
}
.banner-pic img{
	width: 100%;
}
.filter{
	background-color: #ffffff99;
	position: absolute;
	width: 100%;
	height: 100%;
}
/*Home page*********************************************/
.center-h{
	text-align: center;
	margin-bottom: 30px;
}
.deBold{
	font-weight: 200;
}
.home-section > .about{
	display: grid;
	grid-template-columns: auto auto auto;
}
.home-section .icon{
	width: 100%;
	height: 80px;
	text-align: center;
}
.home-section .about h2{
	text-align: center;
	margin: 20px 0px;
}
.home-section .about p{
	text-align: justify;
	padding: 20px;
	text-align-last: center;
}
/*register page*****************************************/
.register{
	display: grid;
	grid-template-columns: 50% 50%;
}
.register form{
	padding: 40px 200px 0px 0px;
}
.register .side-pic img{
	margin-top: 40px;
	text-align: center;
	width: 100%;
}
.register form label, .register form input{
	width: 100%;
}
.register form button{
	float: right;
}
/*Application from********************************************/
.application > h1 {
	text-align: center;
	margin-bottom: 60px;
}
.application div label, .application div input{
	width: 100%;
}
form.applicant-details{
	display: inline-block;
	padding: 25px;
	box-shadow: 3px 3px 9px #ccc;
}
.application .applicant-details>div{
	float: left;
	padding: 0px 6px;
}
form.applicant-details .title{
	width: 5%;
}
form.applicant-details .initials{
	width: 10%;
}
form.applicant-details .first-name{
	width: 42%;
}
form.applicant-details .mid-name{
	width: 43%;
}
form.applicant-details .surname{
	width: 50%;
}
form.applicant-details .id-passport{
	width: 50%;
}
form.applicant-details .tel-no{
	width: 33.333%;
}
form.applicant-details .cell-no{
	width: 33.333%;
}
form.applicant-details .email{
	width: 33.333%;
}
.application button{
	float: right;
}
form.applicant-details .marital-status{
	/*width: 28%;*/
}
form.applicant-details .insolve1{
	/*width: 36%;*/
}
form.applicant-details .insolve2{
	/*width: 36%;*/
}
form.applicant-details .address{
 width: 100%;
}
form.applicant-details .address input{
 width: 33%;
}
/*End Application Form*/

/*Profile Page****************************/
.btn2{
	display: inline-block;
	padding: 10px;
	background-color: #99cc66;
	border-radius: 7px;
	box-shadow: 2px 2px 2px #999;
}
.btn2:hover{
	background-color: #CFCFCF;
}
.btn2:active{
	box-shadow: 0px 0px 2px #999;
}
.profile-div .btn2{
	margin: 10px;
	width: 60%;
	float: left;
	clear: both;
}
.profile-div{
	display: grid;
	grid-template-columns: 50% 50%;
}

.profile-div .menu-link{
	display: inline-block;
	width: 100%;
	padding: 10px;
	background-color: #C0C0C0;
	border-radius: 15px 0px 0px 15px;
}
.profile-div .active{
	background-color: #FFFFFF;
	border-left: 1px solid #C0C0C0;
	border-top: 1px solid #C0C0C0;
	border-bottom: 1px solid #C0C0C0;
	border-right: 1px solid #FFFFFF;
	z-index: 1;
}

.profile-content{
	padding: 10px;
	/*border: 1px solid #C0C0C0;*/
	min-height: 400px;
}
 ?>
