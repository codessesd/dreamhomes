@extends('layouts.master')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="application areas-container">
    <h1>APPLICANTION STEP 4 OF 4</h1>
    <h3>Area Of Choice</h3>

    <div class="grid-center-form">
      <div></div>
      <form class="applicant-details areas-form" id="main-form" action="/apply/step4" method="POST">
        {{csrf_field()}}
          <div class="grid11 w100">
            <h4>Municipality</h4>
            <h4>Area</h4>
          </div>
          <div class="line spacer-btm"></div>
        @php $i = 0; @endphp
        @foreach($areas as $area)
          <div class="grid11 w100 grid-list">
            <span>{{++$i}}. {{$area->municipality}}</span>
            <span>{{$area->area}}</span>
            <span class="remove" onclick="location.href='/apply/step4/remove/{{$area}}'"><i class="fas fa-trash-alt"></i></span>
          </div>
        @endforeach
          <div class="grid11 w100">
            <div class="form-group">
              <input id="municipality" type="text" name="municipality" required>
            </div>
            <div class="form-group">
              <input id="area" type="text" name="area" required>
            </div>
            <div class="form-group btn-add">
              <button type="submit" ><i class="fas fa-plus-square"></i></button>
            </div>
          </div>
        <div class="clr"></div>
        {{-- <button onclick="location.href='/profile'" class="spacer btn">Save for later</button> --}}
        {{-- <span onclick="submitArea()" class="spacer btn">Submit</span> --}}
        <button onclick="submitArea()" class="spacer btn">Next</button>
        <span onclick="location.href='/apply/step3'" class="spacer btn">Back</span>
    </form>
    <div></div>
  </div>
  </div>
@endsection