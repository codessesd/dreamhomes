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
      <div>
        @if($idOrPassport != null)
          <div class="doc-li1">
            <p><i>{{$idOrPassport->original_name}}</i></p>
            <span><i onclick="location.href='/files/delete/{{$idOrPassport->id}}'" class="icn fas fa-backspace"></i></span>
          </div>
        @else <p><i>Upload a certified copy of your ID or Passport</i></p> @endif
        <button type="button" class="btn4 w100" onclick="openDialog('ID OR Passport','{{$docTypes['id']}}')">Upload ID/Passport</button>
        <div class="clr"></div>
        <div class="line spacer-tb"></div>

        @if($proofop != null)
          <div class="doc-li1">
            <p><i>{{$proofop->original_name}}</i></p>
            <span><i onclick="location.href='/files/delete/{{$proofop->id}}'" class="icn fas fa-backspace"></i></span>
          </div>
        @else <p><i>Upload proof of payment. <a href="#">How to pay?</a></i></p> @endif
        <button type="button" class="btn4 w100" onclick="openDialog('Proof Of Payment','{{$docTypes['pr']}}')">Upload Proof of payment</button>
        <div class="clr"></div>
        <div class="line spacer-tb"></div>

        @if($supportDoc->count() > 0)
          @foreach($supportDoc as $doc)
            <div class="doc-li1">
              <p><i>{{$doc->original_name}}</i></p>
              <span><i onclick="location.href='/files/delete/{{$doc->id}}'" class="icn fas fa-backspace"></i></span>
            </div>
          @endforeach
        @else <p><i>Upload next of kin ID or beneficiary ID etc.</i></p> @endif
        <button type="button" class="btn4 w100" onclick="openDialog('More Supporting Documents','{{$docTypes['su']}}')">Upload More</button>
        <div class="clr"></div>
        <div class="line spacer-tb"></div>

        <div class="spacer-tb"></div>
        <button type="button" onclick="location.href='/apply/step6'"id="btnNxt" class="spacer btn">Next</button>
        <button type="button" onclick="location.href='/apply/step5'" class="spacer btn">Back</button>
        <button type="button" onclick="location.href='/profile'" id="btnNxt" class="spacer btn">Upload Later</button>
      </div>
      <div></div>
  </div>
  </div>
@endsection