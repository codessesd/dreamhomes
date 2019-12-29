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
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/register">Register</a></li>
          </ul>
        <span class="btn login"><a href="/login">Login</a></span>
      </div>
    </div>

    @yield('banner')

    <div class="section">
      @yield('section')
    </div>

  </div>
</body>
</html>