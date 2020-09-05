@extends('layouts.master')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  @include('partials.fileUploader')

  @if(count($errors) > 0)
    @include('partials.floatingMsg')
  @endif
  <div class="application areas-container">
    <h1>APPLICANTION STEP 5 OF 6</h1>
    <h3>Upload Files</h3>

    <div class="grid-center-form">
      <div></div>
      <div class="up-btns">
        @if($idOrPassport != null)
          <div class="doc-li1">
            <p class="smCaps">{{$idOrPassport->original_name}}</p>
            <span><i onclick="location.href='/files/delete/{{$idOrPassport->id}}'" class="icn fas fa-backspace"></i></span>
          </div>
        @else <p><i>Upload a certified copy of your ID or Passport</i></p> @endif
        <button type="button" class="btn4 w100" onclick="openDialog('ID OR Passport','{{$docTypes['id']}}')">Upload ID/Passport*</button>
        <div class="clr"></div>
        <div class="line spacer-tb"></div>

        @if($proofop != null)
          <div class="doc-li1">
            <p class="smCaps">{{$proofop->original_name}}</p>
            <span><i onclick="location.href='/files/delete/{{$proofop->id}}'" class="icn fas fa-backspace"></i></span>
          </div>
        @else <p><i>Upload proof of payment.</i></p> @endif
        <button type="button" class="btn4 w100" onclick="openDialog('Proof Of Payment','{{$docTypes['pr']}}')">Upload Proof of payment*</button>
        <div class="clr"></div>
        <div class="line spacer-tb"></div>

        @if($supportDoc->count() > 0)
          @foreach($supportDoc as $doc)
            <div class="doc-li1">
              <p class="smCaps">{{$doc->original_name}}</p>
              <span><i onclick="location.href='/files/delete/{{$doc->id}}'" class="icn fas fa-backspace"></i></span>
            </div>
          @endforeach
        @else <p><i>Upload next of kin ID or beneficiary ID etc.</i></p> @endif
        <button type="button" class="btn4 w100" onclick="openDialog('More Supporting Documents','{{$docTypes['su']}}')">Upload More</button>
        <div class="clr"></div>
        <div class="line spacer-tb"></div>

        <div class="spacer-tb"></div>
        <div class="grid111">
          <button type="button" onclick="location.href='/profile'" id="btnNxt" class="btn">Upload Later</button>
          <button type="button" onclick="location.href='/apply/step4_2'" class="btn">Back</button>
          <button type="button" onclick="location.href='/apply/step6'"id="btnNxt" class="btn">Next</button>
        </div>
      </div>
      <div></div>
  </div>
  </div>
@endsection