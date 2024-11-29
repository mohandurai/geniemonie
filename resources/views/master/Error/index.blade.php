


@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
{{--        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">--}}
{{--            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">--}}
{{--                <!--begin::Info-->--}}
{{--                <div class="d-flex align-items-center flex-wrap mr-1">--}}
{{--                    <!--begin::Page Heading-->--}}
{{--                    <div class="d-flex align-items-baseline mr-5">--}}
{{--                        <!--begin::Page Title-->--}}
{{--                        <h5 class="text-dark font-weight-bold my-2 mr-5">franchise List</h5>--}}
{{--                        <!--end::Page Title-->--}}
{{--                    </div>--}}
{{--                    <!--end::Page Heading-->--}}
{{--                </div>--}}
{{--                <!--end::Info-->--}}
{{--                <!--begin::Toolbar-->--}}
{{--                <div class="d-flex align-items-center">--}}
{{--                    <!--begin::Actions-->--}}
{{--                    <a href="{{url('franchises/create')}}" class="btn btn-primary font-weight-bold btn-sm">Add franchise</a>--}}
{{--                    <!--end::Actions-->--}}
{{--                </div>--}}
{{--                <!--end::Toolbar-->--}}
{{--            </div>--}}
{{--        </div>--}}
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
{{--                @include('layouts.flash-message')--}}
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-body">
                        <img src="{{asset('assets/media/under-development.jpg')}}" style=" width: 100%;
    height: 30vw;
    object-fit: contain;">
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


