@extends('dashboard.layout.dashboard')

@section('content')
  {{csrf_field()}}
  <div class="card">
    <div class="card-header">
      <span class="colour-sqr bg-primary"><img class="icon-lg" src="/images/users.svg"></span>
      <div class="card-head-text">
        <h4 class="card-title ">{{$listName}}</h4>
        <p class="card-category">
          Show
          <select id="show" onchange="setShow()">
            <option value="25" @if($show==25) selected @endif>25</option>
            <option value="50" @if($show==50) selected @endif>50</option>
            <option value="100" @if($show==100) selected @endif>100</option>
            <option value="200" @if($show==200) selected @endif>200</option>
          </select>
        </p>
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
            <th class="invest-th">
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
                <td class="text-primary" id="tdNum{{$member->id}}">
                  @include('dashboard.components.pay_popup')
                  {{++$i}}.
                </td>
                <td class="table-f-name" id="tdName{{$member->id}}">
                  <a class="nameLink" href="/member/{{$member->id}}">{{$member->f_name}} {{$member->surname}}</a>
                </td>
                <td id="tdMembershipNo{{$member->id}}">
                  {{$member->misc->membership_no}}
                </td>
                <td class="options-td">
                  <div class="options d-flex justify-content-center">
                    <button type="button" class="options-icon" onclick="togglePayPopup({{$member['id']}})" data-toggle="tooltip" data-placement="top" title="Office Use">
                      <img src="/images/pen.svg">
                    </button>
                    <a class="options-icon" href="/member/{{$member->id}}" data-toggle="tooltip" data-placement="top" title="Open Member">
                      <img src="/images/eye.svg">
                    </a>
                    <button class="options-icon" onclick="toggleDocPopup({{$member['id']}})" data-toggle="tooltip" data-placement="top" title="Documents">
                      <img src="/images/document.svg">
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
                    </button>
                    <button type="button" class="options-icon" onclick="deleteMemberToggle({{$member['id']}})" id="tdDelButton{{$member->id}}" data-deleted="0"  data-toggle="tooltip" data-placement="top" title="Delete">
                      <img class="" id="memDeleteImg{{$member->id}}" src="/images/delete.svg">
                      <img class="memLoadingImg" id="memLoadingImg{{$member->id}}" src="/images/hourglass.svg">
                    </button>

                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
      </div>
      <div class="pages">{{$pages->links()}}</div>
    </div>
  </div>
@endsection
