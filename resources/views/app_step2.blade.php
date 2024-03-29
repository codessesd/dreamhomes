@extends('layouts.master')

@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  @if(count($errors) > 0)
    @include('partials.floatingMsg')
  @endif
  <div class="application">
    <h1>APPLICANTION STEP 2 OF 6</h1>
    <h3>Spouse/Next Of Kin</h3>

    <form class="applicant-details" id="main-form" action="/apply/step2" method="POST">
      {{csrf_field()}}
      <div class="grid1122">
        <div class="form-group">
          <label for="title">Title*</label>
          <input type="text" name="title" value="{{ $nextOfKin['title'] ?? '' }}">
        </div>
        <div class="form-group">
          <label for="initials">Initials*</label>
          <input type="text" name="initials" value="{{ $nextOfKin['initials'] ?? '' }}">
        </div>
        <div class="form-group nok-name">
          <label for="first-name">Name(s)*</label>
          <input type="text" name="name" value="{{ $nextOfKin['name'] ?? '' }}">
        </div>
        <div class="form-group nok-sur">
          <label for="surname">Surname*</label>
          <input type="text" name="surname" value="{{ $nextOfKin['surname'] ?? '' }}">
        </div>
      </div>
      <div class="form-group w33">
        <label for="relationship">Relationship*</label>
        <select class="w100" name="relationship">
          <option value="Spouse">Spouse</option>
          <option value="Child">Child</option>
          <option value="Mother">Mother</option>
          <option value="Father">Father</option>
          <option value="Sister">Sister</option>
          <option value="Brother">Brother</option>
          <option value="Other">Other</option>
        </select>
      </div>
      <div class="form-group cell-no w33">
        <label for="contact_no">Cell Phone No.</label>
        <input type="text" name="contact_no" value="{{ $nextOfKin['contact_no'] ?? '' }}">
      </div>
      <div class="form-group email w33">
        <label for="email">Email</label>
        <input type="text" name="email" value="{{ $nextOfKin['email'] ?? '' }}">
      </div>
      <div class="physical-address w50">
        <label>Physical Address*</label>
        <div class="">
          <textarea class="w100" rows="5" name="address_line_1">{{ $nextOfKin['address_line_1'] ?? '' }}</textarea><br>
          <input type="text" class="w33" name="suburb" placeholder="Suburb" value="{{ $nextOfKin['suburb'] ?? '' }}">
          <input type="text" class="w33" name="city" placeholder="City" value="{{ $nextOfKin['city'] ?? '' }}">
          <input type="text" class="w33" name="area_code" placeholder="Area Code" value="{{ $nextOfKin['area_code'] ?? '' }}">
        </div>
      </div>
      <div class="postal-address w50">
        <label>Postal Address</label>
        <textarea class="w100" rows="5" name="postal_address">{{ $nextOfKin['postal_address'] ?? '' }}</textarea><br>
        <input class="w33" type="text" name="postal_code" placeholder="Postal Code" value="{{ $nextOfKin['postal_code'] ?? '' }}">
      </div>
      <div class="clr"></div>
      <button type="submit" class="spacer btn">Next</button>
      <button type="button" onclick="location.href='/apply/step1'" class="spacer btn">Back</button>
    </form>
  </div>
@endsection
