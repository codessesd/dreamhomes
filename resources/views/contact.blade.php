@extends('layouts.master')
@section('contact','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
<h1 class="center-h">Contact Us</h1>
  <div class="contact">
    <div class="contact-icon"><img  height="250px" src="/images/email.svg"></div>
    <div class="contact-text">
      <div class="contact-group">
        <p class="contact-label"><b>Address</b></p>
        <p class="contact-info">: 20 De Korte Street<br>Samro Place 5th Floor<br>Braamfontein<br>2001</p>
        <div class="clr"></div>
      </div>
      <div class="contact-group">
        <p class="contact-label"><b>Email</b></p>
        <p class="contact-info">: <a href="mailto:heita@dhs.org.za">heita@dhs.org.za</a></p>
        <div class="clr"></div>
      </div>
      <div class="contact-group">
        <p class="contact-label"><b>Fax</b></p>
        <p class="contact-info">: 086 600 2848</p>
        <div class="clr"></div>
      </div>
      <div class="contact-group">
        <p class="contact-label"><b>Tel</b></p>
        <p class="contact-info">: 010 023 0800</p>
        <div class="clr"></div>
      </div>
    </div>
  </div>
@endsection
