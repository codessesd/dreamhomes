@php
  $error = ["success","save successfully"];
@endphp

<div class="msg-disabler" id="msg-disabler"></div>
  <div class="msg-dialog" id="msg-dialog">
    <div class="close"><img onclick="closeMsgDialog()" src="/images/close-red.svg" alt="close"></div>
    @if (in_array('success',$errors->all()))
      <div class="message bg-success">
      <h4>Success!</h4>
    @elseif(in_array('warning',$errors->all()))
      <div class="message bg-warning">
      <h4>Notice</h4>
    @else {{-- else display error message --}}
      <div class="message bg-error">
      <h4>Error</h4>
    @endif
      <ul>
      @foreach($errors->all() as $error)
        @if(($error == 'success')||($error == 'warning'))
          <li hidden>{{$error}}</li>
        @else
          <li><span></span>{{$error}}</li>
        @endif
      @endforeach
      </ul>
    </div>
  </div>