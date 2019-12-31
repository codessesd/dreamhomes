@extends("layouts.master")

@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="register">
    <div class="form">
      @php
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
      @endphp

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
