@extends('layouts.app')
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
                        <h5 class="text-dark font-weight-bold my-2 mr-5">Content writer List</h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <a href="{{url('content-writers/create')}}" class="btn btn-primary font-weight-bold btn-sm">Add Content writer</a>
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
                                <th title="Field #1">Employee Code</th>
                                <th title="Field #1">Employee Name</th>

                                <th title="Field #1">Date of Join</th>
                                <th title="Field #1">Gender</th>
                                <th title="Field #1">Marital status</th>
                                <th title="Field #1">Work Experience</th>
                                <th title="Field #2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cWManager as $item)
                                <tr>
                                    <td> {{$item->code ? $item->code : '-'}}</td>
                                    <td> {{$item->name}}</td>
                                    <td> {{date('d-m-Y', strtotime($item->date_of_join))}}</td>
                                    <td> {{$item->gender == 'M' ? "Male" : "Female"}}</td>
                                    <td> {{$item->marital_status == 'Married' ? "Married" : "Unmarried"}}</td>
                                    <td> {{$item->experience}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                           data-theme="dark" title="Edit"
                                           href="{{ url('/content-writers/'.$item->id. '/edit')}}">
                                            <i class="flaticon2-pen"></i>
                                        </a>
                                        <form method="POST" style="display:inline;" title="Delete" id="delete-post-form"
                                              action="{{ url('/content-writers',$item->id)  }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button id="delete-user" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip"
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
                        {!! $cWManager->links() !!}

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

