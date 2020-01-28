@extends('dashboard.layout.dashboard')

@section('content')
  <div class="card">
    <div class="card-header">
      <span class="colour-sqr bg-primary"><i class="fas fa-users"></i></span>
      <div class="card-head-text">
        <h4 class="card-title ">Members</h4>
        <p class="card-category">DHS member list</p>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table members-table">
          <thead class="text-primary">
            <th>
            </th>
            <th>
              Name
            </th>
            <th>
              Membership
            </th>
            <th>
              ID/Passport
            </th>
            <th>
              Contact
            </th>
            <th>
              Pos
            </th>
            <th class="text-center">
              {{-- Status --}}
            </th>
          </thead>
          <tbody>
            @php $i = 0;/*members counter*/ @endphp
            @foreach($members as $member)
              <tr>
                <td>
                  {{++$i}}.
                </td>
                <td>
                  {{$member->f_name}} {{$member->surname}}
                </td>
                <td>
                  {{$member->membership_no}}
                </td>
                <td>
                  {{$member->id_passport_no}}
                </td>
                <td>
                  {{$member->cell_number}}
                </td>
                <td>
                  {{$member->position}}
                </td>
                <td class="options-td">
                  <div class="options d-flex justify-content-center">
                    <div class="options-icon" data-toggle="tooltip" data-placement="top" title="Edit Member">
                      <i class="fas fa-pen"></i>
                      {{-- <img src="/material/img/pen.svg"> --}}
                    </div>
                    <div class="options-icon" data-toggle="tooltip" data-placement="top" title="Application Incomplete">
                      <i class="fas fa-hourglass-half"></i>
                      {{-- <img src="/material/img/circle.svg"> --}}
                    </div>
                    {{-- <div class="options-compl" data-toggle="tooltip" data-placement="top" title="Application Complete">
                      <img src="/material/img/tick.svg">
                    </div> --}}
                    <div class="options-icon" onclick="showDocPopup({{$member['id']}})" data-toggle="tooltip" data-placement="top" title="Documents">
                      <i class="far fa-file-alt"></i>
                      {{-- <img src="/material/img/documents.svg"> --}}
                      @if($member->document->isNotEmpty())
                        <div class="doc-popup" id="popup{{$member['id']}}">
                          @include('components.documents_popup')
                        </div>
                      @else
                        <div class="doc-popup" id="popup{{$member['id']}}">
                          <span class="doc-li">No Uploads</span>
                        </div>
                      @endif
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection