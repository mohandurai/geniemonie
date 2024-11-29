@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-6  subheader-transparent " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            City </h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    Master </a>
                            </li>

                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    City </a>
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
                    <a href="{{route('city.index')}}" class="btn  font-weight-bolder btn-sm">
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
                              action="{{ isset($city)?route('city.update',$city->city_id):route('city.store') }}"
                              method="POST">
                            @csrf
                            @isset($city)
                                @method('PUT')
                            @endisset
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label ">State<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <select
                                            class="form-control state-select2 {{ $errors->has('state_id') ? 'is-invalid' : '' }}"
                                            type="text" name="state_id" id="state_id">
                                            <option value="">Select State</option>
                                            @if(!empty($city))
                                                @foreach($state as $value)
                                                    <option
                                                        value="{{$value->state_id}}"{{ !empty($city->state_id) && $city->state_id==$value->state_id ? 'selected':''}} {{ ((old('state_id')==$value->state_id)?'selected': '') }}>{{$value->state_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('state_id'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('state_id') }}</strong>
                                            </div>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label ">District<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select
                                            class="form-control district-select2 select2-control {{ $errors->has('district_id') ? 'is-invalid' : '' }}"
                                            type="text" name="district_id" id="district_id">
                                            <option value="">Select District</option>
                                            @if(!empty($city))
                                                @foreach($district as $value)
                                                    <option
                                                        value="{{$value->district_id}}"{{ !empty($city->district_id) && $city->district_id==$value->district_id ? 'selected':''}} {{ ((old('district_id')==$value->district_id)?'selected': '') }}>{{$value->district_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('district_id'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('district_id') }}</strong>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label class="col-lg-3 col-form-label ">City Name<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input class="form-control {{ $errors->has('city_name') ? 'is-invalid' : '' }}"
                                               type="text" name="city_name" id="city_name"
                                               autocomplete="off"
                                               placeholder="Enter City Name"
                                               value="{{ old('city_name')?old('city_name'):(isset($city)?$city->city_name:'')}}"/>
                                        @if ($errors->has('city_name'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('city_name') }}</strong>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label class="col-lg-3 col-form-label ">Pin code<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input class="form-control {{ $errors->has('pincode') ? 'is-invalid' : '' }}"
                                               type="text" name="pincode" id="pincode"
                                               autocomplete="off"
                                               placeholder="Enter Pin Code"
                                               value="{{ old('pincode')?old('pincode'):(isset($city)?$city->pincode:'')}}"/>
                                        @if ($errors->has('pincode'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('city_name') }}</strong>
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
            $('.select2-control').select2({});
        });
    </script>
@endpush
