@extends("layouts.master")
@section('profile','active')
@section('banner')
  @include('partials.banner2')
@endsection

@section('fixed-div')

@endsection

@section('section')
  <h1 class="center-h">Your <span class="deBold">Payment History </span></h1>
  <div class="pay-table-container">
    <table class="pay-table">
      <thead>
        <th>Date</th>
        <th>Amount</th>
      </thead>
      <tbody>
        <tr>
          <td>20 Jun 2020</td>
          <td class="amount">R300</td>
        </tr>
        <tr>
          <td>20 Jul 2020</td>
          <td class="amount">R300</td>
        </tr>
        <tr>
          <td>20 Aug 2020</td>
          <td class="amount">R300</td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection
