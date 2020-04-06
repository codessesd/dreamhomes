@extends('dashboard.layout.dashboard')

@section('content')
  <div class="card">
    <div class="card-header">
      <span class="colour-sqr bg-primary"><i class="fas fa-users"></i></span>
      <div class="card-head-text">
        <h4 class="card-title ">Admins</h4>
        <p class="card-category">Admin list</p>
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
              Email
            </th>
            <th>
              Contact
            </th>
            <th>
              Level
            </th>
            <th>
              Status
            </th>
            <th>
              Options
            </th>
            <th class="text-center">
              {{-- Status --}}
            </th>
          </thead>
          <tbody>
            @php $i = 0;/*members counter*/ @endphp
            @foreach($admins as $admin)
              <tr>
                <td class="text-primary">
                  {{++$i}}.
                </td>
                <td class="table-f-name">
                  {{$admin->name}} {{$admin->surname}}
                  {{-- @include('components.member_details') --}}
                </td>
                <td>
                  {{$admin->user->email}}
                </td>
                <td>
                  {{$admin->contact}}
                </td>
                <td>
                  {{$admin->user->admin_level}}
                </td>
                <td>
                  {{$admin->status}}
                </td>
                <td class="options-td">
                  <div class="options d-flex justify-content-center">
                    <div class="options-icon" onclick="openAdminDetail({{$admin['id']}})" data-toggle="tooltip" data-placement="top" title="Edit Admin">
                      <i class="fas fa-pen"></i>
                    </div>

                    <div class="options-icon" onclick="location.href='/deleteAdmin/{{$admin->id}}'" data-toggle="tooltip" data-placement="top" title="Delete Admin">
                      <i class="fas fa-user-minus"></i>
                    </div>

                    {{-- <div class="options-icon" onclick="toggleDocPopup({{$admin['id']}})" data-toggle="tooltip" data-placement="top" title="Documents">
                      <i class="far fa-file-alt"></i>
                    </div> --}}

                  </div>
                </td>
              </tr>
              @include('components.admin_details')
            @endforeach
          </tbody>
        </table>
        <div class="clr"></div>
        {{--Add admin form--}}
        @include('components.popup')
        <div class="clr"></div>
        <span class="btn bg-primary" onclick="openPopup()">Add New Admin</span>
        <div class="clr"></div>
      </div>
    </div>
  </div>
@endsection