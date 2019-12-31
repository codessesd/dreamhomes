<!DOCTYPE html>
<html>
<head>
  <title>Dream Homes Stokvel</title>
  <link rel="stylesheet" type="text/css" href="/css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway&display=swap" rel="stylesheet">
</head>
<body>
  <div class="website">
    <div class="info-bar"></div>

    <div class="header-container">
      <div class="logo">
        <a href="/"><img src="/images/logo.png" alt="dream homes stokvel"></a>
      </div>
      <div class="menu-container">
          <ul>
            <li class="@yield('home')"><a href="/">Home</a></li>
            <li class="@yield('about')"><a href="/about">About</a></li>
            <li class="@yield('contact')"><a href="/contact">Contact</a></li>
            @if (auth()->check())
              <li class="@yield('profile')"><a href="/profile">Profile</a></li>
            @else
              <li class="@yield('register')"><a href="/register">Register</a></li> 
            @endif
          </ul>
        @if(auth()->check())
          <span class="btn login"><a href="/logout">Logout</a></span>
        @else
          <span class="btn login"><a href="/login">Login</a></span>
        @endif
      </div>
    </div>

    @yield('banner')

    <div class="section">
      @yield('section')
    </div>

  </div>
</body>
</html>