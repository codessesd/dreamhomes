@extends("layouts.master")
@section('profile','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('fixed-div')

@endsection

@section('section')
  {{-- file uploader **************************--}}


  <div class="disabler" id="disabler"></div>
  <div class="upload-dialog" id="upload-dialog">
    <div class="close"><img onclick="closeDialog()" src="/images/close-red.svg" alt="close"></div>
    <form class="upload-form" action="/storeFile" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <label>You are about to upload: <br> <b><span id="uploadType">Document</span></b></label>
      <br><br>
      <input type="file" name="document" required><br>
      <input type="hidden" id="document-type" name="documentType">
      <button type="submit" class="btn">Submit</button>
    </form>
  </div>

{{-- @include('partials.floatingMsg') --}}
  @if(count($errors) > 0)
    @include('partials.floatingMsg')
  @endif
  {{-- @if(count($errors) > 0) --}}
    <script type="text/javascript">
      // document.getElementById('disabler').style.display = "block";
      // document.getElementById('upload-dialog').style.display = "block"
    </script>
  {{-- @endif --}}

  {{-- Profile page *******************************************--}}
  <h1 class="center-h"><span class="deBold">Your </span>Profile</h1>
  <div class="profile-div">
    <div class="side-menu">
      <h3>Personal Details</h3>
      <hr>
      
      @php
        $member = auth()->user()->member();
        $allDocuments = [];

        foreach($member->document->all() as $document){
          switch ($document->type) {
            case 'application':
              array_push($allDocuments, 'Application Form');
              break;
            case 'idpassport':
              array_push($allDocuments, 'ID or Passport');
              break;
            case 'proofop':
              array_push($allDocuments, 'Proof Of Payment');
              break;
            case 'supportingdoc':
              array_push($allDocuments, 'Supporting Document');
              break;
            default:
              array_push($allDocuments, 'Not Allowed');
              break;
          }
        }
      @endphp

      <p>Name: {{auth()->user()->member()->f_name}} {{auth()->user()->member()->surname}}</p>
      <p>Contact: {{auth()->user()->member()->cell_number}}</p>
      <p>Email: {{auth()->user()->email}}</p>

      <!--Member Status-->
      @if ($member->status == "incomplete")
        <p>Status: <span class="txt-green">Registered</span></p>
        <p>Application: <span class="txt-red">Incomplete</span></p>
      @elseif ((auth()->user()->member()->status == "complete"))
        <p>Status: <span class="txt-green">Registered</span></p>
        <p>Application: <span class="txt-green">Complete</span></p>
      @elseif ((auth()->user()->member()->status == "blocked"))
        <p>Status: <span class="txt-red">Registered</span></p>
      @else
        <p>Status: <span class="txt-red">Not Defined</span></p>
      @endif

      <br>
      
      @if(count($allDocuments) > 0)
        <p><b>Uploaded Documents:</b></p>
          <ol class="uploadedDocs">
            @foreach($allDocuments as $document)
              <li>{{$document}}</li>
            @endforeach
          </ol>
      @endif

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
        <span class="btn2 application-upload" onclick="openDialog('Application Form','application')">Upload Application</span>
        <span class="btn2 apply-online">Apply Online (<i>Coming Soon</i>)</span>
      </div>
      <div class="documents">
        <span class="btn2" onclick="openDialog('ID OR Passport','idpassport')">Upload ID/Passport</span>
        <span class="btn2" onclick="openDialog('Proof Of Payment','proofop')">Upload Proof of payment</span>
        <span class="btn2" onclick="openDialog('More Supporting Documents','supportingdoc')">Upload More</span>
      </div>
    </div>
  </div>
@endsection
