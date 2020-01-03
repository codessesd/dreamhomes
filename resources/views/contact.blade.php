@extends('layouts.master')
@section('contact','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="contact">
    <div class="contact-icon"></div>
    <div class="contact-text">
      <h1>Contact Us</h1>
      <div class="contact-group">
        <p class="contact-label"><b>Address</b></p>
        <p class="contact-info">8968 Sonnyboy Street <br>Moleleki Ext2 <br>Katlehong</p>
      </div>
      <div class="contact-group">
        <p class="contact-label"><b>Email</b></p>
        <p class="contact-info">heita@dhs.org.za</p>
      </div>
      <div class="contact-group">
        <p class="contact-label"><b>Fax</b></p>
        <p class="contact-info">086 600 2848</p>
      </div>
      <div class="contact-group">
        <p class="contact-label"><b>Tel</b></p>
        <p class="contact-info">010 023 0800</p>
      </div>
    </div>
  </div>
@endsection