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
                                    <th title="Field #2">User Type</th>
                                    <th title="Field #3">User ID</th>
                                    <th title="Field #5">Role</th>
                                    <th title="Field #4">Role ID</th>
                                    <th title="Field #4">Report Role ID</th>
                                    <th title="Field #7">City</th>
                                    <th title="Field #8">Pincode</th>
                                    <th title="Field #9">Active/InActive</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td> {{$item->name}}</td>
				                    <td> <span class="label label-lg label-primary label-inline">{{ $item->user_type }}</span></td>
                                    <td> {{$item->user_id}}</td>
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
                                    <td> {{$item->role_id}}</td>
                                    <td> {{$item->report_to_role_id}}</td>
                                    <td> {{!empty($item->cityName)?$item->cityName->city_name:''}}</td>
                                    <td> {{!empty($item->pincode)?$item->pincode:''}}</td>
                                    <td>
                                        @if($item->status == 1)
                                            <span class="switch switch-sm switch-icon"><label><input type="checkbox" checked="checked" onclick="statusChange({{$item->id}})" name="select"/><span></span></label></span>
                                        @else
                                            <span class="switch switch-sm switch-icon"><label><input type="checkbox"  onclick="statusChange({{$item->id}})" name="select"/><span></span></label></span>

                                        @endif

                                    </td>

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

                        {!! $users->links() !!}

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
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#kt_datatable').DataTable({
                searching: false, paging: false, info: false, ordering: false,
            });
        });


        $('#delete-user').on('click', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Record has been deleted.',
                        'success'
                    )
                    setTimeout(function () {
                    $('#delete-post-form').submit();
                    }, 800);
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your Record is safe :)',
                        'error'
                    )
                }
            });
        });

    </script>
@endpush