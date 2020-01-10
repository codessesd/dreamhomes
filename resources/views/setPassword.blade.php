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

      <form class="password-form" action="/{{$formAction}}" method="POST">
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
