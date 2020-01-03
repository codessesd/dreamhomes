@extends("layouts.master")
@section('profile','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('fixed-div')

@endsection

@section('section')
  <div class="disabler" id="disabler"></div>
  <div class="upload-dialog" id="upload-dialog">
    <div class="close"><img onclick="closeDialog()" src="/images/close-red.svg" alt="close"></div>
    <form class="upload-form">
      <label>You are about to upload: <br> <b><span id="uploadType">Document</span></b></label>
      <br><br>
      <input type="file" name="file" required><br>
      <button type="submit" class="btn">Submit</button>
    </form>
  </div>
  <h1 class="center-h"><span class="deBold">Your </span>Profile</h1>
  <div class="profile-div">
    <div class="side-menu">
      <h3>Personal Details</h3>
      <hr>
      @php
        //(auth()->user());
      @endphp
      <p>Name: {{auth()->user()->member()->f_name}} {{auth()->user()->member()->surname}}</p>
      <p>Contact: {{auth()->user()->member()->cell_number}}</p>
      <p>Email: {{auth()->user()->email}}</p>
      <p>Status: {{auth()->user()->member()->status}}</p>
      <br>
      <br>
      <h3>Our Banking Details</h3>
      <hr>
      <p>
        Bank Name: FNB <br>
        Account Holder: Su Casa Property Investment Group PTY LTD <br>
        Account Number: 62830853489 <br>
        Branch Name: Bank City <br>
        Branch Code: 250805 <br>
        Reference: Please put your name and surname
      </p>
      {{-- <span class="active menu-link">Application</span> --}}
      {{-- <span class="menu-link">Documents</span> --}}
      {{-- <span class="menu-link">Banking Details</span> --}}
    </div>
    <div class="profile-content">
      <div class="application">
        <span class="btn3 application-download"><a href="/download-form">Download Application form</a></span>
        <span class="btn2 application-upload" onclick="upload('application')">Upload Application</span>
        <span class="btn2 apply-online">Apply Online (<i>Coming Soon</i>)</span>
      </div>
      <div class="documents">
        <span class="btn2" onclick="upload('idpassport')">Upload ID/Passport</span>
        <span class="btn2" onclick="upload('pop')">Upload Proof of payment</span>
        <span class="btn2" onclick="upload('other')">Upload More</span>
      </div>
    </div>
  </div>
@endsection
