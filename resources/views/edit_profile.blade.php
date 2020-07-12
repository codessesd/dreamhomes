@extends('layouts.master')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  @if(count($errors) > 0)
    @include('partials.floatingMsg')
  @endif
  <div class="application">
    <h1>My Profile</h1>

    <form class="applicant-details" action="/save_profile" method="POST">
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
        <input type="text" value="{{$member->id_passport_no}}" name="member[id_passport_no]" disabled>
      </div>
      <div class="form-group tel-no w33">
        <label for="tel-no">Tel. No.</label>
        <input type="text" value="{{$member->tel_number}}" name="member[tel_number]">
      </div>
      <div class="form-group cell-no w33">
        <label for="cell-no">Cell Phone No.*</label> <input type="text" value="{{$member->cell_number}}" name="member[cell_number]"> </div>
      <div class="form-group email w33">
        <label for="email">Email*</label>
        <input type="text" value="{{$member->user->email}}" name="user[email]" disabled>
      </div>
      <div class="clr"></div>
      {{-- <div class="marital-status">
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
      </div> --}}
      {{-- <div class="insolv2">
        <label>Are you under debt management or liquidation?*</label>
        <select name="member[liquidation]">
          @php $liq = $member->liquidation; @endphp
          <option value="No" @if($liq=='No') selected @endif>No</option>
          <option value="Yes" @if($liq=='Yes') selected @endif>Yes</option>
        </select>
      </div> --}}
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
      {{-- ------------------------------------------------------------------------------ --}}
      <h1>Next of kin</h1>
      <div class="grid1122">
        <div class="form-group">
          <label for="title">Title*</label>
          <input type="text" name="next_of_kin[title]" value="{{$nextOfKin['title']}}">
        </div>
        <div class="form-group">
          <label for="initials">Initials*</label>
          <input type="text" name="next_of_kin[initials]" value="{{$nextOfKin['initials']}}">
        </div>
        <div class="form-group nok-name">
          <label for="first-name">Name(s)*</label>
          <input type="text" name="next_of_kin[name]" value="{{$nextOfKin['name']}}">
        </div>
        <div class="form-group nok-sur">
          <label for="surname">Surname*</label>
          <input type="text" name="next_of_kin[surname]" value="{{$nextOfKin['surname']}}">
        </div>
      </div>
      <div class="form-group w33">
        <label for="relationship">Relationship*</label>
        <select class="w100" name="next_of_kin[relationship]">
          <option value="Spouse" @if($nextOfKin['relationship'] == 'Spouse')  selected @endif>Spouse</option>
          <option value="Child" @if($nextOfKin['relationship'] == 'Child') selected @endif>Child</option>
          <option value="Mother" @if($nextOfKin['relationship'] == 'Mother') selected @endif>Mother</option>
          <option value="Father" @if($nextOfKin['relationship'] == 'Father') selected @endif>Father</option>
          <option value="Sister" @if($nextOfKin['relationship'] == 'Sister') selected @endif>Sister</option>
          <option value="Brother" @if($nextOfKin['relationship'] == 'Brother') selected @endif>Brother</option>
          <option value="Other" @if($nextOfKin['relationship'] == 'Other') selected @endif>Other</option>
        </select>
        {{-- <input type="text" name="next_of_kin[relationship" value="{{$nextOfKin['relationship']}}"> --}}
      </div>
      <div class="form-group cell-no w33">
        <label for="contact_no">Cell Phone No.</label>
        <input type="text" name="next_of_kin[contact_no]" value="{{$nextOfKin['contact_no']}}">
      </div>
      <div class="form-group email w33">
        <label for="email">Email</label>
        <input type="text" name="next_of_kin[email]" value="{{$nextOfKin['email']}}">
      </div>
      <div class="physical-address w50">
        <label>Physical Address</label>
        <div class="">
          <textarea class="w100" rows="5" name="next_of_kin[address_line_1]">{{$nextOfKin['address_line_1']}}</textarea><br>
          <input type="text" class="w33" name="next_of_kin[suburb]" placeholder="Surbub" value="{{$nextOfKin['suburb']}}">
          <input type="text" class="w33" name="next_of_kin[city]" placeholder="City" value="{{$nextOfKin['city']}}">
          <input type="text" class="w33" name="next_of_kin[area_code]" placeholder="Area Code" value="{{$nextOfKin['area_code']}}">
        </div>
      </div>
      <div class="postal-address w50">
        <label>Postal Address</label>
        <textarea class="w100" rows="5" name="next_of_kin[postal_address]">{{$nextOfKin['postal_address']}}</textarea><br>
        <input class="w33" type="text" class="" name="next_of_kin[postal_code]" placeholder="Postal Code" value="{{$nextOfKin['postal_code']}}">
      </div>
      <div class="clr"></div>
      {{-- <button type="submit" class="spacer btn">Next</button> --}}
      {{-- <button type="button" onclick="location.href='/apply/step1'" class="spacer btn">Back</button> --}}
      {{-- ------------------------------------------------------------------------------- --}}
      <h1>Beneficiaries</h1>
      <div class="scrollable">
    <div class="mw550">
      {{csrf_field()}}
        <div class="grid1111 w100">
          <h4>Name</h4>
          <h4>Surname</h4>
          <h4>Relationship</h4>
          <h4>ID/Passport</h4>
        </div>
        <div class="line spacer-btm"></div>
      @php $i = 0; @endphp
      @foreach($beneficiaries as $beneficiary)
        <div class="grid1111 w100 grid-list" id="benefDiv{{$beneficiary->id}}">
          <span>{{++$i}}. {{$beneficiary->name}}</span>
          <span>{{$beneficiary->surname}}</span>
          <span>{{$beneficiary->relationship}}</span>
          <span>{{$beneficiary->id_number}}</span>
          <span class="remove" onclick="deleteBenef({{$beneficiary->id}})"><img class="img-btn2" src="/images/cross.png"></span>
        </div>
      @endforeach
        <div class="grid1111 w100">
          <div class="form-group">
            <input id="name" type="text" name="beneficiary[name]">
          </div>
          <div class="form-group">
            <input id="surname" type="text" name="beneficiary[surname]">
          </div>
          <div class="form-group">
            <select class="w100" name="beneficiary[relationship]">
              <option value="Spouse">Spouse</option>
              <option value="Child">Child</option>
              <option value="Mother">Mother</option>
              <option value="Father">Father</option>
              <option value="Sister">Sister</option>
              <option value="Brother">Brother</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <input id="id_number" type="text" name="beneficiary[id_number]">
          </div>
          <div class="form-group btn-add">
            <button type="submit" onclick=""><img class="img-btn" src="/images/plus_green.svg"></button>
          </div>
        </div>
      <div class="clr"></div>
      {{--some users seem to be having a problem moving to app_step4_2 so I changed the 'next' button code --}}
      {{-- <button type="button" id="btnNxt" class="btn spacer" onclick="submitBeneficiary()">Next</button> --}}
      {{-- <button type="button" id="btnStep4" class="btn spacer" onclick="location.href='/apply/step4_2'">Step 4</button> --}}
      {{-- <button type="button" onclick="location.href='/apply/step2'" class="btn spacer">Back</button> --}}
  </div>
  </div>

      <button type="submit" class="btn spacer">Save Changes</button>
      <button type="button" onclick="location.href='/profile'" id="btnNxt" class="spacer btn">Cancel</button>
  </form>
  </div>
@endsection