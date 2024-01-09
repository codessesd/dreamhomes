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
        <p>
          Welcome to our wacky world of wonderous building! We're not your run-of-the-mill builders; we're the folks who turn dreams into homes with a sprinkle of magic and a dash of absurdity. Our team boasts unicorn architects and dragon engineers, ensuring your home is as unique as a two-headed platypus.
        </p>
      </div>
      <div class="about2">
        <img class="icon" src="/images/house4.svg"></img>
        <h2>What we offer</h2>
        <p>
          At our house-building circus, we don't just offer four walls and a roof; we provide a front-row seat to the greatest show on earth! Imagine a menu of options that range from secret trapdoor closets for your ninja gear to bathtubs with built-in rubber duck orchestras. We specialize in turning "ordinary" into "extraordinary," and our customization options are more diverse than a chameleon at a color festival.
        </p>
      </div>
      <div class="about3">
        <img class="icon" src="/images/vision1.svg"></img>
        <h2>Our vision</h2>
        <p>
          In our crystal ball of whimsy and imagination, we see a future where every home is a masterpiece of laughter and innovation. We envision houses that break free from the shackles of the mundane, soaring to new heights of quirkiness and charm. Picture a world where your residence is a reflection of your wildest dreams, and every room tells a story as captivating as a bedtime tale told by a caffeinated storyteller.
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
            <h3 class="inf-heading txt-al-r">Step 1</h3>
            <p class="inf-txt txt-al-r">Summon Your Imagination</p>
          </div>
          <div class="clr"></div>
        </div>

        <div class="inf-step">
          <div class="inf-num-cont fl-r">
            <div class="inf-num">2</div>
          </div>
          <div class="inf-content fl-l">
            <h3 class="inf-heading txt-al-l">Step 2</h3>
            <p class="inf-txt">Design Shenanigans </p>
          </div>
          <div class="clr"></div>
        </div>

        <div class="inf-step">
          <div class="inf-num-cont fl-l">
            <div class="inf-num fl-r">3</div>
          </div>
          <div class="inf-content fl-r">
            <h3 class="inf-heading txt-al-r">Step 3</h3>
            <p class="inf-txt txt-al-r">Customize, Customize, Customize</p>
          </div>
          <div class="clr"></div>
        </div>

        <div class="inf-step">
          <div class="inf-num-cont fl-r">
            <div class="inf-num">4</div>
          </div>
          <div class="inf-content fl-l">
            <h3 class="inf-heading txt-al-l">Step 4</h3>
            <p class="inf-txt">Wizards at Work </p>
          </div>
          <div class="clr"></div>
        </div>

        <div class="inf-step">
          <div class="inf-num-cont fl-l">
            <div class="inf-num fl-r">5</div>
          </div>
          <div class="inf-content fl-r">
            <h3 class="inf-heading txt-al-r">Step 5</h3>
            <p class="inf-txt txt-al-r">Voila! </p>
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
      <p class="txt-justify">
        Our model is the Michelangelo of house-building because we've traded the traditional toolkit for a chest of magical wonders. Instead of measuring success in square feet, we measure it in laughter per room and smiles per square inch. Our secret sauce lies in the perfect blend of whimsy, creativity, and a pinch of pixie dust. With a team that includes unicorn architects and dragon engineers, each project becomes a canvas for fantastical feats. Our commitment to turning the mundane into the extraordinary ensures that your home isn't just a structure but a living, breathing testament to the power of imagination. In short, we've cracked the code to house-building bliss, and it involves a generous sprinkling of enchantment and a dash of delightful absurdity. Welcome to the land where every brick tells a tale and every window whispers a whimsical secret!
        </p>
        <div class="clr"></div>
    </div>
  </div>
@endsection