@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
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
                                    District </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    Create </a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <a href="{{route('district.index')}}" class="btn  font-weight-bolder btn-sm">
                        <span class="svg-icon svg-icon-warning svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo9\dist/../src/media/svg/icons\Code\Backspace.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M8.42034438,20 L21,20 C22.1045695,20 23,19.1045695 23,18 L23,6 C23,4.8954305 22.1045695,4 21,4 L8.42034438,4 C8.15668432,4 7.90369297,4.10412727 7.71642146,4.28972363 L0.653241109,11.2897236 C0.260966303,11.6784895 0.25812177,12.3116481 0.646887666,12.7039229 C0.648995955,12.7060502 0.651113791,12.7081681 0.653241109,12.7102764 L7.71642146,19.7102764 C7.90369297,19.8958727 8.15668432,20 8.42034438,20 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>
                        Back
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-custom gutter-b example example-compact">
                        <!--begin::Form-->
                        <form class="form" id="kt_form"
                              action="{{ isset($district)?route('district.update',$district->district_id):route('district.store') }}"
                              method="POST">
                            @csrf
                            @isset($district)
                                @method('PUT')
                            @endisset
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label ">State<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select
                                            class="form-control select2-control {{ $errors->has('state_id') ? 'is-invalid' : '' }}"
                                            type="text" name="state_id" id="state_id">
                                            <option value="">Select State</option>
                                            @foreach($state as $value)
                                                <option
                                                    value="{{$value->state_id}}"{{ !empty($district->state_id) && $district->state_id==$value->state_id ? 'selected':''}} {{ ((old('state_id')==$value->state_id)?'selected': '') }}>{{$value->state_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('state_id'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('state_id') }}</strong>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label ">District Name<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input
                                            class="form-control {{ $errors->has('district_name') ? 'is-invalid' : '' }}"
                                            type="text" name="district_name" id="district_name"
                                            autocomplete="off"
                                            placeholder="Enter district name"
                                            value="{{ old('district_name')?old('district_name'):(isset($district)?$district->district_name:'')}}"/>
                                        @if ($errors->has('district_name'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('district_name') }}</strong>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i>Save
                                    </button>
                                    <button type="reset" class="btn btn-danger"><i class="fas fa-times"></i>Reset
                                    </button>

                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.select2-control').select2({
                allowClear: false
            });
        });
    </script>
@endpush
