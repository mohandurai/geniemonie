@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-6  subheader-transparent " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            CMS </h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a class="text-muted">
                                    CMS </a>
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
                    <a href="{{route('home')}}" class="btn  font-weight-bolder btn-sm">
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
                        <!--begin::Form-->
                        <form class="form" id="kt_form"
                              action="{{isset($cms)?route('cms.update',$cms->cms_id):route('cms.store')}}"
                              method="POST" enctype="multipart/form-data" >
                            @csrf
                            @isset($cms)
                                @method('PUT')
                            @endisset

                            <div class="card-body">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Type<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-control required" name="type" style="width: 100%">
                                                <option value="Screen1">Intro Screen 1</option>
                                                <option value="Screen2">Intro Screen 2</option>
                                                <option value="Screen3">Intro Screen 3</option>
                                                <option value="Bde">Business Development Executive</option>
                                                <option value="Franchise">Franchise</option>
                                                <option value="Advertise">Advertiser</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="configForm" id="Screen1">
                                        <div class="form-group row">

                                            <label class="col-lg-3 col-form-label">Image<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <div class="image-input image-input-outline" id="kt_image_1">
                                                    <div class="image-input-wrapper"
                                                         style="background-image: url('{{ !empty($cms->screen_one_image)?asset('uploads/'.$cms->screen_one_image):asset('assets/media/products/default.png') }}')"></div>
                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="change" data-toggle="tooltip" title=""
                                                        data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="screen_one_image"
                                                               accept=".png, .jpg, .jpeg"/>
                                                        <input type="hidden" name="screen_one_image"/>
                                                    </label>
                                                    <span
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="cancel" data-toggle="tooltip"
                                                        title="Cancel avatar">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
                                                </div>
                                                <span
                                                    class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label ">Content<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                             <textarea type="text" name="screen_one_content" id="screen_one_content"
                                                       autocomplete="off"
                                                       class="form-control summernote"
                                                       rows="3"
                                                       placeholder=""
                                             >{{isset($cms)?$cms->screen_one_content:old('screen_one_content')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="configForm" id="Screen2">
                                        <div class="form-group row">

                                            <label class="col-lg-3 col-form-label ">Image<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <div class="image-input image-input-outline" id="kt_image_2">
                                                    <div class="image-input-wrapper"
                                                         style="background-image: url('{{ !empty($cms->screen_two_image)?asset('uploads/'.$cms->screen_two_image):asset('assets/media/products/default.png') }}')"></div>
                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="change" data-toggle="tooltip" title=""
                                                        data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="screen_two_image"
                                                               accept=".png, .jpg, .jpeg"/>
                                                        <input type="hidden" name="screen_two_image"/>
                                                    </label>
                                                    <span
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="cancel" data-toggle="tooltip"
                                                        title="Cancel avatar">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
                                                </div>
                                                <span
                                                    class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label ">Content<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                             <textarea type="text" name="screen_two_content" id="screen_two_content"
                                                       autocomplete="off"
                                                       class="form-control summernote"
                                                       rows="3"
                                                       placeholder=""
                                             >{{isset($cms)?$cms->screen_two_content:old('screen_two_content')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="configForm" id="Screen3">
                                        <div class="form-group row">

                                            <label class="col-lg-3 col-form-label ">Image<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <div class="image-input image-input-outline" id="kt_image_3">
                                                    <div class="image-input-wrapper"
                                                         style="background-image: url('{{ !empty($cms->screen_three_image)?asset('uploads/'.$cms->screen_three_image):asset('assets/media/products/default.png') }}')"></div>
                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="change" data-toggle="tooltip" title=""
                                                        data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="screen_three_image"
                                                               accept=".png, .jpg, .jpeg"/>
                                                        <input type="hidden" name="screen_three_image"/>
                                                    </label>
                                                    <span
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="cancel" data-toggle="tooltip"
                                                        title="Cancel avatar">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
                                                </div>
                                                <span
                                                    class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label ">Content<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                             <textarea type="text" name="screen_three_content" id="screen_three_content"
                                                       autocomplete="off"
                                                       class="form-control summernote"
                                                       rows="3"
                                                       placeholder=""
                                             >{{isset($cms)?$cms->screen_three_content:old('screen_three_content')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="configForm" id="Bde">
                                        <div class="form-group row">

                                            <label class="col-lg-3 col-form-label ">Image<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <div class="image-input image-input-outline" id="kt_image_4">
                                                    <div class="image-input-wrapper"
                                                         style="background-image: url('{{ !empty($cms->bde_image)?asset('uploads/'.$cms->bde_image):asset('assets/media/products/default.png') }}')"></div>
                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="change" data-toggle="tooltip" title=""
                                                        data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="bde_image"
                                                               accept=".png, .jpg, .jpeg"/>
                                                        <input type="hidden" name="bde_image"/>
                                                    </label>
                                                    <span
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="cancel" data-toggle="tooltip"
                                                        title="Cancel avatar">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
                                                </div>
                                                <span
                                                    class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label ">Question<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                             <textarea type="text" name="bde_question" id="bde_question"
                                                       autocomplete="off"
                                                       class="form-control"
                                                       rows="3"
                                                       placeholder=""
                                             >{{isset($cms)?$cms->bde_question:old('bde_question')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label ">Answer<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                             <textarea type="text" name="bde_answer" id="bde_answer"
                                                       autocomplete="off"
                                                       class="form-control summernote"
                                                       rows="3"
                                                       placeholder=""
                                             >{{isset($cms)?$cms->bde_answer:old('bde_answer')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="configForm" id="Franchise">
                                        <div class="form-group row">

                                            <label class="col-lg-3 col-form-label ">Image<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <div class="image-input image-input-outline" id="kt_image_5">
                                                    <div class="image-input-wrapper"
                                                         style="background-image: url('{{ !empty($cms->franchise_image)?asset('uploads/'.$cms->franchise_image):asset('assets/media/products/default.png') }}')"></div>
                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="change" data-toggle="tooltip" title=""
                                                        data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="franchise_image"
                                                               accept=".png, .jpg, .jpeg"/>
                                                        <input type="hidden" name="franchise_image"/>
                                                    </label>
                                                    <span
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="cancel" data-toggle="tooltip"
                                                        title="Cancel avatar">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
                                                </div>
                                                <span
                                                    class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label ">Question<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                             <textarea type="text" name="franchise_question" id="franchise_question"
                                                       autocomplete="off"
                                                       class="form-control"
                                                       rows="3"
                                                       placeholder=""
                                             >{{isset($cms)?$cms->franchise_question:old('franchise_question')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label ">Answer<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                             <textarea type="text" name="franchise_answer" id="franchise_answer"
                                                       autocomplete="off"
                                                       class="form-control summernote"
                                                       rows="3"
                                                       placeholder=""
                                             >{{isset($cms)?$cms->franchise_answer:old('franchise_answer')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="configForm" id="Advertise">
                                        <div class="form-group row">

                                            <label class="col-lg-3 col-form-label ">Image<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <div class="image-input image-input-outline" id="kt_image_6">
                                                    <div class="image-input-wrapper"
                                                         style="background-image: url('{{ !empty($cms->advertise_image)?asset('uploads/'.$cms->advertise_image):asset('assets/media/products/default.png') }}')"></div>
                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="change" data-toggle="tooltip" title=""
                                                        data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="advertise_image"
                                                               accept=".png, .jpg, .jpeg"/>
                                                        <input type="hidden" name="advertise_image"/>
                                                    </label>
                                                    <span
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="cancel" data-toggle="tooltip"
                                                        title="Cancel avatar">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
                                                </div>
                                                <span
                                                    class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label ">Question<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                             <textarea type="text" name="advertise_question" id="advertise_question"
                                                       autocomplete="off"
                                                       class="form-control"
                                                       rows="3"
                                                       placeholder=""
                                             >{{isset($cms)?$cms->advertise_question:old('advertise_question')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label ">Answer<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                             <textarea type="text" name="advertise_answer" id="advertise_answer"
                                                       autocomplete="off"
                                                       class="form-control summernote"
                                                       rows="3"
                                                       placeholder=""
                                             >{{isset($cms)?$cms->advertise_answer:old('advertise_answer')}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <button id="form_submit" class="btn btn-primary mr-2"><i
                                                class="fas fa-save"></i>Save
                                        </button>
                                        <button type="reset" class="btn btn-danger"><i
                                                class="fas fa-times"></i>Reset
                                        </button>
                                    </div>
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
    <script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>
    <script>
        $('.summernote').summernote({
            height: 150
        });
        var method = 'Screen1';
        CmsMethod(method);
        $('select[name=type]').on('change', function () {
            var method = $(this).val();
            CmsMethod(method);
        });
        function CmsMethod(method) {
            $('.configForm').addClass('d-none');
            $(`#${method}`).removeClass('d-none');

        }
    </script>
@endpush


