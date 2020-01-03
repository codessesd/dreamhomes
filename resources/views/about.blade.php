@extends('layouts.master')
@section('about','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="about">
    <h1 class="center-h"><span class="deBold">Our </span>Story</h1>
    <span class="center-img"><img src="/images/story.svg"></span>
    <p class="wide-par">
      <b>Dream Homes</b> Stokvel is a unique stokvel that is formed to help those with little income or cannot qualify for a bond. The idea is to help such individuals to be able to buy their dream homes without any hassle. Members help one another to buy houses and members have the power to amend the constitution and to elect those that they feel can run the stokvel to success. Members meet every first week of every month to discuss the progress of the stokvel and any matters arising.
    </p>
    <br><br><br>

    <h1 class="center-h">Your <span class="deBold">Property, </span> <span class="deBold">Your </span> Solution</h1>
    <span class="center-img"><img src="/images/house4.svg"></span>
    <p class="thin-par">
      1. To become a member you have to pay a no-refundable joining fee of R1 500. <br>
      2. A R3 500 monthly contribution is to be paid by all members every month. That will allow the stokel to buy land for the members <br>
      3. Before developent takes place we will wait for the land to be transfered to the stokvel and to each member. The transfer takes 3 months maximum. <br>
      4. The building of houses will begin on the fourth or fifth month and continuing until all members get their houses.
    </p>
  </div>
@endsection