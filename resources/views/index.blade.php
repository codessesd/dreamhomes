@extends("layouts.master")
@section('home','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="home-section">
    <h1 class="center-h"><span class="deBold">Welcome to</span> Dream Homes Stokvel</h1>
    <div class="about">
      <div class="about1">
        <img class="icon" src="/images/house3.svg"></img>
        <h2>Who are we</h2>
        <p>Dream Homes Stokvel was formed after meeting several clients who are either blacklisted or are earning less than what the banks require. With all that we failed to source property for our clients. We then came up with the idea of a Housing Stokvel</p>
      </div>
      <div class="about2">
        <img class="icon" src="/images/house4.svg"></img>
        <h2>What we offer</h2>
        <p>
          We are a 100% black owned Property Investment company. Established in 2016 and a Housing Stokvel established in 2016. We help our clients to acquire property lesser than the market.
        </p>
      </div>
      <div class="about3">
        <img class="icon" src="/images/vision1.svg"></img>
        <h2>Our vision</h2>
        <p>
          We want to build 1000 houses every year without a single loan from the bank. The idea is to show black people that together we can pull miracles.
        </p>
      </div>
    </div>

    
  </div>
@endsection



@section('wide-section1')
  
    <div class="howworks">
      <h1 class="center-h">How <span class="deBold">does it Work?</span></h1>
      <div class="inforgraphic">
        <div class="inf-step">
          <div class="inf-num-cont fl-l">
            <div class="inf-num fl-r">1</div>
          </div>
          <div class="inf-content fl-r">
            <h3 class="inf-heading txt-al-r">Register</h3>
            <p class="inf-txt txt-al-r">Register on this website <br> and get an account to login</p>
          </div>
          <div class="clr"></div>
        </div>

        <div class="inf-step">
          <div class="inf-num-cont fl-r">
            <div class="inf-num">2</div>
          </div>
          <div class="inf-content fl-l">
            <h3 class="inf-heading txt-al-l">Apply</h3>
            <p class="inf-txt">Download and complete the application form <br>or fill in our online application</p>
          </div>
          <div class="clr"></div>
        </div>

        <div class="inf-step">
          <div class="inf-num-cont fl-l">
            <div class="inf-num fl-r">3</div>
          </div>
          <div class="inf-content fl-r">
            <h3 class="inf-heading txt-al-r">Joining fee</h3>
            <p class="inf-txt txt-al-r">Deposit R1 500 joining fee</p>
          </div>
          <div class="clr"></div>
        </div>

        <div class="inf-step">
          <div class="inf-num-cont fl-r">
            <div class="inf-num">4</div>
          </div>
          <div class="inf-content fl-l">
            <h3 class="inf-heading txt-al-l">Your Spot</h3>
            <p class="inf-txt">You will now be booked a spot on the list <br>with your registration number</p>
          </div>
          <div class="clr"></div>
        </div>

        <div class="inf-step">
          <div class="inf-num-cont fl-l">
            <div class="inf-num fl-r">5</div>
          </div>
          <div class="inf-content fl-r">
            <h3 class="inf-heading txt-al-r">1000 Members</h3>
            <p class="inf-txt txt-al-r">Once we recruit 1000 members then<br>monthly contributions will begin</p>
          </div>
          <div class="clr"></div>
        </div>

      </div>
    </div>

  <div class="bg-image1">
    <div class="filter"></div>
    <div class="wdsec1-txt">
      <h1 class="center-h">Why <span class="deBold">does it Work?</span></h1>
      <span class="center-img"><img src="/images/howworks.svg"></span>
      <p>
        If you take a home a loan of say R500 000 over 20 years at an interest rate of 10%, your monthly repaymets amount to about R4 825.00. 10% is the current prime lending rate and most people will likely get more than 10% interest rate meaning that they will pay more that R4 825.00 per month. But for the sake of this calculation let's use 10%. Calculate this monthly repayment over a period of 20 years and it sums up to around R1 158 000.00. This is more than twice the bond amount given by the bank. This is because the bank charges you interests. At <b>Dream Homes</b> we use a stokvel system and thus there is no need to pay interests. Through each members contributions the stokvel is able to afford land and housing costs cash and thus saving members on interests.
        </p>
    </div>
    <div class="clr"></div>
  </div>
@endsection