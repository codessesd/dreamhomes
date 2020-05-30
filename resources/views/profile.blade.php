@extends("layouts.master")
@section('profile','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('fixed-div')

@endsection

@section('section')
  @include('partials.fileUploader')

  @if(count($errors) > 0)
    @include('partials.floatingMsg')
  @endif

  {{-- Profile page *******************************************--}}

  @php
    #NB! I must create a controller for this page and handle all the code in the controller!
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



  <h1 class="center-h"><span class="deBold">Your </span>Profile</h1>
  <div class="profile-div">
    <div class="profile-btns-mobile">
      @include('partials.profile_btns')
    </div>
    <div class="side-menu">
      <h3 class="fl-l">Personal Details</h3>
      @if($member->misc->status == 'incomplete')
        <span class="fl-r profile-btns-menu">
          <img class="profile-btn-open" src="/images/dots.png">
        </span>
      @endif
      <div class="clr"></div>
      <hr>

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
      <br>

      {{-- List Documents --}}
      @if(count($docIDandType) > 0)
        <p><b>Uploaded Documents:</b></p>
          <ol class="uploadedDocs">
            @foreach($docIDandType as $document)
              <li class="li-card">
                <span class="li-width">{{$document['type']}}</span>
                <a href="/files/download/{{$document['id']}}"><i class="txt-green fas fa-download"></i></a>
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
        Account Number: 62843838189 <br>
        Branch Name: Bank City <br>
        Branch Code: 250805 <br>
        Reference: Please put your name and surname
      </p>
    </div>

    <div>
      {{-- <div class="messages">
        <p>
          <ul>
            <li>You have outstanding documents. Please ensure that all documents are sent through to dream homes</li>
          </ul>
        </p>
      </div> --}}
      <div class="profile-btns-desktop"> 
        @if($member->misc->status == 'incomplete') @include('partials.profile_btns')@endif
      </div>
    </div>
  </div>
@endsection
