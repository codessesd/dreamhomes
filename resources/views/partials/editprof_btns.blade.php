@php
  use App\Http\Controllers\DocumentsController;
  $docTypes = DocumentsController::docTypes();
@endphp
<div class="profile-btns">
  <div class="application">
    <button class="btn2 apply-online" onclick="location.href='/edit_profile/'">Edit My Profile</button>
  </div>
  <div class="documents">
    <button class="btn2" onclick="openDialog('More Supporting Documents','{{$docTypes['su']}}')">Upload Files</button>
  </div>
</div>