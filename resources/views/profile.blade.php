@extends("layouts.master")
@section('profile','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="profile-div">
    <div class="side-menu">
      <span class="menu-link">Application</span>
      <span class="menu-link">Documents</span>
      <span class="menu-link">Banking Details</span>
    </div>
    <div class="content-div">
      <div class="application">
        <span class="application-download">Download Application form</span>
        <span class="applicaiton-upload">Upload Application</span>
        <span class="apply-online">Apply Online</span>
      </div>
      <div class="documents">
        <span>Upload ID/Passport</span>
        <span>Upload Proof of payment</span>
      </div>
    </div>
  </div>
@endsection
