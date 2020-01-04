@php
  $error = ["success","save successfulx"];
@endphp

<div class="msg-disabler" id="msg-disabler"></div>
  <div class="msg-dialog" id="msg-dialog">
    <div class="close"><img onclick="closeMsgDialog()" src="/images/close-red.svg" alt="close"></div>
    @if (in_array('success',$errors->all()))
          <div class="message bg-success">
          <h4>Success!</h4>
        @else
          <div class="message bg-error">
            <h4>Error</h4>
        @endif
          <ul>
          @foreach($errors->all() as $error)
            @if($error == 'success')
             <li hidden>{{$error}}</li>
            @else
             <li><span></span>{{$error}}</li>
            @endif
          @endforeach
          </ul>
        </div>
  </div>