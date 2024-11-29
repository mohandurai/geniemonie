@extends('layouts.app')
@php
    //echo "";
    //print_r($advertise);
    //exit;
@endphp
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-2 mr-5">Advertise List</h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <a href="{{url('advertise/create')}}" class="btn btn-primary font-weight-bold btn-sm">Add New</a>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar-->
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
                                <th>ID</th>    
                                <th title="Field #1">Company/Shop Name</th>
                                <th title="Field #1">Conctact Person Name</th>
                                <th title="Field #2">Category</th>
                                <th title="Field #3">GST No</th>
                                <th title="Field #4">Company Email</th>
                                <th title="Field #5">State</th>
                                <th title="Field #6">Pincode</th>
                                <th>Referral ID</th>
                                <th title="Field #8">Approved Status</th>
                                <th title="Field #9">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($advertise as $item)
                                <tr>
                                    <td> {{$item->adv_enq_id}}</td>
                                    <td> {{!empty($item->company_shop_name)?$item->company_shop_name:""}}</td>
                                    <td> {{!empty($item->contact_person_name)?$item->contact_person_name:""}}</td>
                                    <td> {{$item->category}}</td>
                                    <td> {{$item->gst}}</td>
                                    <td> {{$item->company_email}}</td>
                                    <td> {{$item->state_id}}</td>
                                    <td> {{$item->pincode}}</td>
                                    <td> {{$item->referral_mobile_id}}</td>

                                    <td>
                                        @if(\Illuminate\Support\Facades\Auth::user()->user_type ==  'StateManager')
                                            @if($item->approved_status == 'Y')
                                                <a href="{{ url('advertise-status-change',$item->advertise_id)}}"
                                                   class="btn btn-xs btn-success pull-right">Approved</a>
                                            @else
                                                <a href="{{ url('advertise-status-change',$item->advertise_id)}}"
                                                   class="btn btn-xs btn-danger pull-right">Pending</a>
                                            @endif
                                        @else
                                        <button
                                            class="btn btn-xs btn-danger pull-right">Pending</button>
                                        @endif
                                    </td>


                                    <td>
                                        <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                           data-theme="dark" title="Edit"
                                           href="{{ url('advertise/'.$item->advertise_id. '/edit')}}">
                                            <i class="flaticon2-pen"></i>
                                        </a>
                                        <form method="POST" style="display:inline;" title="Delete" id="delete-post-form"
                                              action="{{ url('advertise',$item->advertise_id)  }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button id="delete-user" class="btn btn-sm btn-danger show_confirm"
                                                    data-toggle="tooltip"
                                                    data-theme="dark" title="Delete">
                                                <i class="flaticon-delete"></i>
                                            </button>
                                        </form>
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
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
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

