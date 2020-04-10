@php
  use App\Http\Controllers\DocumentsController;
@endphp
{{-- <div class="doc-popup"> --}}
  @foreach($member->document->all() as $document)
    <a href="/admin/files/download/{{$document->id}}">
      <span class="doc-li text-primary">{{DocumentsController::readableName($document)}}</span>
    </a>
  @endforeach
{{-- </div> --}}