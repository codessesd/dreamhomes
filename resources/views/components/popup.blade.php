<div class="popup-filter" id="popup-filter">
<div class="popup">
  <div class="mem-top-nav bg-primary">
    <i class="fas fa-times" onclick="closePopup()"></i>
    {{-- <i class="fas fa-pen"></i> --}}
  </div>

  <div class="progressBox" id="progressBox">
    <div class="img-div">
      <img id="loading" src="/images/giphy3.gif" width="80px">
      <img id="warning" src="/images/warning.svg" width="50px">
    </div>
    <div class="clr"></div>
    <span class="responseMsg"><b id="responseMsg">This is a long response message  </b></span>
    <span class="okBtn" id="okBtn" onclick="closeProgressBox()">OK</span>
  </div>

  <form id="admin-form" action="addAdmin" method="POST">
    {{csrf_field()}}
    <div class="grid-cover-50">
      <div class="form-group">
        <label class=""  for="name">Name </label>
        <input class="softborder" type="text" name="name" value="Makhado">
      </div>

      <div class="form-group">
        <label class="" for="surname">Surname </label>
        <input class="softborder" type="text" name="surname" value="Makhado">
      </div>

      <div class="form-group">
        <label class="" for="contact">Contact </label>
        <input class="softborder" type="text" name="contact" value="0987655">
      </div>

      <div class="form-group">
        <label class="" for="email">Email </label>
        <input class="softborder" type="text" name="email" value="M@kh.do">
      </div>

      <div class="form-group">
        <label class="" for="password">Password </label>
        <input class="softborder" type="text" name="password" value="Makhado">
      </div>

      {{-- <div class="form-group" disabled hidden>
         Display has been set to none because this is currently not needed.
        A default admin_level value is currently being assigned.
        Admin powers are being controlled through permissions.
        <label for="admin_level">Admin Level <i class="fas fa-question-circle"></i></label>
        <select class="softborder" name="admin_level">
          <option value="1">Level 1</option>
          <option value="2">Level 2</option>
          <option value="3">Level 3</option>
          <option value="4">Level 4</option>
        </select>
      </div> --}}
      {{-- <div class="clr"></div> --}}
      {{-- <button type="submit">Test submit</button> --}}
    </div>

    <div class="perms-cover">
      <fieldset class="permissions">
      <legend>Write Permissions</legend>
      <div class="form-group permissions">
        @foreach($permissions as $permission)
          @if($permission->type == 'write')
            <input class="padded-check" type="checkbox" value="{{$permission->id}}" name="writePermissions[]">
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
  <span class="btn bg-primary" onclick="addAdmin()"> Add </span>
  <div class="clr"></div>
</div>
</div>

<style type="text/css">

</style>