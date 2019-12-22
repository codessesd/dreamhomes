@extends("layouts.master")

@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="register">
    <div class="form">
      <h1>Register</h1>
      <form class="register-form">
        <label for="name">First Name</label>
        <input type="text" name="name">
        <label for="surname">Surname</label>
        <input type="text" name="surname">
        <label for="contact-no">Contact Number</label>
        <input type="text" name="contact-no">
        <label for="email">Email</label>
        <input type="text" name="email">
        <button type="submit" class="btn">Submit</button>
        
      </form>
    </div>
    <div class="side-pic">
      <img src="/images/house1.png">
    </div>
  </div>
@endsection