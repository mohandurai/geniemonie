@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6  subheader-transparent " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            District </h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    Master </a>
                            </li>

                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    District  </a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center">
                        <!--begin::Actions-->
                        <a href="{{url('district/create')}}" class="btn btn-primary font-weight-bold btn-sm">Add New</a>

                    </div>
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

                                <th title="Field #1">District Name</th>
                                <th title="Field #1">State Name</th>
                                <th title="Field #1">Status</th>
                                <th title="Field #2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($district as $item)
                                <tr>

                                    <td> {{$item->district_name}}</td>
                                    <td> {{isset($item->stateName->state_name)?$item->stateName->state_name:''}}</td>
                                    <td>
                                        @if($item->status == 1)
                                            <span class="switch switch-sm switch-icon"><label><input type="checkbox" checked="checked" onclick="statusChange({{$item->district_id}})" name="select"/><span></span></label></span>
                                        @else
                                            <span class="switch switch-sm switch-icon"><label><input type="checkbox"  onclick="statusChange({{$item->district_id}})" name="select"/><span></span></label></span>

                                        @endif

                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                           data-theme="dark" title="Edit"
                                           href="{{ url('district/'.$item->district_id. '/edit')}}">
                                            <i class="flaticon2-pen"></i>
                                        </a>
                                        <form method="POST" style="display:inline;" title="Delete" id="delete-district-form"
                                              action="{{ url('district',$item->district_id)  }}">
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
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection
@push('scripts')
     <script>
        function statusChange(districtId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '{{ url('district-status-change') }}',
                data: {
                    district_id: districtId,
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

