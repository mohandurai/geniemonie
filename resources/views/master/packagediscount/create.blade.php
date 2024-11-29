@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-6  subheader-transparent " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center j   tify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            Package Discount </h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
{{--                            <li class="breadcrumb-item">--}}
{{--                                <a class="text-muted">--}}
{{--                                    Master </a>--}}
{{--                            </li>--}}

                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    Package Discount </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    {{isset($discpackage) ? 'Edit' : 'Create'}} </a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <a href="{{route('packagediscount.index')}}" class="btn  font-weight-bolder btn-sm">
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
                                  action="{{ route('packagediscount.store') }}" method="POST">
                                @csrf
                                @isset($discpackage)
                                    @method('PUT')
                                @endisset
                                <div class="card-body">
                                    
                                    <form action="{{ url('edit-discount')}}/1" method="post">
                                @csrf
                                
                                <div class="card-body">
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label ">Pacakage Name</label>
                                        <div class="col-lg-6">
                                            <input readonly
                                                class="form-control {{ $errors->has('months_3') ? 'is-invalid' : '' }}"
                                                type="text" name="months_3" id="months_3"
                                                autocomplete="off"
                                                placeholder="Discount Apply for all Packages"
                                                value=""/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label ">Discount for 3 Month<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input
                                                class="form-control {{ $errors->has('months_3') ? 'is-invalid' : '' }}"
                                                type="text" name="months_3" id="months_3"
                                                autocomplete="off"
                                                placeholder="Enter 3 months discount"
                                                value="{{ 0 }}"/>
                                            @if ($errors->has('months_3 '))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('months_3') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label ">Discount for 6 Month<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input
                                                class="form-control {{ $errors->has('months_6') ? 'is-invalid' : '' }}"
                                                type="text" name="months_6" id="months_6"
                                                autocomplete="off"
                                                placeholder="Enter 6 months discount"
                                                value="{{ 0 }}"/>
                                            @if ($errors->has('months_6'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('months_6') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label ">Discount for 1 Year<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input
                                                class="form-control {{ $errors->has('year_1') ? 'is-invalid' : '' }}"
                                                type="text" name="year_1" id="year_1"
                                                autocomplete="off"
                                                placeholder="Enter 1 year discount"
                                                value="{{ 0 }}"/>
                                            @if ($errors->has('year_1'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->first('year_1') }}</strong>
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
    </div>

@endsection
