{{-- Member details popup ************************************************--}}
<div class="member-details-card" id="member-details{{$member->id}}">
  <div class="mem-top-nav bg-primary">
    <i class="fas fa-times" onclick="toggleMemberDetails({{$member->id}})"></i>
    <i class="fas fa-save" onclick="saveMember({{$member->id}})"></i>
    <i class="fas fa-print" id="ajax-tester"></i>
    <span class="msg-line" id="msg-line{{$member->id}}"></span>
  </div>

  <form class="form-50" id="member-form{{$member->id}}" action="updateMember" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$member->id}}">
    <div class="dash-form-group">
      <label for="created_at">Date of Application: </label>
      <input class="borderless" type="text" name="miscs[created_at]" value="{{$member->misc->created_at}}" readonly>
    </div>
 
    <div class="dash-form-group">
      <label for="membership_no">Membership Number: </label>
      <input class="borderless" type="text" name="miscs[membership_no]" value="{{$member->misc->membership_no}}">
    </div>
    
    <div class="dash-form-group">
      <label for="member_certified_id">Member ID</label>
      <select name="miscs[member_certified_id]">
        @php $mID = $member->misc->member_certified_id @endphp
        <option value='Not Received' @if($mID == 'Not Received') selected @endif>Not Received</option>
        <option value='Received' @if($mID == 'Received') selected @endif>Received</option>
      </select>
    </div>

    <div class="dash-form-group">
      <label for="position">Position: </label>
      <input class="borderless" type="number" name="miscs[position]" value="{{$member->misc->position}}">
    </div>

    <div class="dash-form-group">
      <label for="join_fee">Joining Fee: </label>
      @php $jFee= $member->misc->join_fee @endphp
      <select name='miscs[join_fee]'>
        <option value='Not Received' @if( $jFee=='Not Received') selected @endif>Not Received</option>
        <option value='Received' @if( $jFee=='Received') selected @endif>Received</option>
      </select>
    </div>

    <div class="dash-form-group">
      <label for="life_cover">Life Cover: </label>
      <input class="borderless" type="text" name="miscs[life_cover]" value="{{$member->misc->life_cover}}">
    </div>

    <div class="dash-form-group">
      <label for="pop">Proof of Payment: </label>
      @php $pop= $member->misc->pop @endphp
      <select name='miscs[pop]'>
        <option value='Not Received' @if( $pop=='Not Received') selected @endif>Not Received</option>
        <option value='Received' @if( $pop=='Received') selected @endif>Received</option>
      </select>
    </div>

    <div class="dash-form-group">
      <label for="date_payment">Date of<br>Payment: </label>
      <input class="borderless" type="date" name="miscs[date_payment]" value="{{$member->misc->date_payment}}">
    </div>

    <div class="dash-form-group">
      <label for="nok">Spouse/Next Of Kin: </label>
      @php $nok= $member->misc->nok @endphp
      <select name='miscs[nok]'>
        <option value='Not Confirmed' @if( $nok=='Not Confirmed') selected @endif>Not Confirmed</option>
        <option value='Confirmed' @if( $nok=='Confirmed') selected @endif>Confirmed</option>
      </select>
    </div>

    <div class="dash-form-group">
      <label for="nok_id">Spouse/Next Of Kin ID: </label>
      @php $nokID= $member->misc->nok_id @endphp
      <select name='miscs[nok_id]'>
        <option value='Not Received' @if( $nokID=='Not Received') selected @endif>Not Received</option>
        <option value='Received' @if( $nokID=='Received') selected @endif>Received</option>
      </select>
    </div>

    <div class="dash-form-group">
      <label for="beneficiary">Beneficiaries: </label>
      @php $benf= $member->misc->beneficiary @endphp
      <select name='miscs[beneficiary]'>
        <option value='Not Confirmed' @if( $benf=='Not Confirmed') selected @endif>Not Confirmed</option>
        <option value='Confirmed' @if( $benf=='Confirmed') selected @endif>Confirmed</option>
      </select>
    </div>

    <div class="dash-form-group">
      <label for="beneficiary_id">Beneficiaries IDs: </label>
      @php $benID= $member->misc->beneficiary_id @endphp
      <select name='miscs[beneficiary_id]'>
        <option value='Not Received' @if( $benID=='Not Received') selected @endif>Not Received</option>
        <option value='Received' @if( $benID=='Received') selected @endif>Received</option>
      </select>
    </div>

    <div class="dash-form-group">
      <label for="updated_at">Date Updated: </label>
      <input class="borderless" type="text" name="miscs[updated_at]" value="{{$member->misc->updated_at}}" readonly>
    </div>

    <div class="dash-form-group">
      <label for="processed_by">Updated By: </label>
      @php
        $pById = $member->misc->processed_by;
        $pByName = ($pById == null) ? '': $processedBy[$pById]['name'].' '.$processedBy[$pById]['surname'];
      @endphp
      <input class="borderless" type="text" name="miscs[processed_by]" value="{{$pByName}}" readonly>
    </div>

    <button type="submit">Test submit </button>
  </form>
</div>