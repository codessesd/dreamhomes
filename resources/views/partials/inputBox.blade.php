  {{-- file uploader **************************--}}
  <div class="disabler" id="disabler2"></div>
  <div class="upload-dialog" id="inputCover">
    <div class="close"><img onclick="closeInputBox()" src="/images/close-red.svg" alt="close"></div>
    <form class="upload-form" action="/saveReferredBy" method="POST">
      {{csrf_field()}}
      <label>You were referred by:</label>
      <br><br>
      {{-- <input type="file" class="file-input" name="document" required><br> --}}
      {{-- <input type="hidden" id="document-type" name="documentType"> --}}
      <input type="text" name="referrer" required>
      <button type="submit" class="btn">Submit</button>
    </form>
  </div>
