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
          <option>Married</option>
          <option>Divorced</option>
          <option>Civil Union</option>
          <option>Widowed</option>
        </select>
      </div>
      <div class="insolv1">
        <label>Have you been declared insolvent?</label>
        <select>
          <option>No</option>
          <option>Yes</option>
        </select>
      </div>
      <div class="insolv2">
        <label>If yes, have you been rehabilitated?</label>
        <select>
          <option>No</option>
          <option>Yes</option>
        </select>
      </div>
      <div class="insolv2">
        <label>Are you under debt management or liquidation?</label>
        <select>
          <option>No</option>
          <option>Yes</option>
        </select>
      </div>
      <div class="physical-address address">
        <label>Physical Address</label>
        <div class="clr"></div>
        <input type="text" class="" name="pp-address1" placeholder="Address Line 1">
        <input type="text" class="" name="pp-address2" placeholder="Address Line 2">
        <input type="text" class="" name="pp-suburb" placeholder="Surbub">
        <input type="text" class="" name="pp-city" placeholder="City">
        <input type="text" class="" name="pp-code" placeholder="Postal Code">
      </div>
      <div class="postal-address address">
        <label>Postal Address</label>
        <select>
          <option>Same as physical</option>
          <option>Use different address</option>
        </select>
        <div class="clr"></div>
        <input type="text" class="" name="post-address1" placeholder="Address Line 1">
        <input type="text" class="" name="post-address2" placeholder="Address Line 2">
        <input type="text" class="" name="post-suburb" placeholder="Surbub">
        <input type="text" class="" name="post-city" placeholder="City">
        <input type="text" class="" name="post-code" placeholder="Postal Code">
      </div>
      <div class="clr"></div>
      <button type="submit" class="btn">Submit</button>
  </form>
  </div>
@endsection