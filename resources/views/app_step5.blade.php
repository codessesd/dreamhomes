@extends('layouts.master')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="application areas-container">
    <h1>Declaration</h1>
    {{-- <h3>Area Of Choice</h3> --}}

      <form class="applicant-details" id="main-form" action="/apply/step4" method="POST">
        {{csrf_field()}}
        <p class="agreement">
          I conﬁrm that I have read and understood the Application Document and Contract Details sections of the application forms, related quotes and all related documents for each of these.
          <br><br>
          I declare that the statements and responses provided by me and all documentation that I have signed or will sign in relation to each application/s are true and complete.
          <br><br>
          I agree that this application and declaration, together with all relevant documents that have been or will be signed by me or any additional parties in terms of this application, shall form part of the contract between Dream Homes Stokvel and myself. If any information is withheld or incorrect, I understand that the beneﬁts will be cancelled from the inception date of the membership and all monthly contributions that have been paid to Dream Homes Stokvel will be forfeited. Where I am married in community of property, I declare that I have the written consent of my spouse to make this application. 
          <br><br>
          I agree that should Dream Homes Stokvel accept this application; the acceptance will be conditional upon there having been no change to the facts on which the acceptance was based. I agree that any changes to the finance or risk status of my life will be communicated to Dream Homes Stokvel in writing before it accepts this application, and failure to do so may result in the rejection of any future benefits.
          <br><br>
          I understand that if the ﬁrst contribution is not paid on or before the ﬁrst agreed date, no membership will be provided, and no claims will be payable under the membership for that period until the ﬁrst contribution is received in full by Dream Homes Stokvel and its administrators Su Casa Property Investment Group PTY LTD.
          <br><br>
        </p>
        <div class="line spacer-tb"></div>
          I hereby give consent to Dream Homes Stokvel to send me any relevant information relating to:
          <br>
          <div class="form-group fg-aggr">
            <span class="bullet"><b>Suggested property Investment and any new or existing product offerings</b></span>
            <input type="text" name="" value="">
          </div>
          <div class="line spacer-tb"></div>
          I hereby give consent to Dream Homes Stokvel to refer my details to:
          <br>
          <div class="form-group fg-aggr">
            <span class="bullet"><b>Dream Homes Stokvel for the purposes of contacting me in relation to any new or existing product offering</b></span>
            <input type="text" name="" value="">
          </div>
          <div class="line spacer-tb"></div>
          <p class="agreement aggr-bold">
            <br><br>
             Dream Homes Stokvel will not be held liable for any errors or omissions which may have occurred in the production or completion of this application.
             <br>
             I authorise  Dream Homes Stokvel to accept this application and the accompanying illustrative quotation on the terms of the illustrative quotation
             <br><br>
          </p>
        <div class="clr"></div>
        {{-- <button onclick="location.href='/profile'" class="spacer btn">Save for later</button> --}}
        {{-- <span onclick="submitArea()" class="spacer btn">Submit</span> --}}
        <button onclick="submitArea()" class="spacer btn">Submit</button>
        <span onclick="location.href='/apply/step3'" class="spacer btn">Back</span>
    </form>
  </div>
@endsection