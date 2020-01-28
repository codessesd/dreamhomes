@php
  use App\Http\Controllers\DocumentsController;
@endphp
{{-- <div class="doc-popup"> --}}
  @foreach($member->document->all() as $document)
    <span class="doc-li">{{DocumentsController::readableName($document)}}</span>
    <span class="doc-li">Supporting Document</span>
  @endforeach
{{-- </div> --}}