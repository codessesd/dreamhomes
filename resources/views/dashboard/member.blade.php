@extends('dashboard.layout.dashboard')

@section('content')
<div class="application c80">
  <form class="applicant-details" action="/apply/step1" method="POST">
      {{csrf_field()}}
    <div class="form-divide">
      <h1>Member Details</h1>
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
      <div class=" form-group marital-status w33">
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
      <div class="form-group insolvent w33">
        <label>Insolvent?*</label>
        <select name="member[insolvency]">
          @php $inslv = $member->insolvency; @endphp
          <option value="No" @if($inslv=='No') selected @endif>No</option>
          <option value="Yes|Rehabilitated" @if($inslv=='Yes|Rehabilitated') selected @endif>Yes, I have been rehabilitated</option>
          <option value="Yes|NotRehabilitated" @if($inslv=='Yes|NotRehabilitated') selected @endif>Yes, I have NOT been rehabilitated</option>
        </select>
      </div>
      <div class="form-group insolv2 w33">
        <label>Debt management or liquidation?*</label>
        <select name="member[liquidation]">
          @php $liq = $member->liquidation; @endphp
          <option value="No" @if($liq=='No') selected @endif>No</option>
          <option value="Yes" @if($liq=='Yes') selected @endif>Yes</option>
        </select>
      </div>
      <div class="form-group physical-address w100">
        <br>
        <label>Physical Address*</label>
        <div class="grid-3">
          <input id="addr_line1" type="text" value="{{$member->home_address['addr_line1']}}" name="home_address[addr_line1]" placeholder="Address Line 1*">
          <input id="addr_line2" type="text" value="{{$member->home_address['addr_line2']}}" name="home_address[addr_line2]" placeholder="Address Line 2">
          <input id="suburb" type="text" value="{{$member->home_address['suburb']}}" name="home_address[suburb]" placeholder="Suburb*">
          <input id="city" type="text" value="{{$member->home_address['city']}}" name="home_address[city]" placeholder="City*">
          <input id="area_code" type="text" value="{{$member->home_address['area_code']}}" name="home_address[area_code]" placeholder="Area Code*">
        </div>
      </div>
      <div class="form-group postal-address w50">
        <label for="post_address[post_line1]">Postal Address*</label>
        {{-- <input type="checkbox" id="postCheckbox" onchange="populatePostAddress()"><label for="postCheckbox" class="lbl-minor">Same of Physical</label> --}}
        <div class="clr"></div>
        <textarea class="w100 post-address" rows="5" id="post-line1" name="post_address[post_line1]">{{$member->post_address['post_line1']}}</textarea><br>
        <input class="w33" type="text" id="post-code" value="{{$member->post_address['post_code']}}" name="post_address[post_code]" placeholder="Postal Code*">
      </div>
      <div class="clr"></div>
    </div>

    <div class="form-divide">
      <h1>Next of Kin</h1>

      <div class="grid1122">
        <div class="form-group">
          <label for="title">Title*</label>
          <input type="text" name="title" value="{{$member->next_of_kin['title']}}">
        </div>
        <div class="form-group">
          <label for="initials">Initials*</label>
          <input type="text" name="initials" value="{{$member->next_of_kin['initials']}}">
        </div>
        <div class="form-group">
          <label for="first-name">First Name*</label>
          <input type="text" name="name" value="{{$member->next_of_kin['name']}}">
        </div>
        <div class="form-group">
          <label for="surname">Surname*</label>
          <input type="text" name="surname" value="{{$member->next_of_kin['surname']}}">
        </div>
      </div>
      <div class="form-group w33">
        <label for="relationship">Relationship*</label>
        <select class="w100" name="relationship">
          <option value="Spouse" @if($member->next_of_kin['relationship'] == 'Spouse')  selected @endif>Spouse</option>
          <option value="Child" @if($member->next_of_kin['relationship'] == 'Child') selected @endif>Child</option>
          <option value="Mother" @if($member->next_of_kin['relationship'] == 'Mother') selected @endif>Mother</option>
          <option value="Father" @if($member->next_of_kin['relationship'] == 'Father') selected @endif>Father</option>
          <option value="Sister" @if($member->next_of_kin['relationship'] == 'Sister') selected @endif>Sister</option>
          <option value="Brother" @if($member->next_of_kin['relationship'] == 'Brother') selected @endif>Brother</option>
          <option value="Other" @if($member->next_of_kin['relationship'] == 'Other') selected @endif>Other</option>
        </select>
      </div>
      <div class="form-group cell-no w33">
        <label for="contact_no">Cell Phone No.</label>
        <input type="text" name="contact_no" value="{{$member->next_of_kin['contact_no']}}">
      </div>
      <div class="form-group email w33">
        <label for="email">Email</label>
        <input type="text" name="email" value="{{$member->next_of_kin['email']}}">
      </div>
      <div class="form-group physical-address w50">
        <label>Physical Address*</label>
        <div class="">
          <textarea class="w100" rows="2" name="address_line_1">{{$member->next_of_kin['address_line_1']}}</textarea><br>
          <input type="text" class="w33" name="suburb" placeholder="Surbub" value="{{$member->next_of_kin['suburb']}}">
          <input type="text" class="w33" name="city" placeholder="City" value="{{$member->next_of_kin['city']}}">
          <input type="text" class="w33" name="area_code" placeholder="Area Code" value="{{$member->next_of_kin['area_code']}}">
        </div>
      </div>
      <div class="form-group postal-address w50">
        <label>Postal Address</label>
        <textarea class="w100" rows="2" name="postal_address">{{$member->next_of_kin['postal_address']}}</textarea><br>
        <input class="w33" type="text" class="" name="postal_code" placeholder="Postal Code" value="{{$member->next_of_kin['postal_code']}}">
      </div>
      <div class="clr"></div>
    </div>

    <div class="form-divide">
      <h1>Beneficiaries</h1>

      <div class="grid1111 w100">
          <h4>Name</h4>
          <h4>Surname</h4>
          <h4>Relationship</h4>
          <h4>ID/Passport</h4>
        </div>
        <div class="line spacer-btm"></div>
      @php $i = 0; @endphp
      @foreach($member->beneficiaries as $beneficiary)
        <div class="grid1111 w100 grid-list">
          <span>{{++$i}}. {{$beneficiary->name}}</span>
          <span>{{$beneficiary->surname}}</span>
          <span>{{$beneficiary->relationship}}</span>
          <span>{{$beneficiary->id_number}}</span>
          <span class="remove" onclick="location.href='/apply/step3/remove/{{$beneficiary->id}}'"><i class="fas fa-trash-alt"></i></span>
        </div>
      @endforeach
        <div class="grid1111 w100">
          <div class="form-group">
            <input oninput="enableAddBen()" id="name" type="text" name="name" required>
          </div>
          <div class="form-group">
            <input oninput="enableAddBen()" id="surname" type="text" name="surname" required>
          </div>
          <div class="form-group">
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
          <div class="form-group">
            <input oninput="enableAddBen()" id="id_number" type="text" name="id_number" required>
          </div>
          <div class="form-group btn-add">
            <button type="submit" ><i class="fas fa-plus-square"></i></button>
          </div>
        </div>
    </div>

    <div class="form-divide">
      <h1>Areas of Choice</h1>

      <div class="grid11 w100">
            <h4>Municipality</h4>
            <h4>Area</h4>
          </div>
          <div class="line spacer-btm"></div>
        @php $i = 0; @endphp
        @foreach($member->areas as $area)
          <div class="grid11 w100 grid-list">
            <span>{{++$i}}. {{$area->municipality}}</span>
            <span>{{$area->area}}</span>
            <span class="remove" onclick="location.href='/apply/step4/remove/{{$area->id}}'"><i class="fas fa-trash-alt"></i></span>
          </div>
        @endforeach
          <div class="grid11 w100">
            <div class="form-group">
              {{-- <input id="municipality" type="text" name="municipality" required> --}}
              <select class="w100 padd5" id="municipality" name="municipality" required>
                <option value="Ekurhuleni">Ekurhuleni</option>
                <option value="Sedibeng/Vaal">Sedibeng/Vaal</option>
                <option value="City of Joburg">City of Joburg</option>
                <option value="Tshwane">Tshwane</option>
                <option value="West Rand">West Rand</option>
              </select>
            </div>
            <div class="form-group">
              <input id="area" oninput="enableAddArea()" type="text" name="area" required>
            </div>
            <div class="form-group btn-add">
              <button type="submit" ><i class="fas fa-plus-square"></i></button>
            </div>
          </div>
      </div>
  </form>
</div>
@endsection