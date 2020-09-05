<div class="popup-filter" id="popup-filter">
<div class="popup">
  <div class="mem-top-nav bg-primary">
    <p class="pop-topBar">Add New Admin</p>
    {{-- <i class="fas fa-times" onclick="closePopup()"></i> --}}
    <img src="/images/close.svg" alt="close" onclick="closePopup()"/>
    {{-- <i class="fas fa-pen"></i> --}}
  </div>

  <div class="progressBox" id="progressBox">
    <div class="img-div">
      <img id="loading" src="/images/doubleRing.svg" width="80px">
      <img id="warning" src="/images/warning.svg" width="50px">
    </div>
    <div class="clr"></div>
    <span class="responseMsg bg-primary"><b id="responseMsg">This is a long response message  </b></span>
    <span class="okBtn bg-primary" id="okBtn" onclick="closeProgressBox()">OK</span>
  </div>

  <form id="admin-form" action="addAdmin" method="POST">
    {{csrf_field()}}
    <div class="grid-cover-50">
      <div class="dash-form-group">
        <label class=""  for="name">Name </label>
        <input class="softborder" type="text" name="name" value="">
      </div>

      <div class="dash-form-group">
        <label class="" for="surname">Surname </label>
        <input class="softborder" type="text" name="surname" value="">
      </div>

      <div class="dash-form-group">
        <label class="" for="id_number">ID Number </label>
        <input class="softborder" type="text" name="id_number" value="">
      </div>

      <div class="dash-form-group">
        <label class="" for="contact">Contact </label>
        <input class="softborder" type="text" name="contact" value="">
      </div>

      <div class="dash-form-group">
        <label class="" for="email">Email </label>
        <input class="softborder" type="text" name="email" value="">
      </div>

      <div class="dash-form-group">
        <label class="" for="password">Password </label>
        <input class="softborder" type="text" name="password" value="">
      </div>
    </div>

    <div class="perms-cover">
      <fieldset>
        <legend>Write Permissions</legend>
        <button type="button" class="select-all" onclick="selectAll2()">
          <input type="checkbox" id="btnSelectAll" onclick="selectAll2()" readonly>Select All-
        </button>
        <div class="permissions">
          @foreach($tables as $table)
            <div class="entity-cover">
              <p class="entity-name">{{$table}}</p>
              <div class="perms-line"></div>
              <div class="perms-group">
                @foreach($writePermissions->where('entity',$table) as $permission)
                  <input id="{{$permission->attribute}}" class="padded-check" type="checkbox" value="{{$permission->id}}" name="writePermissions[]">
                  <label for="{{$permission->attribute}}">
                    @if(array_key_exists($permission->attribute,$readableNames))
                      {{$readableNames[$permission->attribute]}}
                    @else
                      {{$permission->attribute}}
                    @endif
                  </label>
                @endforeach
              </div>
            </div>
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
