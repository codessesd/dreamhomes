@php
  use App\Http\Controllers\DocumentsController;
  $docTypes = DocumentsController::docTypes();
@endphp
<div class="profile-btns">
  <div class="application">
    <button class="btn2 apply-online" onclick="location.href='/apply/step1/'">Apply Online Now</button>
    {{-- <button class="btn3 application-download"><a href="/download-form">Download Application form</a></button> --}}
    {{-- <button class="btn2 application-upload" onclick="openDialog('Application Form','{{$docTypes['ap']}}')">Upload Application</button> --}}
  </div>
  <div class="documents">
    <button class="btn2" onclick="location.href='/apply/step5/'">Upload Documents</button>
    {{-- <button class="btn2" onclick="openDialog('Proof Of Payment','{{$docTypes['pr']}}')">Upload Proof of payment</button> --}}
    <button class="btn2" onclick="openDialog('More Supporting Documents','{{$docTypes['su']}}')">Upload More</button>
    {{-- <button class="btn2" onclick="openDialog('More Supporting Documents','{{$docTypes['su']}}')">Referred by</button> --}}
  </div>
</div>