@extends('layouts.master')
@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="application">
    <h1>APPLICANTION STEP 3 OF 4</h1>
    <h3>Beneficiaries</h3>

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
            <input id="name" type="text" name="name" required>
          </div>
          <div class="form-group">
            <input id="surname" type="text" name="surname" required>
          </div>
          <div class="form-group">
            <input id="relationship" type="text" name="relationship" required>
          </div>
          <div class="form-group">
            <input id="id_number" type="text" name="id_number" required>
          </div>
          <div class="form-group btn-add">
            <button type="submit" ><i class="fas fa-plus-square"></i></button>
          </div>
        </div>
      <div class="clr"></div>
      <button onclick="submitBeneficiary()" class="spacer btn">Next</button>
      <span onclick="location.href='/apply/step2'" class="spacer btn">Back</span>
  </form>
  </div>
@endsection