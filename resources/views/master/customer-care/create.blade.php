@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-6  subheader-transparent " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            Customer Care </h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    Customer Care</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    {{isset($customerCare) ? 'Edit' : 'Create'}} </a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <a href="{{route('customer-care.index')}}" class="btn  font-weight-bolder btn-sm">
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
                              action="{{ isset($customerCare)?route('customer-care.update',$customerCare->id):route('customer-care.store') }}"
                              method="POST">
                            @csrf
                            @isset($customerCare)
                                @method('PUT')
                            @endisset
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Employee name<span class="text-danger">*</span></label>
                                        <input
                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            type="text" name="name" id="name"
                                            autocomplete="off"
                                            placeholder="Employee name"
                                            value="{{ old('name')?old('name'):(isset($customerCare)?$customerCare->name:'')}}"/>
                                        @if ($errors->has('name'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Date of join<span class="text-danger">*</span></label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" readonly id="kt_datepicker_3"
                                                   name="date_of_join"
                                                   value="{{ !empty(old('date_of_join'))?old('date_of_join'):(!empty($customerCare->date_of_join)?date('d-m-Y',strtotime($customerCare->date_of_join)):date('d-m-Y')) }}"/>
                                            <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-calendar"></i>
							</span>
                                            </div>
                                        </div>
                                        @if ($errors->has('date_of_join'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('date_of_join') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Education<span class="text-danger">*</span></label>
                                        <input
                                            class="form-control {{ $errors->has('education') ? 'is-invalid' : '' }}"
                                            type="text" name="education" id="education"
                                            autocomplete="off"
                                            placeholder="Enter Education"
                                            value="{{ old('education')?old('education'):(isset($customerCare)?$customerCare->education:'')}}"/>
                                        @if ($errors->has('education'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('education') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">


                                    <div class="col-lg-4">
                                        <label>Work Experience<span class="text-danger">*</span></label>
                                        <input
                                            class="form-control {{ $errors->has('experience') ? 'is-invalid' : '' }}"
                                            type="text" name="experience" id="experience"
                                            autocomplete="off"
                                            placeholder="Work Experience"
                                            value="{{ old('experience')?old('experience'):(isset($customerCare)?$customerCare->experience:'')}}"/>
                                        @if ($errors->has('experience'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('experience') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Marital Status<span class="text-danger">*</span></label>
                                        <select
                                            class="form-control select2-control {{ $errors->has('marital_status') ? 'is-invalid' : '' }}"
                                            type="text" name="marital_status" id="marital_status">
                                            <option value="">Select Marital Status</option>
                                            <option
                                                value="Married"{{ !empty($customerCare->marital_status) && $customerCare->marital_status== 'Married' ? 'selected':''}} {{ ((old('marital_status')== 'Married')?'selected': '') }}>
                                                Married
                                            </option>
                                            <option
                                                value="Unmarried"{{ !empty($customerCare->marital_status) && $customerCare->marital_status== 'Unmarried' ? 'selected':''}} {{ ((old('marital_status')== 'Unmarried')?'selected': '') }}>
                                                Unmarried
                                            </option>
                                        </select>
                                        @if ($errors->has('marital_status'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('marital_status') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-lg-4">

                                        <label>Gender<span class="text-danger">*</span></label>
                                        <select class="form-control select2-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" type="text"  name="gender" id="gender">
                                            <option value="">Select Gender</option>
                                            <option
                                                value="M"{{ !empty($customerCare->gender) && $customerCare->gender== 'M' ? 'selected':''}} {{ ((old('gender')== 'M')?'selected': '') }}>
                                                Male
                                            </option>
                                            <option
                                                value="F"{{ !empty($customerCare->gender) && $customerCare->gender== 'F' ? 'selected':''}} {{ ((old('gender')== 'F')?'selected': '') }}>
                                                Female
                                            </option>
                                        </select>
                                        @if ($errors->has('gender'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-lg-4">
                                        <label>Father Name<span class="text-danger">*</span></label>
                                        <input
                                            class="form-control {{ $errors->has('father_name') ? 'is-invalid' : '' }}"
                                            type="text" name="father_name" id="father_name"
                                            autocomplete="off"
                                            placeholder="Father Name"
                                            value="{{ old('father_name')?old('father_name'):(isset($customerCare)?$customerCare->father_name:'')}}"/>
                                        @if ($errors->has('father_name'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('father_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    @if(empty($customerCare))
                                        <div class="col-lg-4">
                                            <label>email<span class="text-danger">*</span></label>
                                            <input
                                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                type="text" name="email" id="email"
                                                autocomplete="off"
                                                placeholder="Username or Email"
                                                value="{{ old('email')?old('email'):(isset($customerCare)?$customerCare->email:'')}}"/>
                                            @if ($errors->has('email'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <input
                                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                type="text" name="password"
                                                autocomplete="off"
                                                placeholder="******"
                                                value="{{ old('password')?old('password'):(isset($customerCare)?$customerCare->password:'')}}"/>
                                            @if ($errors->has('password'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Address: </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>State<span class="text-danger">*</span></label>
                                        <select
                                            class="form-control state-select2 {{ $errors->has('state_id') ? 'is-invalid' : '' }}"
                                            type="text" name="state_id" id="state_id">
                                            <option value="">Select State</option>
                                            @if(!empty($customerCare))
                                            @foreach($state as $value)
                                                <option
                                                    value="{{$value->state_id}}"{{ !empty($customerCare->state_id) && $customerCare->state_id==$value->state_id ? 'selected':''}} {{ ((old('state_id')==$value->state_id)?'selected': '') }}>{{$value->state_name}}</option>
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
                                            @if(!empty($customerCare))
                                            @foreach($district as $value)
                                                <option
                                                    value="{{$value->district_id}}"{{ !empty($customerCare->district_id) && $customerCare->district_id==$value->district_id ? 'selected':''}} {{ ((old('district_id')==$value->district_id)?'selected': '') }}>{{$value->district_name}}</option>
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
                                        <label>City<span class="text-danger">*</span></label>
                                        <select
                                            class="form-control city-select2 {{ $errors->has('city_id') ? 'is-invalid' : '' }}"
                                            type="text" name="city_id" id="city_id">
                                            <option value="">Select City</option>
                                            @if(!empty($customerCare))
                                                @foreach($city as $value)
                                                    <option
                                                        value="{{$value->city_id}}"{{ !empty($customerCare->city_id) && $customerCare->city_id==$value->city_id ? 'selected':''}} {{ ((old('city_id')==$value->city_id)?'selected': '') }}>{{$value->city_name}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                        @if ($errors->has('city_id'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('city_id') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-lg-4">
                                        <label>Address line 1<span class="text-danger">*</span></label>
                                        <input
                                            class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                            type="text" name="address" id="address"
                                            autocomplete="off"
                                            placeholder="Address line 1"
                                            value="{{ old('address')?old('address'):(isset($customerCare)?$customerCare->address:'')}}"/>
                                        @if ($errors->has('address'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Address line 2</label>
                                        <input
                                            class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                            type="text" name="address" id="address"
                                            autocomplete="off"
                                            placeholder="Address line 2"
                                            value="{{ old('address')?old('address'):(isset($customerCare)?$customerCare->address:'')}}"/>
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
