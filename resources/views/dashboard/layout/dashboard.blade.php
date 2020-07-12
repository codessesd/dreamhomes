<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/dashboard/dashboard2.css">
  <link rel="stylesheet" type="text/css" href="/css/applicationform.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300&display=swap" rel="stylesheet">
</head>
<body>
<div class="dashboard">
  @include('dashboard.components.search')
  @php
    $listNum = isset($listNum)? $listNum : 0;
  @endphp
  <div class="sidebar">
    <span class="dash-title">Dashboard
      {{-- <span class="search-glass" onclick="toggleSearchPopup()"><img src="/images/search.svg" width="30"></span> --}}
    </span>
    <ul class="side-nav-links">  
      <li><a href="/members"><span class="side-icon @if($listNum==1) s-active @endif">MB</span>Members</a></li>
      <li><a href="/completed"><span class="side-icon @if($listNum==2) s-active @endif">CO</span>Completed</a></li>
      <li><a href="/pending"><span class="side-icon @if($listNum==3) s-active @endif">PN</span>Pending</a></li>
      <li><a href="/approved"><span class="side-icon @if($listNum==4) s-active @endif">AP</span>Approved</a></li>
      <li><a href="/deleted"><span class="side-icon @if($listNum==6) s-active @endif">DE</span>Deleted</a></li>
      <li><a href="/admins"><span class="side-icon @if($listNum==5) s-active @endif">AD</span>Admins</a></li>
      {{-- <li><a href="/adduser"><span class="side-icon @if($listNum==6) s-active @endif">AD</span>Add Admin</a></li> --}}
    </ul>
  </div>

  <div class="mbl-menu bg-primary" id="mnBtn" onclick="mblMenuToggle()"><i id="mnIcn" class="icn fas fa-caret-down"></i></div>
  <div class="mbl-ddown bg-primary" id="mnDropdown">
    <ul class="side-nav-links">
      <li><a href="/members"><span class="side-icon @if($listNum==1) s-active @endif">MB</span>Members</a></li>
      <li><a href="/completed"><span class="side-icon @if($listNum==2) s-active @endif">CO</span>Completed</a></li>
      <li><a href="/pending"><span class="side-icon @if($listNum==3) s-active @endif">PN</span>Pending</a></li>
      <li><a href="/approved"><span class="side-icon @if($listNum==4) s-active @endif">AP</span>Approved</a></li>
      <li><a href="/deleted"><span class="side-icon @if($listNum==6) s-active @endif">DE</span>Deleted</a></li>
      <li><a href="/admins"><span class="side-icon @if($listNum==5) s-active @endif">AD</span>Admins</a></li>
      {{-- <li><a href="/adduser"><span class="side-icon @if($listNum==6) s-active @endif">AD</span>Add Admin</a></li> --}}
    </ul>
  </div>

  <div class="content-wrap">
    <div class="top-nav">
      <div class="search-box">
        <form action="/search" method="POST">
          {{csrf_field()}}
          <div class="inputWithBtns">
            <input type="text" class="search-input" name="search_query" placeholder="Search By Membership Number">
            {{-- <button class="s-btns search-by" type="button"><img src="/images/downWhite.svg" alt="expand"></button> --}}
            <button class="s-btns search-btn" type="submit"><img src="/images/search.svg" alt="search button"></button>
          </div>
        </form>
      </div>
      <div class="user-menu">
        <div class="user-btn dd-btn bg-primary .bg-prm-hover">
          <img class="top-nav-icon icon-lg" src="/images/user.svg"></img> 
          <ul class="dropdown-links user-links">
            <li>Change Password</li>
            <li><a href="/logout">Logout</a></li>
          </ul>
        </div>
        {{-- <span class="user">
  
        </span> --}}
      </div>
    </div>
    <div class="content">
      @yield('content')
    </div>
  </div>
</div>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/dashboard/dashboard.js"></script>
{{-- <script src="https://kit.fontawesome.com/a5eb13ec56.js" crossorigin="anonymous"></script> --}}
</body>
</html>