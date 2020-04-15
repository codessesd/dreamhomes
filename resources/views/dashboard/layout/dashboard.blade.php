<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/dashboard/dashboard.css">
  <link rel="stylesheet" type="text/css" href="/css/applicationform.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300&display=swap" rel="stylesheet">
</head>
<body>
<div class="dashboard">

  <div class="sidebar">
    <span class="dash-title">Dashboard {{-- <i class="icn fas fa-caret-square-down"></i> --}}</span>
    <ul class="side-nav-links">
      <li><a href="/members"><span class="side-icon">MB</span>Members</a></li>
      {{-- <li><a href="/completed"><span class="side-icon">CO</span>Completed</a></li> --}}
      {{-- <li><a href="/pending"><span class="side-icon">PN</span>Pending</a></li> --}}
      <li><a href="/admins"><span class="side-icon">AD</span>Admins</a></li>
      {{-- <li><a href="/adduser"><span class="side-icon">AD</span>Add Admin</a></li> --}}
    </ul>
  </div>
  <div class="mbl-menu"></div>

  <div class="content-wrap">
    <div class="top-nav">
      <div class="search">
      </div>
      <div class="user-menu">
        <div class="user-btn dd-btn bg-primary .bg-prm-hover">
          <i class="top-nav-icon fas fa-user"></i> 
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
<script src="https://kit.fontawesome.com/a5eb13ec56.js" crossorigin="anonymous"></script>
</body>
</html>