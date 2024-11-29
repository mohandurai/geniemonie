@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-6  subheader-transparent " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center j   tify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            Ad Package </h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
{{--                            <li class="breadcrumb-item">--}}
{{--                                <a class="text-muted">--}}
{{--                                    Master </a>--}}
{{--                            </li>--}}

                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    Ad Package  </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    {{isset($package) ? 'Edit' : 'Create'}} </a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <a href="{{route('ad-packages.index')}}" class="btn  font-weight-bolder btn-sm">
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
                            <form class="form" id="kt_form"
                                  action="{{ route('ad-packages.store') }}" method="POST">
                                @csrf
                                @isset($package)
                                    @method('PUT')
                                @endisset
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label ">Ad Type<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2-control {{ $errors->has('ad_type') ? 'is-invalid' : '' }}" type="text"  name="ad_type" id="ad_type">
                                                <option value="">Select Ad Type</option>
                                                <option value="Image"{{ !empty($package->ad_type) && $package->ad_type== 'Image' ? 'selected':''}} {{ ((old('ad_type')== 'Image')?'selected': '') }}>Image</option>
                                                <option value="Video"{{ !empty($package->ad_type) && $package->ad_type=='Video' ? 'selected':''}} {{ ((old('ad_type')=='Video')?'selected': '') }}>Video</option>

                                            </select>
                                            @if ($errors->has('ad_type'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('ad_type') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label ">Package Name<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input
                                                class="form-control {{ $errors->has('package_name') ? 'is-invalid' : '' }}"
                                                type="text" name="package_name" id="package_name"
                                                autocomplete="off"
                                                placeholder="Enter Package Name"
                                                value="{{ old('package_name')?old('package_name'):(isset($package)?$package->package_name:'')}}"/>
                                            @if ($errors->has('package_name'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('package_name') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label ">Package Price per Month<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input
                                                class="form-control {{ $errors->has('price_mth') ? 'is-invalid' : '' }}"
                                                type="text" name="price_mth" id="price_mth"
                                                autocomplete="off"
                                                placeholder="Enter Package State Price"
                                                value="{{ old('price_mth')?old('price_mth'):(isset($package)?$package->price_mth:'')}}"/>
                                            @if ($errors->has('price_mth'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('price_mth') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <!-- <div class="form-group row">
                                        <label class="col-lg-3 col-form-label ">Package Country Price<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input
                                                class="form-control {{ $errors->has('yr1_price') ? 'is-invalid' : '' }}"
                                                type="text" name="yr1_price" id="yr1_price"
                                                autocomplete="off"
                                                placeholder="Enter Package Country Price"
                                                value="{{ old('yr1_price')?old('yr1_price'):(isset($package)?$package->yr1_price:'')}}"/>
                                            @if ($errors->has('yr1_price'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('yr1_price') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label ">Package District Price<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input
                                                class="form-control {{ $errors->has('mth3_price') ? 'is-invalid' : '' }}"
                                                type="text" name="mth3_price" id="mth3_price"
                                                autocomplete="off"
                                                placeholder="Enter Package District Price"
                                                value="{{ old('mth3_price')?old('mth3_price'):(isset($package)?$package->mth3_price:'')}}"/>
                                            @if ($errors->has('district_price'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('mth3_price') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label ">Package State Price<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input
                                                class="form-control {{ $errors->has('mth6_price') ? 'is-invalid' : '' }}"
                                                type="text" name="mth6_price" id="mth6_price"
                                                autocomplete="off"
                                                placeholder="Enter Package State Price"
                                                value="{{ old('mth6_price')?old('mth6_price'):(isset($package)?$package->mth6_price:'')}}"/>
                                            @if ($errors->has('mth6_price'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('mth6_price') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div> -->


                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label ">Package Duration<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2-control {{ $errors->has('package_duration') ? 'is-invalid' : '' }}" type="text"  name="package_duration" id="package_duration">
                                                <option value="">Select Package Duration</option>
                                                    <option value="3 days"{{ !empty($package->package_duration) && $package->package_duration== '3 days' ? 'selected':''}} {{ ((old('package_duration')== '3 days')?'selected': '') }}>3 Days</option>
                                                    <option value="1 month"{{ !empty($package->package_duration) && $package->package_duration=='1 month' ? 'selected':''}} {{ ((old('package_duration')=='1 month')?'selected': '') }}>1 Month</option>
                                                    <option value="3 month"{{ !empty($package->package_duration) && $package->package_duration=='3 month' ? 'selected':''}} {{ ((old('package_duration')=='3 month')?'selected': '') }}>3 Month</option>
                                                    <option value="6 month"{{ !empty($package->package_duration) && $package->package_duration=='6 month' ? 'selected':''}} {{ ((old('package_duration')=='6 month')?'selected': '') }}>6 Month</option>
                                                    <option value="1 year"{{ !empty($package->package_duration) && $package->package_duration=='1 year' ? 'selected':''}} {{ ((old('package_duration')=='1 year')?'selected': '') }}>1 year</option>
                                            </select>
                                            @if ($errors->has('package_duration'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('package_duration') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label ">Ad Seconds<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2-control {{ $errors->has('ad_seconds') ? 'is-invalid' : '' }}" type="text"  name="ad_seconds" id="ad_seconds">
                                                <option value="">Select Ad Seconds</option>
                                                <option value="5"{{ !empty($package->ad_seconds) && $package->ad_seconds== '5' ? 'selected':''}} {{ ((old('ad_seconds')== '5')?'selected': '') }}>5 Seconds</option>
                                                <option value="10"{{ !empty($package->ad_seconds) && $package->ad_seconds=='10' ? 'selected':''}} {{ ((old('ad_seconds')=='10')?'selected': '') }}>10 Seconds</option>
                                                <option value="20"{{ !empty($package->ad_seconds) && $package->ad_seconds=='20' ? 'selected':''}} {{ ((old('ad_seconds')=='20')?'selected': '') }}>20 Seconds</option>
                                            </select>
                                            @if ($errors->has('ad_seconds'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('ad_seconds') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label ">Level Type<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2-control {{ $errors->has('package_zone') ? 'is-invalid' : '' }}" type="text"  name="package_zone" id="package_zone">
                                                <option value="">Select Level Type</option>
                                                <option value="country"{{ !empty($package->package_zone) && $package->package_zone== 'country' ? 'selected':''}} {{ ((old('package_zone')== 'country')?'selected': '') }}>Country</option>
                                                <option value="state"{{ !empty($package->package_zone) && $package->package_zone=='state' ? 'selected':''}} {{ ((old('package_zone')=='state')?'selected': '') }}>State</option>
                                                <option value="district"{{ !empty($package->package_zone) && $package->package_zone=='district' ? 'selected':''}} {{ ((old('package_zone')=='district')?'selected': '') }}>District</option>
                                            </select>
                                            @if ($errors->has('package_zone'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('package_zone') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <button  type="submit" class="btn btn-primary mr-2"><i
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
