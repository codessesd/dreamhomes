@extends('dashboard.layout.dashboard')

@section('content')
  <div class="card">
    <div class="card-header">
      <span class="colour-sqr bg-primary"><i class="fas fa-users"></i></span>
      <div class="card-head-text">
        <h4 class="card-title ">{{$listName}}</h4>
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
              Option
            </th>
            <th class="text-center">
              {{-- Status --}}
            </th>
          </thead>
          <tbody>
            @php $i = 0;/*members counter*/ @endphp
            @foreach($members as $member)
              <tr>
                <td class="text-primary">
                  @include('dashboard.components.office_use')
                  {{++$i}}.
                </td>
                <td class="table-f-name">
                  <a class="nameLink" href="/member/{{$member->id}}">{{$member->f_name}} {{$member->surname}}</a>
                </td>
                <td>
                  {{$member->misc->membership_no}}
                </td>
                <td>
                  {{$member->id_passport_no}}
                </td>
                <td>
                  {{$member->cell_number}}
                </td>
                <td>
                  {{$member->misc->investment}}
                </td>
                <td class="options-td">
                  <div class="options d-flex justify-content-center">
                    <div class="options-icon" onclick="toggleOfficePopup({{$member['id']}})" data-toggle="tooltip" data-placement="top" title="Office Use">
                      <i class="fas fa-edit"></i>
                    </div>
                    <a class="options-icon" href="/member/{{$member->id}}" data-toggle="tooltip" data-placement="top" title="Open Member">
                      <i class="fas fa-eye"></i>
                    </a>
                    <div class="options-icon" onclick="toggleDocPopup({{$member['id']}})" data-toggle="tooltip" data-placement="top" title="Documents">
                      <i class="far fa-file-alt"></i>
                      @if($member->document->isNotEmpty())
                        <div class="doc-popup" id="popup{{$member['id']}}">
                          <span class="doc-li">Close</span>
                          @include('dashboard.components.documents_popup')
                        </div>
                      @else
                        <div class="doc-popup" id="popup{{$member['id']}}">
                          <span class="doc-li">No Uploads</span>
                          <span class="doc-li"><i class="fas fa-times"></i> Close</span>
                        </div>
                      @endif
                    </div>

                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection