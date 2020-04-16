@extends('layouts.master')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  @if(count($errors) > 0)
    @include('partials.floatingMsg')
  @endif
  <div class="application">
    <h1>APPLICANTION STEP 3 OF 6</h1>
    <h3>Beneficiaries</h3>
    
    <div class="scrollable">
    <div class="mw550">
    <form class="applicant-details" id="benef-form" action="/apply/step3" method="POST">
      {{csrf_field()}}
        <div class="grid1111 w100">
          <h4>Name</h4>
          <h4>Surname</h4>
          <h4>Relationship</h4>
          <h4>ID/Passport</h4>
        </div>
        <div class="line spacer-btm"></div>
      @php $i = 0; @endphp
      @foreach($beneficiaries as $beneficiary)
        <div class="grid1111 w100 grid-list">
          <span>{{++$i}}. {{$beneficiary->name}}</span>
          <span>{{$beneficiary->surname}}</span>
          <span>{{$beneficiary->relationship}}</span>
          <span>{{$beneficiary->id_number}}</span>
          <span class="remove" onclick="location.href='/apply/step3/remove/{{$beneficiary->id}}'"><i class="fas fa-trash-alt"></i></span>
        </div>
      @endforeach
        <div class="grid1111 w100">
          <div class="form-group">
            <input oninput="enableAddBen()" id="name" type="text" name="name" required>
          </div>
          <div class="form-group">
            <input oninput="enableAddBen()" id="surname" type="text" name="surname" required>
          </div>
          <div class="form-group">
            <select class="w100" name="relationship">
              <option value="Spouse">Spouse</option>
              <option value="Child">Child</option>
              <option value="Mother">Mother</option>
              <option value="Father">Father</option>
              <option value="Sister">Sister</option>
              <option value="Brother">Brother</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <input oninput="enableAddBen()" id="id_number" type="text" name="id_number" required>
          </div>
          <div class="form-group btn-add">
            <button type="submit" ><i class="fas fa-plus-square"></i></button>
          </div>
        </div>
      <div class="clr"></div>
      <button type="button" id="btnNxt" class="btn spacer" onclick="submitBeneficiary()">Next</button>
      <button type="button" onclick="location.href='/apply/step2'" class="btn spacer">Back</button>
  </form>
  </div>
  </div>
  </div>
@endsection