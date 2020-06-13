@extends('layouts.master')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  @if(count($errors) > 0)
    @include('partials.floatingMsg')
  @endif
  <div class="application areas-container">
    <h1>APPLICANTION STEP 4 OF 6</h1>
    <h3>Investment Options</h3>

    <div class="grid-center-form">
      <div></div>
      <form class="areas-form applicant-details" id="main-form" action="/apply/step4_2" method="POST">
        {{csrf_field()}}
          <div class="w100">
            <h4>Option</h4>
            {{-- <h4>Area</h4> --}}   
          </div>
          <div class="line spacer-btm"></div>
        {{-- @php $i = 0; @endphp
        @foreach($areas as $area)
          <div class="grid11 w100 grid-list">
            <span>{{++$i}}. {{$area->municipality}}</span>
            <span>{{$area->area}}</span>
            <span class="remove" onclick="location.href='/apply/step4/remove/{{$area->id}}'"><i class="fas fa-trash-alt"></i></span>
          </div>
        @endforeach --}}
          <div class="">
            <div class="form-group w100">
              {{-- <input id="municipality" type="text" name="municipality" required> --}}
              <select class="padd5" id="investment" name="investment" required>
                <option @if($investment=='1') selected @endif value="1">285 x 12 months gets you 128 000 ROI</option>
                <option @if($investment=='2') selected @endif value="2">450 x 12 months gets you 305 000 ROI</option>
                <option @if($investment=='3') selected @endif value="3">750 x 12 months gets you 680 000 ROI</option>
              </select>
            </div>
            {{-- <div class="form-group">
              <input id="area" oninput="enableAddArea()" type="text" name="area" required>
            </div> --}}
            {{-- <div class="form-group btn-add">
              <button type="submit" ><i class="fas fa-plus-square"></i></button>
            </div> --}}
          </div>
        <div class="clr"></div>
        {{-- <button onclick="location.href='/profile'" class="spacer btn">Save for later</button> --}}
        {{-- <span onclick="submitArea()" class="spacer btn">Submit</span> --}}
        <button type="submit" id="btnNxt" onclick="" class="spacer btn">Next</button>
        <button type="button" onclick="location.href='/apply/step3'" class="spacer btn">Back</button>
    </form>
    <div></div>
  </div>
  </div>
@endsection