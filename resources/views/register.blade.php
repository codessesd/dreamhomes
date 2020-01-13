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
            @if(($error == 'success')||($error == 'resend'))
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
        @if(in_array('resend',$errors->all()))
          <button type="submit" class="btn" name="resend" value="resend">Resend Verification</button>
          <div class="clr"></div>
        @endif
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