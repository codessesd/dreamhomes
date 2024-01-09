@extends("layouts.master")
@section('profile','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('fixed-div')

@endsection

@section('section')
  @include('partials.fileUploader')
  @include('partials.inputBox')

  @if(count($errors) > 0)
    @include('partials.floatingMsg')
  @endif

  {{-- Profile page *******************************************--}}

  @php
    #NB! I must create a controller for this page and handle all the code in the controller!

    //get all member documents and store their ID and "readable" type in an array to list them later
    $member = auth()->user()->member;
    $misc = $member->misc;
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
      @if($misc->status == 'incomplete')
        <span class="fl-r profile-btns-menu">
          <img class="profile-btn-open" src="/images/dots.png">
        </span>
      @endif
      <div class="clr"></div>
      <hr>

      <p class="p-par"><span class="p-label">Name:</span> {{$member->f_name}} {{$member->surname}}</p>
      <p class="p-par"><span class="p-label">Contact:</span> {{$member->cell_number}}</p>
      <p class="p-par"><span class="p-label">Email:</span> {{$member->user->email}}</p>
      <p class="p-par"><span class="p-label">Member Number:</span> {{$misc->membership_no == NULL ? 'Not Yet Allocated' : $misc->membership_no}}</p>
      <p class="p-par">
        <span class="p-label">Option:</span>
        @if($misc->investment == 1) {{'285 x 12 months'}} @endif
        @if($misc->investment == 2) {{'450 x 12 months'}} @endif
        @if($misc->investment == 3) {{'750 x 12 months'}} @endif
      </p>

      <!--Member Status-->
      @switch($misc->status)
        @case('incomplete')
          <p class="p-par"><span class="p-label">Status:</span> <span class="txt-green">Registered</span></p>
          <p class="p-par"><span class="p-label">Application:</span> <span class="txt-red">Incomplete</span></p>
          @break
        @case('review')
          <p class="p-par"><span class="p-label">Status:</span> <span class="txt-green">Registered</span></p>
          <p class="p-par"><span class="p-label">Application:</span> <span class="txt-yellow">Reviewing</span></p>
          @break
        @case('approved')
          <p class="p-par"><span class="p-label">Status:</span> <span class="txt-green">Registered</span></p>
          <p class="p-par"><span class="p-label">Application:</span> <span class="txt-green">Approved</span></p>
          @break
        @case('attention')
          <p class="p-par"><span class="p-label">Status:</span> <span class="txt-green">Registered</span></p>
          <p class="p-par"><span class="p-label">Application:</span> <span class="txt-yellow">Attention!</span></p>
          @break
        @case('blocked')
          <p class="p-par"><span class="p-label">Status:</span> <span class="txt-red">Blocked</span></p>
          <p class="p-par"><span class="p-label">Application:</span> <span class="txt-red">Rejected!</span></p>
          @break
        @default
          <p class="p-par"><span class="p-label">Status:</span> <span class="txt-red">Not Defined</span></p>
      @endswitch

      <p class="p-par"><span class="p-label">ROI: </span>{{$misc->amount}}</p>
      <p class="p-par"><span class="p-label">Referred By:</span>
        @if($misc->referred_by == null)
          <button class="btn5 mar-bt8 " onclick="showInputBox()">Select</button>
        @else
          {{$misc->referred_by}}
        @endif
      </p>

    <p class="p-par"><span class="p-label">Payments:</span> <span><a class="c-link" href="/payhistory/{{$member->id}}">View payment history</a></span></p>

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
        Bank Name: Mystical National Bank (MNB) <br>
        Account Holder: Whimsical Estates Enchantment Corp. LLC <br>
        Account Number: 789654321098 <br>
        Branch Name: Enchanted Grove <br>
        Branch Code: 987654 <br>
        Reference: Please include your name and the secret code word "Abracadabra"
    </p>
    </div>

    <div>
      <div class="profile-btns-desktop">
        @if($misc->status == 'incomplete')
          @include('partials.profile_btns')
        @else
          @include('partials.editprof_btns')
        @endif
      </div>
    </div>
  </div>
@endsection
