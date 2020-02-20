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

  <form class="form-50" id="admin-form">
    {{csrf_field()}}

    <div class="form-group">
      <label class="" for="name">Name </label>
      <input id="testInp" class="softborder" type="text" name="name" value="infos">
    </div>

    <div class="form-group">
      <label class="" for="surname">Surname </label>
      <input class="softborder" type="text" name="surname" value="infos">
    </div>

    <div class="form-group">
      <label class="" for="contact">Contact </label>
      <input class="softborder" type="text" name="contact" value="infos">
    </div>

    <div class="form-group">
      <label class="" for="email">Email </label>
      <input class="softborder" type="text" name="email" value="infos@jhg.com">
    </div>

    <div class="form-group">
      <label class="" for="password">Password </label>
      <input class="softborder" type="text" name="password" value="infos">
    </div>

    <div class="form-group">
      <label for="admin_level">Admin Level <i class="fas fa-question-circle"></i></label>
      <select class="softborder" name="admin_level">
        <option value="2">Level 1</option>
        <option value="3">Level 2</option>
        <option value="4">Level 3</option>
        <option value="5">Level 4</option>
      </select>
    </div>

  </form>
  <span class="btn bg-primary" onclick="addAdmin()"> Add </span>
  <div class="clr"></div>
</div>
</div>

<style type="text/css">

</style>