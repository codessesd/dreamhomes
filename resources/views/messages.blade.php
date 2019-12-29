@extends("layouts.master")

@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="register">
    <div class="form">
      @php
        //A different message is displayed depending on the $message variable
        if ($message == "verifyLinkExpired")
          $msgContent = ["Invalid Link",
                       "bg-error",
                       "Fail",
                       "This link is invalid or may have expired. Please check the link and try again or register again."
                      ];
        elseif ($message == "passwordSuccess")
          $msgContent = ["Success",
                       "bg-success",
                       "Password set Successfully",
                       "You can now Login."
                      ];
        else
          $msgContent = ["Hi","bg-success","","You have reached the messages page"]
      @endphp

      <h1>{{$msgContent[0]}}</h1>
        <div class="message {{$msgContent[1]}}">
          <h4>{{$msgContent[2]}}</h4>
          <ul>
            <li><span></span>{{$msgContent[3]}}</li>
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
