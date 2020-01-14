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
        $member = auth()->user()->member();
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

      <p>Name: {{auth()->user()->member()->f_name}} {{auth()->user()->member()->surname}}</p>
      <p>Contact: {{auth()->user()->member()->cell_number}}</p>
      <p>Email: {{auth()->user()->email}}</p>

      <!--Member Status-->
      @if ($member->status == "incomplete")
        <p>Status: <span class="txt-green">Registered</span></p>
        <p>Application: <span class="txt-red">Incomplete</span></p>
      @elseif ($member->status == "complete")
        <p>Status: <span class="txt-green">Registered</span></p>
        <p>Application: <span class="txt-green">Complete</span></p>
      @elseif ($member->status == "blocked")
        <p>Status: <span class="txt-red">Blocked Account</span></p>
      @elseif(($member->status == "verifyingApplication"))
        <p>Status: <span class="txt-green">Registered</span></p>
        <p>Application: <span class="txt-yellow">Submitted</span></p>
      @else
        <p>Status: <span class="txt-red">Not Defined</span></p>
      @endif

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
