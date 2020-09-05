<!DOCTYPE html>
<html>
<head>
  <title>Dream Homes Stokvel</title>
  <meta charset="utf-8">
  <meta name="description" content="Dream Homes Stokvel. A a unique housing stokvel enabling people to buy houses without the burden of interest rates">
  <meta name="keywords" content="dream homes, dreamhomes, dream homes stokvel, dreahomesstokvel, dream, homes, stokvel, home">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/styles3.css">
  <link rel="stylesheet" type="text/css" href="/css/applicationform.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway&display=swap" rel="stylesheet">
</head>
<body>
  <?php
    function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
    }

    if (get_client_ip() != '127.0.0.1'){
      if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
        $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('HTTP/1.1 302 Moved Temporarily');
        header('Location: ' . $location);
        exit;
      }
    }
   ?>
  <div class="website">
    <div class="info-bar"></div>

    <div class="mobile-menu" id="menu-nav">
      
      <div class="filter-mob-menu"></div>
      <div class="mobile-logo">
        {{-- <img src="/images/logo.jpg" alt="logo dream homes"> --}}
      </div>
      <div class="mbl-menu">
        <ul>
            <li class="@yield('home')"><a href="/"><img src="/images/m-home.svg"><br>Home</a></li>
            <li class="@yield('about')"><a href="/about"><img src="/images/m-about.svg"><br>About</a></li>
            <li class="@yield('contact')"><a href="/contact"><img src="/images/m-contact.svg"><br>Contact</a></li>
            @if (auth()->check())
              <li class="@yield('profile')"><a href="/profile"><img src="/images/m-profile.svg"><br>Profile</a></li>
              <li><a href="/logout"><img src="/images/m-logout.svg"><br>Logout</a></li>
            @else
              <li class="@yield('register')"><a href="/register"><img src="/images/m-register.svg"><br>Register</a></li> 
              <li><a href="/login"><img src="/images/m-login.svg"><br>Login</a></li>
            @endif
          </ul>
      </div>
     {{--  <div class="info-div-cont">
        <div class="info-div width-limit">
          <span class="soc-icon"><i class="fab fa-facebook-f"></i></span>
          <span class="soc-icon"><i class="fab fa-instagram"></i></span>
          <span class="soc-icon"><i class="fab fa-twitter"></i></span>
          <span class="text"><i class="fas fa-phone"></i> (+27) 79 892 6892</span>
          <span class="text"><i class="fas fa-envelope-open-text"></i> mapule@konkokuhle.co.za</span>
        </div>
      </div> --}}
    </div>


    <div class="header-container">
      <div class="logo">
        <a href="/"><img src="/images/logo.png" alt="dream homes stokvel"></a>
      </div>

      {{-- Mobile menu button hidden-lg --}}
      <div class="menu-btns-container">
        <div class="btn-open mbl-menu-btn"><img src="/images/menu.png"></div>
        <div class="btn-close mbl-menu-btn"><img src="/images/cross.png"></div>
      </div>
      <div class="menu-container main-menu">

      {{-- Main menu hidden-xs --}}
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
  <script type="text/javascript" src="/js/jquery.min.js"></script> 
  <script type="text/javascript" src="/js/script3.js"></script>
  <script type="text/javascript" src="/js/mobile-menu.js"></script>
  <script src="https://kit.fontawesome.com/a5eb13ec56.js" crossorigin="anonymous"></script>
  @yield('javascript')
</body>
</html>