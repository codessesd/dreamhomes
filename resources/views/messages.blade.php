@extends("layouts.master")

@section('banner')
  @include('partials.banner2')
@endsection

@section('section')
  <div class="register">
    <div class="form">
      <h1>{{$erSMessage['bigTitle']}}</h1>
        <div class="message {{$erSMessage['bgColor']}}">
          <h4>{{$erSMessage['smallTitle']}}</h4>
          <ul>
            @foreach($erSMessage['theMessages'] as $msg)
              <li><span></span>{{$msg}}</li>
            @endforeach
          </ul>
        </div>
    </div>
      <div class="side-pic">
        <img src="/images/house1.png">
      </div>
    </div>
    </div>
  </div>
@endsection
