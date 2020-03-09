<div class="popup-filter" id="popup-filter{{$admin->id}}">
<div class="popup">
  <div class="mem-top-nav bg-primary">
    <i class="fas fa-times" onclick="closeAdminDetail({{$admin->id}})"></i>
    {{-- <i class="fas fa-pen"></i> --}}
  </div>

  <div class="progressBox" id="progressBox{{$admin->id}}">
    <div class="img-div">
      <img id="loading{{$admin->id}}" src="/images/giphy3.gif" width="80px">
      <img id="warning{{$admin->id}}" src="/images/warning.svg" width="50px">
    </div>
    <div class="clr"></div>
    <span class="responseMsg"><b id="responseMsg{{$admin->id}}">This is a long response message  </b></span>
    <span class="okBtn" id="okBtn{{$admin->id}}" onclick="closeProgressBox()">OK</span>
  </div>

  <form id="admin-form{{$admin->id}}" action="updateAdmin" method="POST">
    {{csrf_field()}}
    <div class="grid-cover-50">
      <div class="form-group">
        <label class="" for="name">Name </label>
        <input class="softborder" type="text" name="name" value="{{$admin->name}}">
      </div>

      <div class="form-group">
        <label class="" for="surname">Surname </label>
        <input class="softborder" type="text" name="surname" value="{{$admin->surname}}">
      </div>

      <div class="form-group">
        <label class="" for="contact">Contact </label>
        <input class="softborder" type="text" name="contact" value="{{$admin->contact}}">
      </div>

      <div class="form-group">
        <label class="" for="email">Email </label>
        <input class="softborder" type="text" name="email" value="{{$admin->user->email}}" hidden>
        <input class="softborder" type="text" name="disabled-email" value="{{$admin->user->email}}" disabled>
      </div>

      <div class="form-group">
        <label class="" for="password">Password </label>
        <input class="softborder" type="text" name="password" value="">
      </div>

      <div class="form-group" style="display: none">
        {{-- Display has been set to none because this is currently not needed.
        A default admin_level value is currently being assigned.
        Admin powers are being controlled through permissions. --}}
        <label for="admin_level">Admin Level <i class="fas fa-question-circle"></i></label>
        <select class="softborder" name="admin_level">
          <option value="9">Level 1</option>
          <option value="2">Level 2</option>
          <option value="3">Level 3</option>
          <option value="4">Level 4</option>
        </select>
      </div>
      <div class="clr"></div>
    </div>

    <div class="perms-cover">
      <fieldset class="permissions">
        <legend>Write Permissions</legend>
      <div class="form-group permissions">
        @foreach($permissions as $permission)
          @if($permission->type == 'write')
            @if(in_array($permission->id,$admin->permissions->pluck('id')->all()))
              <input class="padded-check" type="checkbox" value="{{$permission->id}}" name="writePermissions[]" checked>
            @else
              <input class="padded-check" type="checkbox" value="{{$permission->id}}" name="writePermissions[]">
            @endif
            <label for="{{$permission->attribute}}">{{$permission->attribute}}</label>
          @endif
        @endforeach
      </div>
      </fieldset>

      <fieldset class="permissions" disabled hidden>
        <legend>Read Permissions</legend>
      <div class="form-group permissions">
        @foreach($permissions as $permission)
          @if($permission->type == 'read')
            <input class="padded-check" type="checkbox" value="{{$permission->id}}" name="readPermissions[]">
            <label for="{{$permission->attribute}}">{{$permission->attribute}}</label>
          @endif
        @endforeach
      </div>
      </fieldset>
    </div>
  </form>
  <div class="clr"></div>
  <span class="btn bg-primary" onclick="updateAdmin({{$admin->id}})"> Update </span>
  <div class="clr"></div>
</div>
</div>

<style type="text/css">

</style>