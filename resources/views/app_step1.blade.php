@extends('layouts.master')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  @if(count($errors) > 0)
    @include('partials.floatingMsg')
  @endif
  <div class="application">
    <h1>APPLICANTION STEP 1 OF 6</h1>

    <form class="applicant-details" action="/apply/step1" method="POST">
      {{csrf_field()}}
      <div class="form-group title">
        <label for="title">Title*</label>
        <input type="text" value="{{$member->title}}" name="member[title]">
      </div>
      <div class="form-group initials">
        <label for="initials">Initials*</label>
        <input type="text" value="{{$member->initials}}" name="member[initials]">
      </div>
      <div class="form-group first-name">
        <label for="first-name">First Name*</label>
        <input type="text" value="{{$member->f_name}}" name="member[f_name]" disabled>
      </div>
      <div class="form-group mid-name">
        <label for="mid-name">Middle Name</label>
        <input type="text" value="{{$member->middle_name}}" name="member[middle_name]">
      </div>
      <div class="form-group surname w50">
        <label for="surname">Surname*</label>
        <input type="text" value="{{$member->surname}}" name="member[surname]" disabled>
      </div>
      <div class="form-group id-passport w50">
        <label for="id-passport">ID/Passport*</label>
        <input type="text" value="{{$member->id_passport_no}}" name="member[id_passport_no]">
      </div>
      <div class="form-group tel-no w33">
        <label for="tel-no">Tel. No.</label>
        <input type="text" value="{{$member->tel_number}}" name="member[tel_number]">
      </div>
      <div class="form-group cell-no w33">
        <label for="cell-no">Cell Phone No.*</label>
        <input type="text" value="{{$member->cell_number}}" name="member[cell_number]">
      </div>
      <div class="form-group email w33">
        <label for="email">Email*</label>
        <input type="text" value="{{$member->user->email}}" name="user[email]" disabled>
      </div>
      <div class="clr"></div>
      <div class="marital-status">
        <label for="marital-status">Marital Status*</label>
        <select name="member[marital_status]" id="marital-status">
          @php $ms = $member->marital_status; @endphp
          <option value="Single" @if($ms=='Single')selected @endif>Single</option>
          <option value="Community of property" @if($ms=='Community of property')selected @endif>Community Of Property</option>
          <option value="Antenuptial contact" @if($ms=='Antenuptial contact')selected @endif>Antenuptual Contract</option>
          <option value="Widowed" @if($ms=='Widowed')selected @endif>Widowed</option>
          <option value="Divorced" @if($ms=='Divorced')selected @endif>Divorced</option>
          <option value="Civil union" @if($ms=='Civil union')selected @endif>Civil Union</option>
        </select>
      </div>
      <div class="insolvent">
        <label>Have you been declared insolvent?*</label>
        <select name="member[insolvency]">
          @php $inslv = $member->insolvency; @endphp
          <option value="No" @if($inslv=='No') selected @endif>No</option>
          <option value="Yes|Rehabilitated" @if($inslv=='Yes|Rehabilitated') selected @endif>Yes, I have been rehabilitated</option>
          <option value="Yes|NotRehabilitated" @if($inslv=='Yes|NotRehabilitated') selected @endif>Yes, I have NOT been rehabilitated</option>
        </select>
      </div>
      <div class="insolv2">
        <label>Are you under debt management or liquidation?*</label>
        <select name="member[liquidation]">
          @php $liq = $member->liquidation; @endphp
          <option value="No" @if($liq=='No') selected @endif>No</option>
          <option value="Yes" @if($liq=='Yes') selected @endif>Yes</option>
        </select>
      </div>
      <div class="physical-address address">
        <label>Physical Address*</label>
        <div class="grid-3">
          <input id="addr_line1" type="text" value="{{$home_address['addr_line1']}}" name="home_address[addr_line1]" placeholder="Address Line 1*">
          <input id="addr_line2" type="text" value="{{$home_address['addr_line2']}}" name="home_address[addr_line2]" placeholder="Address Line 2">
          <input id="suburb" type="text" value="{{$home_address['suburb']}}" name="home_address[suburb]" placeholder="Suburb*">
          <input id="city" type="text" value="{{$home_address['city']}}" name="home_address[city]" placeholder="City*">
          <input id="area_code" type="text" value="{{$home_address['area_code']}}" name="home_address[area_code]" placeholder="Area Code*">
        </div>
      </div>
      <div class="postal-address address">
        <label for="post_address[post_line1]">Postal Address*</label>
        <input type="checkbox" id="postCheckbox" onchange="populatePostAddress()"> <label for="postCheckbox" class="lbl-minor">Same of Physical</label>
        <div class="clr"></div>
        <textarea class="w33 post-address" rows="5" id="post-line1" name="post_address[post_line1]">{{$post_address['post_line1']}}</textarea><br>
        <input class="w33" type="text" id="post-code" value="{{$post_address['post_code']}}" name="post_address[post_code]" placeholder="Postal Code*">
      </div>
      <div class="clr"></div>
      <button type="submit" class="btn spacer">Next</button>
      <button type="button" onclick="location.href='/profile'" id="btnNxt" class="spacer btn">Save for Later</button>
  </form>
  </div>
@endsection