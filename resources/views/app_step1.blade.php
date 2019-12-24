@extends('layouts.master')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="application">
    <h1>APPLICANT</h1>

    <form class="applicant-details">
      <div class="title">
        <label for="title">Title</label>
        <input type="text" name="">
      </div>
      <div class="initials">
        <label for="initials">Initials</label>
        <input type="text" name="">
      </div>
      <div class="first-name">
        <label for="first-name">First Name</label>
        <input type="text" name="">
      </div>
      <div class="mid-name">
        <label for="mid-name">Middle Name</label>
        <input type="text" name="">
      </div>
      <div class="surname">
        <label for="surname">Surname</label>
        <input type="text" name="">
      </div>
      <div class="id-passport">
        <label for="id-passport">ID/Passport</label>
        <input type="text" name="">
      </div>
      <div class="tel-no">
        <label for="tel-no">Tel. No.</label>
        <input type="text" name="">
      </div>
      <div class="cell-no">
        <label for="cell-no">Cell Phone No.</label>
        <input type="text" name="">
      </div>
      <div class="email">
        <label for="email">Email</label>
        <input type="text" name="">
      </div>
      <div class="marital-status">
        <label for="marital-status">Marital Status</label>
        <select>
          <option>Single</option>
        </select>
      </div>

      <button type="submit" class="btn">Submit</button>
  </form>
  </div>
@endsection