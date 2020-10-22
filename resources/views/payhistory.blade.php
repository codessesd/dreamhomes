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
        @foreach($member->payments as $payment)
          <tr>
            <td>{{$payment->pay_date}}</td>
            <td>R{{$payment->amount}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
