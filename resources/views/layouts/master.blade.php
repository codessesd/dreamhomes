<!DOCTYPE html>
<html>
<head>
  <title>Dream Homes Stokvel</title>
  <meta charset="utf-8">
  <meta name="description" content="Dream Homes Stokvel. A a unique housing stokvel enabling people to buy houses without the burden of interest rates">
  <meta name="keywords" content="dream homes, dreamhomes, dream homes stokvel, dreahomesstokvel, dream, homes, stokvel, home">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <div class="menu-container main-menu">
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

    <div class="fixed-div">
      @yield('fixed-div')
    </div>
    <div class="section">
      @yield('section')
    </div>

    <div class="wide-section1">
      @yield('wide-section1')
      <div class="clr"></div>
    </div>

    <div class="footer">
      <div class="footer-inner">
        <div class="ftr-left"></div>
        <div class="ftr-mid">&copy;2020 Copyright DreamHomes Stokvel</div>
        <div class="ftr-right"></div>
      </div>
    </div>
  </div>

{{-- scripts **************************************************** --}}
  <script type="text/javascript" src="/js/script.js"></script>
</body>
</html>