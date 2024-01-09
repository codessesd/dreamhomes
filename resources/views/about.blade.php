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
      Once upon a time, in a dimension where blueprints danced and hammer swings were orchestrated by musical gnomes, our story began. It was a magical day, or perhaps night – we can't be certain because our founding moment was as timeless as a wizard's beard. Somewhere between a cloud-shaped brainstorm and a brainstorm-shaped cloud, a team of dream-weavers gathered in the whimsical city of ImagiNation. With unicorns as architects and dragons as engineers, the year was marked by confetti rains and the constant hum of creative chaos. And so, in a place where logic took a vacation and imagination clocked in overtime, our company emerged to redefine the very essence of home-building. Welcome to our tale of eccentricity, where every chapter unfolds with the turn of a wizard's wand and a sprinkle of cosmic glitter.
    </p>
    <br><br><br>

    <h1 class="center-h">Your <span class="deBold">Property, </span> <span class="deBold">Your </span> Solution</h1>
    <span class="center-img"><img src="/images/house4.svg"></span>
    {{-- <p class="thin-par">
      1. To become a member you have to pay a no-refundable joining fee of R1 500. <br>
      2. A R3 500 monthly contribution is to be paid by all members every month. That will allow the stokel to buy land for the members <br>
      3. Before developent takes place we will wait for the land to be transfered to the stokvel and to each member. The transfer takes 3 months maximum. <br>
      4. The building of houses will begin on the fourth or fifth month and continuing until all members get their houses.
    </p> --}}
  </div>
@endsection