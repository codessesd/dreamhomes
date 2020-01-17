<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/dashboard/dashboard.css">
</head>
<body>
<div class="dashboard">

  <div class="sidebar">
    <span class="title">Dashboard</span>
    <ul class="side-nav dropdown-list">
      <li><a href="/members">Members</a></li>
      <li><a href="/completed">Completed</a></li>
      <li><a href="/Pending">Pending</a></li>
      <li><a href="/users">Users</a></li>
      <li><a href="/adduser">Add User</a></li>
    </ul>
  </div>

  <div class="navigation">
    <div class="search">
      
    </div>
    <div class="user-menu">
      <div class="user-dropdown">
        <ul class="dropdown-list">
          <li>Change Password</li>
          <li>Logout</li>
        </ul>
      </div>
      <span class="user">
        
      </span>
    </div>
  </div>

  <div class="section">
    @yield('section')
  </div>
</div>

<script type="text/javascript" href="/dashboard/dashboard.js"></script>
</body>
</html>