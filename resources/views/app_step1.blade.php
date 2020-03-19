@extends('layouts.master')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="application">
    <h1>APPLICANTION STEP 1 OF 4</h1>

    <form class="applicant-details" action="/apply/step1" method="POST">
      {{csrf_field()}}
      <div class="form-group title">
        <label for="title">Title</label>
        <input type="text" value="{{$member->title}}" name="member[title]">
      </div>
      <div class="form-group initials">
        <label for="initials">Initials</label>
        <input type="text" value="{{$member->initials}}" name="member[initials]">
      </div>
      <div class="form-group first-name">
        <label for="first-name">First Name</label>
        <input type="text" value="{{$member->f_name}}" name="member[f_name]" disabled>
      </div>
      <div class="form-group mid-name">
        <label for="mid-name">Middle Name</label>
        <input type="text" value="{{$member->middle_name}}" name="member[middle_name]">
      </div>
      <div class="form-group surname w50">
        <label for="surname">Surname</label>
        <input type="text" value="{{$member->surname}}" name="member[surname]" disabled>
      </div>
      <div class="form-group id-passport w50">
        <label for="id-passport">ID/Passport</label>
        <input type="text" value="{{$member->id_passport_no}}" name="member[id_passport_no]">
      </div>
      <div class="form-group tel-no w33">
        <label for="tel-no">Tel. No.</label>
        <input type="text" value="{{$member->tel_number}}" name="member[tel_number]">
      </div>
      <div class="form-group cell-no w33">
        <label for="cell-no">Cell Phone No.</label>
        <input type="text" value="{{$member->cell_no}}" name="member[cell_number]">
      </div>
      <div class="form-group email w33">
        <label for="email">Email</label>
        <input type="text" value="{{$member->user->email}}" name="user[email]" disabled>
      </div>
      <div class="marital-status">
        <label for="marital-status">Marital Status</label>
        <select name="member[marital_status]" id="marital-status">
          <option>{{$member->marital_status}}</option>
          <option value="Single">Single</option>
          <option value="Community of property">Community Of Property</option>
          <option value="Antenuptial contact">Antenuptual Contract</option>
          <option value="Widowed">Widowed</option>
          <option value="Divorced">Divorced</option>
          <option value="Civil union">Civil Union</option>
        </select>
      </div>
      <div class="insolvent">
        <label>Have you been declared insolvent?</label>
        <select name="member[insolvency]">
          <option>{{$member->insolvency}}</option>
          <option value="No">No</option>
          <option value="Yes, I have been rehabilitated">Yes, I have been rehabilitated</option>
          <option value="Yes, I have NOT been rehabilitated">Yes, I have NOT been rehabilitated</option>
        </select>
      </div>
      <div class="insolv2">
        <label>Are you under debt management or liquidation?</label>
        <select name="member[liquidation]">
          <option>{{$member->liquidation}}</option>
          <option value="No">No</option>
          <option value="Yes">Yes</option>
        </select>
      </div>
      <div class="physical-address address">
        <label>Physical Address</label>
        <div class="grid-3">
          <input type="text" value="{{$home_address['addr_line1']}}" name="home_address[addr_line1]" placeholder="Address Line 1">
          <input type="text" value="{{$home_address['addr_line2']}}" name="home_address[addr_line2]" placeholder="Address Line 2">
          <input type="text" value="{{$home_address['surbub']}}" name="home_address[suburb]" placeholder="Surbub">
          <input type="text" value="{{$home_address['city']}}" name="home_address[city]" placeholder="City">
          <input type="text" value="{{$home_address['area_code']}}" name="home_address[area_code]" placeholder="Area Code">
        </div>
      </div>
      <div class="postal-address address">
        <label>Postal Address</label>
        <div class="clr"></div>
        <textarea class="w33 post-address" rows="5" name="post_address[post_line1]">{{$post_address['post_line1']}}</textarea><br>
        <input class="w33" type="text" class="" value="{{$post_address['post_code']}}" name="post_address[post_code]" placeholder="Postal Code">
      </div>
      <div class="clr"></div>
      <button type="submit" class="btn">Next</button>
  </form>
  </div>
@endsection
{{--
@section('javascript')
  This javascript is executed onLoad --}}
  {{-- <script type="text/javascript">
    function onLoad(telephone)
    {
      document.getElementById('marital-status').selectedIndex="2";
      document.getElementById('tel_no').value = telephone;
    }
  </script>
@endsection --}}