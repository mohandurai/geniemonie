@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6  subheader-transparent " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            Users </h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    Master </a>
                            </li>

                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    Users  </a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{url('users/create')}}" class="btn btn-primary font-weight-bold btn-sm">Add New</a>

                </div>
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                @include('layouts.flash-message')
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-body">
                        <table class="table table-bordered table-checkable" id="kt_datatable">
                            <thead>
                            <tr>
                                <th title="Field #1">Name</th>
                                <th title="Field #1">User Type</th>
                                <th title="Field #1">User ID</th>
                                <th title="Field #1">Role ID</th>
                                <th title="Field #1">Role</th>
                                <th title="Field #1">Phone No</th>
                                <th title="Field #1">City</th>
                                <th title="Field #1">Pincode</th>
                                <th title="Field #1">Active/InActive</th>
                                <th style="text-align: center;" colspan="3" title="Field #1">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td> {{$item->name}}</td>
				                    <td> <span class="label label-lg label-primary label-inline">{{ $item->user_type }}</span></td>
                                    <td> {{$item->user_id}}</td>
                                    <td> {{$item->role_id}}</td>
                                    <td>
                                        @if(substr($item->user_id, 3,2) == "PL")
                                            {{"Player"}}
                                        @elseif(substr($item->user_id, 3,2) == "SM")
                                            {{"State Manager"}}
                                        @elseif(substr($item->user_id, 3,2) == "CW")
                                            {{"Content Writer"}}
                                        @elseif(substr($item->user_id, 3,2) == "CC")
                                            {{"Customer Care"}}
                                        @elseif(substr($item->user_id, 3,2) == "BD")
                                            {{"Business Dev. Exec."}}
                                        @elseif(substr($item->user_id, 3,2) == "FR")
                                            {{"Franchisee"}}
                                        @elseif(substr($item->user_id, 3,2) == "ED")
                                            {{"Editor"}}
                                        @elseif(substr($item->user_id, 3,2) == "TC")
                                            {{"Tele Caller"}}
                                        @elseif(substr($item->user_id, 3,2) == "DC")
                                            {{"Data Collec.Exex."}}
                                        @elseif(substr($item->user_id, 3,2) == "AD")
                                            {{"Advertiser"}}
                                        @else
                                            {{""}}
                                        @endif
                                    </td>
                                    <td> {{$item->phone_no}}</td>
                                    <td> {{!empty($item->cityName)?$item->cityName->city_name:''}}</td>
                                    <td> {{!empty($item->pincode)?$item->pincode:''}}</td>
                                    <td>
                                        @if($item->status == 1)
                                            <span class="switch switch-sm switch-icon"><label><input type="checkbox" checked="checked" onclick="statusChange({{$item->id}})" name="select"/><span></span></label></span>
                                        @else
                                            <span class="switch switch-sm switch-icon"><label><input type="checkbox"  onclick="statusChange({{$item->id}})" name="select"/><span></span></label></span>

                                        @endif

                                    </td>
                                    <!-- <td>
                                            @if($item->approved_status == 'Y')
                                                <a href="{{ url('users-status-change',$item->id)}}" class="btn btn-xs btn-success pull-right">Approved</a>
                                            @else
                                                <a href="{{ url('users-status-change',$item->id)}}" class="btn btn-xs btn-danger pull-right">Decline</a>
                                        @endif
                                    </td> -->
                                    <td>
                                        @if($item->user_id != "" && $item->role_id == "")
                                        <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                           data-theme="dark" title="Convert to new Role"
                                           href="{{ url('users/'.$item->id. '/roleconvert')}}">
                                            <!-- <i class="flaticon2-pen"></i> -->
                                            Convert Role
                                        </a>
                                        @elseif($item->user_id != "" && $item->role_id != "")
                                            Converted
                                        @else
                                            NA
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                           data-theme="dark" title="Edit"
                                           href="{{ url('users/'.$item->id. '/edit')}}">
                                            <i class="flaticon2-pen"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                           data-theme="dark" title="Delete"
                                           href="{{ url('users/'.$item->id. '/delete')}}">
                                            <i class="flaticon2-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>

                </div>

                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection

@push('styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>

        $(document).ready(function () {
            $('#kt_datatable').DataTable({
                searching: true, paging: true, info: true, ordering: true,
            });
        });

        function statusChange(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '{{ url('user-status-change') }}',
                data: {
                    user_id: id,
                },
                success: function (data) {
                    if(data.msg){

                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title:  data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        });

                    }
                }
            });
        }
    </script>
@endpush
