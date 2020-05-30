@extends('layouts.master')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
<h1 class="maintenance">Hi there. We are currently updating our website. Please check us again later. Sorry for the inconvenience!</h1>
<div class="spacer-big-1"></div>
<h1 class="center-h">Contact Us</h1>
  <div class="contact">
    <div class="contact-icon"><img  height="250px" src="/images/email.svg"></div>
    <div class="contact-text">
      <div class="contact-group">
        <p class="contact-label"><b>Address</b></p>
        <p class="contact-info">: 8968 Sonnyboy Street <br>Moleleki Ext2 <br>Katlehong</p>
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