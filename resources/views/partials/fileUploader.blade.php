  {{-- file uploader **************************--}}
  <div class="disabler" id="disabler"></div>
  <div class="upload-dialog" id="upload-dialog">
    <div class="close"><img onclick="closeDialog()" src="/images/close-red.svg" alt="close"></div>
    <form class="upload-form" action="/storeFile" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <label>You are about to upload: <br> <b><span id="uploadType">Document</span></b></label>
      <br><br>
      <input type="file" class="file-input" name="document" required><br>
      <input type="hidden" id="document-type" name="documentType">
      <button type="submit" class="btn">Submit</button>
    </form>
  </div>
