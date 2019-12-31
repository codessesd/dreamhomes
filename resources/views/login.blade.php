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