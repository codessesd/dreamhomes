@php
  use App\Http\Controllers\DocumentsController;
  $docTypes = DocumentsController::docTypes();
@endphp
<div class="profile-btns">
  <div class="application">
    <span class="btn2 apply-online" onclick="location.href='/apply/step1/'">Apply Online (<i>Recommended</i>)</span>
    <span class="btn3 application-download"><a href="/download-form">Download Application form</a></span>
    <span class="btn2 application-upload" onclick="openDialog('Application Form','{{$docTypes['ap']}}')">Upload Application</span>
  </div>
  <div class="documents">
    <span class="btn2" onclick="location.href='/apply/step5/'">Upload Documents</span>
    {{-- <span class="btn2" onclick="openDialog('Proof Of Payment','{{$docTypes['pr']}}')">Upload Proof of payment</span> --}}
    <span class="btn2" onclick="openDialog('More Supporting Documents','{{$docTypes['su']}}')">Upload More</span>
  </div>
</div>