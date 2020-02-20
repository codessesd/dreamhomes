{{-- Member details popup ************************************************--}}
<div class="member-details-card" id="member-details{{$member->id}}">
  <div class="mem-top-nav bg-primary">

    <i class="fas fa-times" onclick="toggleMemberDetails({{$member->id}})"></i>
    {{-- <i class="fas fa-pen"></i> --}}
    <i class="fas fa-save" onclick="saveMember({{$member->id}})"></i>
    <i class="fas fa-print" id="ajax-tester"></i>
    <span class="msg-line" id="msg-line{{$member->id}}"></span>
  </div>

  <form class="form-50" id="member-form{{$member->id}}" action="updateMember" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$member->id}}">
    <div class="form-group">
      <label for="membership_no">Membership Number: </label>
      <input class="borderless" type="text" name="membership_no" value="{{$member->membership_no}}">
    </div>
    
    <div class="form-group">
      <label for="id_passport_no">ID or Passport: </label>
      <input class="borderless" type="text" name="id_passport_no" value="{{$member->id_passport_no}}">
    </div>

    <div class="form-group">
      <label for="status">Status: </label>
      <input class="borderless" type="text" name="status" value="{{$member->status}}">
    </div>

    <div class="form-group">
      <label for="position">Position: </label>
      <input class="borderless" type="text" name="position" value="{{$member->position}}">
    </div>

    {{-- <div class="hr-line"></div> --}}

    <div class="form-group">
      <label for="title">Title: </label>
      <input class="borderless" type="text" name="title" value="{{$member->title}}">
    </div>

    <div class="form-group">
      <label for="initials">Initials: </label>
      <input class="borderless" type="text" name="initials" value="{{$member->initials}}">
    </div>

    <div class="form-group">
      <label for="f_name">Name: </label>
      <input class="borderless" type="text" name="f_name" value="{{$member->f_name}}">
    </div>

    <div class="form-group">
      <label for="middle_name">Middle Name: </label>
      <input class="borderless" type="text" name="middle_name" value="{{$member->middle_name}}">
    </div>

    <div class="form-group">
      <label for="surname">Surname: </label>
      <input class="borderless" type="text" name="surname" value="{{$member->surname}}">
    </div>

    <div class="form-group">
      <label for="cell_number">Cell: </label>
      <input class="borderless" type="text" name="cell_number" value="{{$member->cell_number}}">
    </div>

    <div class="form-group">
      <label for="tel_number">Tel Number: </label>
      <input class="borderless" type="text" name="tel_number" value="{{$member->tel_number}}">
    </div>

    <div class="form-group">
      <label for="marital_status">Marital Status: </label>
      <input class="borderless" type="text" name="marital_status" value="{{$member->marital_status}}">
    </div>

    <div class="form-group">
      <label for="insolvency">Insolvency: </label>
      <input class="borderless" type="text" name="insolvency" value="{{$member->insolvency}}">
    </div>

    <div class="form-group">
      <label for="liquidation">Liquidation: </label>
      <input class="borderless" type="text" name="liquidation" value="{{$member->liquidation}}">
    </div>

  </form>
</div>