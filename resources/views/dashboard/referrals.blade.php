@extends('dashboard.layout.dashboard')

@section('content')
<div>
  <div class="clr"></div>
  <h1>Top 10 referrals</h1>
  <div class="clr"></div>
    <table class="referrals-table">
      <thead>
        <th></th>
        <th>Membership Number</th>
        <th>Number referred</th>
      </thead>
      <tbody>
        @foreach($top10 as $key => $value)
          @if(strlen($key)>0)
            <tr>
              <td>{{$loop->iteration-1}}</td>
              <td>{{$key}}</td>
              <td>{{$value}}</td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
</div>
@endsection
