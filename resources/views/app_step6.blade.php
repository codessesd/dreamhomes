@extends('layouts.master')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  @if(count($errors) > 0)
    @include('partials.floatingMsg')
  @endif

  <div class="application areas-container">
    <h1>Declaration</h1>
      <form class="applicant-details" id="main-form" action="/validation" method="POST">
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
        <p class="agreement aggr-bold">
           Dream Homes Stokvel will not be held liable for any errors or omissions which may have occurred in the production or completion of this application. I authorise  Dream Homes Stokvel to accept this application and the accompanying illustrative quotation on the terms of the illustrative quotation
           <br><br>
        </p>
        <div class="line spacer-tb"></div>
          <div class="form-group fg-aggr w100">
            <p>I hereby give consent to Dream Homes Stokvel to:</p>
            <input type="checkbox" id="sendMeInfo" name="subscriptions[sendMeInfo]" value="1"checked>
            <label for="sendMeInfo"><b>Suggested property Investment and any new or existing product offerings.</b></label>
          </div>
          <div class="clr"></div>
          <div class="line spacer-tb"></div>
          <div class="form-group fg-aggr w100">
            <p>I hereby give consent to Dream Homes Stokvel to refer my details to:</p>
            <input type="checkbox" id="referMyDetails" name="subscriptions[referMyDetails]" value="2" checked>
            <label for="referMyDetails"><b>Dream Homes Stokvel for the purposes of contacting me in relation to any new or existing product offering.</b></label>
          </div>
          <div class="clr"></div>
          <div class="line spacer-tb"></div>
          <div class="form-group fg-aggr w100">
            <input type="checkbox" id="agreement" name="agreement" value="signed" required>
            <label for="agreement"><b>I have read and I agree to the above declaration.</b></label>
          </div>
        <button type="submit" class="spacer btn">Submit</button>
        <button type="button" onclick="location.href='/apply/step5'" class="spacer btn">Back</button>
    </form>
  </div>
@endsection