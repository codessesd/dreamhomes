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
      <input type="file" class="file-input" name="document" required><br>
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
    <div class="profile-btns-mobile">
      @include('partials.profile_btns')
    </div>
    <div class="side-menu">
      <h3 class="fl-l">Personal Details</h3>
      <span class="fl-r profile-btns-menu">
        <img class="profile-btn-open" src="/images/dots.png">
      </span>
      <div class="clr"></div>
      <hr>
      
      @php
        // get all member documents and store their ID and "readable" type in an array to list them later
        $member = auth()->user()->member;
        $docIDandType = [];
        $allDocuments = $member->document->all();

        foreach($allDocuments as $document){
          switch ($document->type) {
            case 'application':
              array_push($docIDandType, ['type'=>'Application Form','id'=>$document->id]);
              break;
            case 'idpassport':
              array_push($docIDandType, ['type'=>'ID or Passport','id'=>$document->id]);
              break;
            case 'proofop':
              array_push($docIDandType, ['type'=>'Proof Of Payment','id'=>$document->id]);
              break;
            case 'supportingdoc':
              array_push($docIDandType, ['type'=>'Supporting Document','id'=>$document->id]);
              break;
            default:
              array_push($docIDandType, ['type'=>'Invalid Format','id'=>$document->id]);
              break;
          }
        }
      @endphp

      <p>Name: {{$member->f_name}} {{$member->surname}}</p>
      <p>Contact: {{$member->cell_number}}</p>
      <p>Email: {{$member->user->email}}</p>

      <!--Member Status-->
      @switch($member->misc->status)
        @case('incomplete')
          <p>Status: <span class="txt-green">Registered</span></p>
          <p>Application: <span class="txt-red">Incomplete</span></p>
          @break
        @case('review')
          <p>Status: <span class="txt-green">Registered</span></p>
          <p>Application: <span class="txt-yellow">Reviewing</span></p>
          @break
        @case('approved')
          <p>Status: <span class="txt-green">Registered</span></p>
          <p>Application: <span class="txt-green">Approved</span></p>
          @break
        @case('attention')
          <p>Status: <span class="txt-green">Registered</span></p>
          <p>Application: <span class="txt-yellow">Attention!</span></p>
          @break
        @case('blocked')
          <p>Status: <span class="txt-red">Blocked</span></p>
          <p>Application: <span class="txt-red">Rejected!</span></p>
          @break
        @default
          <p>Status: <span class="txt-red">Not Defined</span></p>
      @endswitch

     {{--  @if ($member->misc->status == "incomplete")
        <p>Status: <span class="txt-green">Registered</span></p>
        <p>Application: <span class="txt-red">Incomplete</span></p>
      @elseif ($member->misc->status == "review")
        <p>Status: <span class="txt-green">Registered</span></p>
        <p>Application: <span class="txt-yellow">Reviewing</span></p>
      @elseif ($member->misc->status == "approved")
        <p>Status: <span class="txt-green">Registered</span></p>
        <p>Application: <span class="txt-green">Approved</span></p>
      @elseif ($member->misc->status == "rejected")
        <p>Status: <span class="txt-green">Registered</span></p>
        <p>Application: <span class="txt-red">Rejected</span></p>
      @elseif(($member->misc->status == "verifyingApplication"))
        <p>Status: <span class="txt-green">Registered</span></p>
        <p>Application: <span class="txt-yellow">Submitted</span></p>
      @else
        <p>Status: <span class="txt-red">Not Defined</span></p>
      @endif --}}

      <br>

      {{-- List Documents --}}
      @if(count($docIDandType) > 0)
        <p><b>Uploaded Documents:</b></p>
          <ol class="uploadedDocs">
            @foreach($docIDandType as $document)
              <li class="li-card">
                <span class="li-width">{{$document['type']}}</span>
                <a class="delete" id="delete{{$document['id']}}" onclick="showConfirmDelete({{$document['id']}})">Delete</a>
                <a class="confirmDelete" href="/files/delete/{{$document['id']}}" hidden id="confirmDelete{{$document['id']}}">Confirm Delete</a> | 
                <a href="/files/download/{{$document['id']}}">View</a>
              </li>
            @endforeach
          </ol>
      @else
        <p><b>Uploaded Documents:</b></p>
        <ol class="uploadedDocs">
          <li>None</li>
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

    <div>
      <div class="profile-btns-desktop">
        @include('partials.profile_btns')
      </div>
    </div>
  </div>
@endsection
