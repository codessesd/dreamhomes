{{-- This search template is for the deprecrated popup search function. --}}
<div class="office-filter" id="search-filter">
<div></div>
<div class="search-card" id="search-card">
  <div class="mem-top-nav bg-primary">
    <p class="pop-topBar">Search</p>
    <i class="fas fa-times" onclick="toggleSearchPopup()"></i>
    {{-- <i class="fas fa-print" id="ajax-tester"></i> --}}
    <span class="msg-line" id="search-msg-line"></span>
  </div>
  <div class="inner-card">
    <form class="" id="search-form" action="/search" method="POST">
      {{csrf_field()}}
      <input type="text" class="softborder s-in" name="search-text">
      
      <input type="radio" name="searchBy" id="id" value="id" checked>
      <label for="id">ID Number</label>
      <input type="radio" name="searchBy" id="membership" value="membership">
      <label for="membership">Membership</label>
      <input type="radio" name="searchBy" id="surname" value="surname">
      <label for="surname">Surname</label>
      
      <button type="submit" class="search-btn">Search</button>
    </form>
    <div class="clr"></div>
  </div>
</div>
<div></div>
</div>