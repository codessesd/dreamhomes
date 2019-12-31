@extends("layouts.master")
@section('home','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="home-section">
    <h1><span>Welcome to</span> Dream Homes Stokvel</h1>
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