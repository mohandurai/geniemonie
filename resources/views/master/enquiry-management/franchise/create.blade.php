@extends('layouts.app')
@php
//    echo "OOOOOOOOOOOO";
    //exit;
@endphp
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-6  subheader-transparent " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            Franchise Enquire </h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    Franchise Enquire </a>
                            </li>

                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    Franchise Enquire  </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    {{isset($enquire) ? 'Edit' : 'Create'}} </a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <a href="{{route('franchises-enquires.index')}}" class="btn  font-weight-bolder btn-sm">
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
                <div class="col-lg-12">
                    <div class="card card-custom gutter-b example example-compact">
                        <form class="form" id="kt_form"
                              action="{{ isset($enquire)?route('franchises-enquires.update',$enquire->franchise_enquire_id):route('franchises-enquires.store') }}"
                              method="POST">
                            @csrf
                            @isset($enquire)
                                @method('PUT')
                            @endisset
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Company Name<span class="text-danger">*</span></label>
                                        <input
                                            class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}"
                                            type="text" name="company_name" id="company_name"
                                            autocomplete="off"
                                            placeholder="Enter Company/Shop name"
                                            value="{{ old('company_name')?old('company_name'):(isset($enquire)?$enquire->company_name:'')}}"/>
                                        @if ($errors->has('company_name'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('company_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Contact person name<span class="text-danger">*</span></label>
                                        <input
                                            class="form-control {{ $errors->has('contact_person_name') ? 'is-invalid' : '' }}"
                                            type="text" name="contact_person_name" id="contact_person_name"
                                            autocomplete="off"
                                            placeholder="Enter Contact Person Name"
                                            value="{{ old('contact_person_name')?old('contact_person_name'):(isset($enquire)?$enquire->contact_person_name:'')}}"/>
                                        @if ($errors->has('contact_person_name'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('contact_person_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Category<span class="text-danger"></span></label>
                                        <input
                                            class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}"
                                            type="text" name="category" id="category"
                                            autocomplete="off"
                                            placeholder="Enter Category"
                                            value="{{ old('category')?old('category'):(isset($enquire)?$enquire->category:'')}}"/>
                                        @if ($errors->has('category'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('category') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Company Email<span class="text-danger">*</span></label>
                                        <input
                                            class="form-control {{ $errors->has('company_email') ? 'is-invalid' : '' }}"
                                            type="email" name="company_email" id="company_email"
                                            autocomplete="off"
                                            placeholder="Enter Email"
                                            value="{{ old('company_email')?old('company_email'):(isset($enquire)?$enquire->company_email:'')}}"/>
                                        @if ($errors->has('company_email'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('company_email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Contact Number<span class="text-danger">*</span></label>
                                        <input
                                            class="form-control {{ $errors->has('contact_no') ? 'is-invalid' : '' }}"
                                            type="number" name="contact_no"
                                            autocomplete="off" id="kt_maxlength_2" maxlength="10"
                                            placeholder="Enter Contact Number"
                                            value="{{ old('contact_no')?old('contact_no'):(isset($enquire)?$enquire->contact_no:'')}}"/>
                                        @if ($errors->has('contact_no'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('contact_no') }}</strong>
                                            </div>
                                        @endif
                                    </div>


                                    <div class="col-lg-4">
                                        <label>GST<span class="text-danger"></span></label>
                                        <input
                                            class="form-control {{ $errors->has('gst_no') ? 'is-invalid' : '' }}"
                                            type="text" name="gst_no" id="gst_no"
                                            autocomplete="off"
                                            placeholder="Enter Your gst"
                                            value="{{ old('gst_no')?old('gst_no'):(isset($enquire)?$enquire->gst_no:'')}}"/>
                                        @if ($errors->has('gst_no'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('gst_no') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>State<span class="text-danger"></span></label>
                                        <select
                                            class="form-control state-select2 {{ $errors->has('state_id') ? 'is-invalid' : '' }}"
                                            type="text" name="state_id" id="state_id">
                                            <option value="">Select State</option>
                                            @if(!empty($enquire))
                                                @foreach($state as $value)
                                                    <option
                                                        value="{{$value->state_id}}"{{ !empty($enquire->state_id) && $enquire->state_id==$value->state_id ? 'selected':''}} {{ ((old('state_id')==$value->state_id)?'selected': '') }}>{{$value->state_name}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                        @if ($errors->has('state_id'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('state_id') }}</strong>
                                            </div>
                                        @endif
                                    </div>


                                    <div class="col-lg-4">
                                        <label>District<span class="text-danger">*</span></label>
                                        <select
                                            class="form-control district-select2 {{ $errors->has('district_id') ? 'is-invalid' : '' }}"
                                            type="text" name="district_id" id="district_id">
                                            <option value="">Select District</option>
                                            @if(!empty($enquire))
                                                @foreach($district as $value)
                                                    <option
                                                        value="{{$value->district_id}}"{{ !empty($enquire->district_id) && $enquire->district_id==$value->district_id ? 'selected':''}} {{ ((old('district_id')==$value->district_id)?'selected': '') }}>{{$value->district_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('district_id'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('district_id') }}</strong>
                                            </div>
                                        @endif
                                    </div>


                                    <div class="col-lg-4">
                                        <label>City<span class="text-danger"></span></label>
                                        <select
                                            class="form-control city-select2 {{ $errors->has('city_id') ? 'is-invalid' : '' }}"
                                            type="text" name="city_id" id="city_id">
                                            <option value="">Select City</option>
                                            @if(!empty($enquire))
                                                @foreach($city as $value)
                                                    <option
                                                        value="{{$value->city_id}}"{{ !empty($enquire->city_id) && $enquire->city_id==$value->city_id ? 'selected':''}} {{ ((old('city_id')==$value->city_id)?'selected': '') }}>{{$value->city_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('city_id'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('city_id') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="col-lg-3 col-form-label ">Pincode<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select
                                                class="form-control pincode-select2 {{ $errors->has('city_id') ? 'is-invalid' : '' }}"
                                                type="text" name="pincode" id="pincode">
                                                <option value="">Select City</option>
                                                @if(!empty($enquire))
                                                    @foreach($city as $value)
                                                        <option
                                                            value="{{$value->pincode}}"{{ !empty($enquire->pincode) && $enquire->pincode==$value->pincode ? 'selected':''}} {{ ((old('pincode')==$value->pincode)?'selected': '') }}>{{$value->pincode}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('pincode'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('pincode') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <div class="col-lg-4">
                                        <label>Address<span class="text-danger"></span></label>
                                        <input
                                            class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                            type="text" name="address" id="address"
                                            autocomplete="off"
                                            placeholder="Address"
                                            value="{{ old('address')?old('address'):(isset($enquire)?$enquire->address:'')}}"/>
                                        @if ($errors->has('address'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <button type="submit" class="btn btn-primary mr-2"><i
                                            class="fas fa-save"></i>Save
                                    </button>
                                    <button type="reset" class="btn btn-danger"><i class="fas fa-times"></i>Reset
                                    </button>
                                </div>
                            </div>
                        </form>
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
                placeholder: "Select ...",
                allowClear: false
            });
        });

    </script>
    <script>

        var arrows;
        if (KTUtil.isRTL()) {
            arrows = {
                leftArrow: '<i class="la la-angle-right"></i>',
                rightArrow: '<i class="la la-angle-left"></i>'
            }
        } else {
            arrows = {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        }
        $('#kt_datepicker_3').datepicker({
            rtl: KTUtil.isRTL(),
            todayBtn: "linked",
            format: 'dd-mm-yyyy',
            clearBtn: true,
            todayHighlight: true,
            templates: arrows
        });
        $('#kt_datepicker_4').datepicker({
            rtl: KTUtil.isRTL(),
            todayBtn: "linked",
            format: 'dd-mm-yyyy',
            clearBtn: true,
            todayHighlight: true,
            templates: arrows
        });
    </script>
    <script>
        $('#kt_maxlength_2').maxlength({
            threshold: 10,
            alwaysShow: true,
            warningClass: "label label-warning label-rounded label-inline",
            limitReachedClass: "label label-success label-rounded label-inline"
        });
    </script>
@endpush
