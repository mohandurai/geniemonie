<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Genie Monie</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Risw Well home live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="{{route('home')}}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    @stack('styles')
    <link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
</head>

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        <a href="{{route('home')}}">
            <img alt="Logo" src="{{siteLogo()}}" width="100" />
        </a>
        <div class="d-flex align-items-center">
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                <span></span>
            </button>
            <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
                <span></span>
            </button>
            <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                </span>
            </button>
        </div>
    </div>
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
            <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
                <div class="brand flex-column-auto" id="kt_brand">
                    <a href="{{route('home')}}" class="brand-logo">
                        <img alt="Logo" src="{{siteLogo()}}" width="200" />
                    </a>
                    <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                        <span class="svg-icon svg-icon svg-icon-xl">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                                    <path
                                        d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"
                                        transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                                </g>
                            </svg>
                        </span>
                    </button>
                </div>

                <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                    <!--begin::Menu Container-->
                    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                        data-menu-dropdown-timeout="500">
                        <!--begin::Menu Nav-->
                        <ul class="menu-nav">
                            <li class="menu-item {{ request()->is('home') ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{route('home')}}" class="menu-link">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                                <path
                                                    d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">Dashboard</span>
                                </a>
                            </li>
                            @auth
                            @role('Admin')
                            <li class="menu-item  menu-item-submenu {{ (request()->is('cms*'))  ? 'menu-item-open' : '' }}"
                                aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle"><span
                                        class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">CMS</span><i class="menu-arrow"></i></a>
                                <div class="menu-submenu "><i class="menu-arrow"></i>

                                    <ul class="menu-subnav">

                                        <li class="menu-item menu-item-submenu {{ request()->is('cms*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('cms.create') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Add Page</span>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </li>




                            <li class="menu-item  menu-item-submenu {{ (request()->is('users*'))  ? 'menu-item-open' : '' }}"
                                aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle"><span
                                        class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">Users</span><i class="menu-arrow"></i></a>
                                <div class="menu-submenu "><i class="menu-arrow"></i>

                                    <ul class="menu-subnav">

                                        <li class="menu-item menu-item-submenu {{ request()->is('users*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('users.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">List Users</span>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </li>






                            <li class="menu-item  menu-item-submenu {{ (request()->is('permissions*')||request()->is('roles*')||request()->is('state*')||request()->is('district*')||request()->is('city*'))  ? 'menu-item-open' : '' }}"
                                aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M15.9956071,6 L9,6 C7.34314575,6 6,7.34314575 6,9 L6,15.9956071 C4.70185442,15.9316381 4,15.1706419 4,13.8181818 L4,6.18181818 C4,4.76751186 4.76751186,4 6.18181818,4 L13.8181818,4 C15.1706419,4 15.9316381,4.70185442 15.9956071,6 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path
                                                    d="M10.1818182,8 L17.8181818,8 C19.2324881,8 20,8.76751186 20,10.1818182 L20,17.8181818 C20,19.2324881 19.2324881,20 17.8181818,20 L10.1818182,20 C8.76751186,20 8,19.2324881 8,17.8181818 L8,10.1818182 C8,8.76751186 8.76751186,8 10.1818182,8 Z"
                                                    fill="#000000"></path>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>

                                    <span class="menu-text">Master</span><i class="menu-arrow"></i></a>
                                <div class="menu-submenu "><i class="menu-arrow"></i>

                                    <ul class="menu-subnav">
                                        <!-- <li class="menu-item menu-item-submenu {{ request()->is('permissions*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('permissions.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Permissions</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-submenu {{ request()->is('roles*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('roles.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Roles</span>
                                            </a>
                                        </li> -->
                                        <li class="menu-item menu-item-submenu {{ request()->is('state*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('state.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">State</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-submenu {{ request()->is('district*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('district.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">District</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-submenu {{ request()->is('city*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('city.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">City</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="menu-item  menu-item-submenu {{ (request()->is('state-manager-commission*')|| request()->is('franchise-commission*')|| request()->is('content-writer-commission*')||request()->is('franchise-commision*')||request()->is('bde-commission*'))  ? 'menu-item-open' : '' }}"
                                aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z"
                                                    fill="#000000" opacity="0.3"
                                                    transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "></path>
                                                <path
                                                    d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z"
                                                    fill="#000000"></path>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    <span class="menu-text">Commissions</span><i class="menu-arrow"></i></a>
                                <div class="menu-submenu "><i class="menu-arrow"></i>

                                    <ul class="menu-subnav">

                                        <li class="menu-item menu-item-submenu {{ request()->is('state-manager-commission*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ url('state-manager-commission') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">State Manager</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-submenu {{ request()->is('content-writer-commission*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ url('content-writer-commission') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Content Writer</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-submenu {{ request()->is('franchise-commission*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{url('franchise-commission')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Franchise</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-submenu {{ request()->is('bde-commission*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ url('bde-commission') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">BDE</span>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </li>

                            <li class="menu-item  menu-item-submenu {{ (request()->is('ad-packages*') || request()->is('advertise*'))  ? 'menu-item-open' : '' }}"
                                aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle"><span
                                        class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span><span class="menu-text">Ad Management</span><i
                                        class="menu-arrow"></i></a>
                                <div class="menu-submenu "><i class="menu-arrow"></i>

                                    <ul class="menu-subnav">

                                        <li class="menu-item menu-item-submenu {{ request()->is('ad-packages*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('ad-packages.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Ad Packages</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-submenu {{ request()->is('ad-packages*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('packagediscount.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Package Discount</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-submenu {{ request()->is('advertise*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('advertise.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Ad Lists</span>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </li>


                            <li class="menu-item  menu-item-submenu menu-item-open"
                                aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle"><span
                                        class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span><span class="menu-text">Advertisers</span><i
                                        class="menu-arrow"></i></a>
                                <div class="menu-submenu "><i class="menu-arrow"></i>

                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-submenu {{ request()->is('ad-packages*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('advertise.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Enquiries</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-submenu {{ request()->is('advertise*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('advertise.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Ad Lists</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li class="menu-item  menu-item-submenu {{ (request()->is('franchises*')||request()->is('franchises-enquires*')||request()->is('enquires*')||request()->is('franchises-emp*'))  ? 'menu-item-open' : '' }}"
                                aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle"><span
                                        class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span><span class="menu-text">Franchises</span><i
                                        class="menu-arrow"></i></a>
                                <div class="menu-submenu "><i class="menu-arrow"></i>

                                    <ul class="menu-subnav">

                                        <li class="menu-item menu-item-submenu {{ request()->is('franchises*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('franchises-enquires.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Enquiries</span>
                                            </a>
                                        </li>

                                        <li class="menu-item menu-item-submenu"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{route('franchises-enquires.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Lists</span>
                                            </a>
                                        </li>
                                        <!-- <li class="menu-item menu-item-submenu {{ request()->is('franchises-emp*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('franchises-emp.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Franchises EMP</span>
                                            </a>
                                        </li> -->


                                    </ul>
                                </div>
                            </li>

                            
                            <li class="menu-item {{ request()->is('state-managers*') ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{route('state-managers.index')}}" class="menu-link">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24"
                                            version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path
                                                    d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path
                                                    d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">State Manager</span>
                                </a>
                            </li>



                            <li class="menu-item {{ request()->is('content-writers*') ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{route('content-writers.index')}}" class="menu-link">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24"
                                            version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path
                                                    d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"></rect>
                                                <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"></rect>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">Content Writer</span>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('customer-care*') ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{route('customer-care.index')}}" class="menu-link">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <polygon fill="#000000" opacity="0.3" points="5 15 3 21.5 9.5 19.5"></polygon>
                                                <path
                                                    d="M13.5,21 C8.25329488,21 4,16.7467051 4,11.5 C4,6.25329488 8.25329488,2 13.5,2 C18.7467051,2 23,6.25329488 23,11.5 C23,16.7467051 18.7467051,21 13.5,21 Z M9,8 C8.44771525,8 8,8.44771525 8,9 C8,9.55228475 8.44771525,10 9,10 L18,10 C18.5522847,10 19,9.55228475 19,9 C19,8.44771525 18.5522847,8 18,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 C8,13.5522847 8.44771525,14 9,14 L14,14 C14.5522847,14 15,13.5522847 15,13 C15,12.4477153 14.5522847,12 14,12 L9,12 Z"
                                                    fill="#000000"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">Customer Care</span>
                                </a>
                            </li>
                            
                            
                            <li class="menu-item  menu-item-submenu {{ (request()->is('franchises*')||request()->is('franchises-enquires*')||request()->is('enquires*')||request()->is('franchises-emp*'))  ? 'menu-item-open' : '' }}"
                                aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle"><span
                                        class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span><span class="menu-text">Business Dev. Exec.</span><i
                                        class="menu-arrow"></i></a>
                                <div class="menu-submenu "><i class="menu-arrow"></i>

                                    <ul class="menu-subnav">

                                        <li class="menu-item menu-item-submenu {{ request()->is('bde*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('bde.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Enquiries</span>
                                            </a>
                                        </li>

                                        <li class="menu-item menu-item-submenu"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{route('bde.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Lists</span>
                                            </a>
                                        </li>
                                        <!-- <li class="menu-item menu-item-submenu {{ request()->is('franchises-emp*') ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{ route('franchises-emp.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Franchises EMP</span>
                                            </a>
                                        </li> -->


                                    </ul>
                                </div>
                            </li>



                            <li class="menu-item  menu-item-submenu {{ (request()->is('franchises*')||request()->is('franchises-enquires*')||request()->is('enquires*')||request()->is('franchises-emp*'))  ? 'menu-item-open' : '' }}"
                                aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle"><span
                                        class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span><span class="menu-text">Coupons</span><i
                                        class="menu-arrow"></i></a>
                                <div class="menu-submenu "><i class="menu-arrow"></i>

                                    <ul class="menu-subnav">

                                        <li class="menu-item menu-item-submenu"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{route('enquires.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Lists</span>
                                            </a>
                                        </li>

                                        <li class="menu-item menu-item-submenu"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{route('enquires.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Buy Lists</span>
                                            </a>
                                        </li>

                                        <li class="menu-item menu-item-submenu"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{route('enquires.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Sell Lists</span>
                                            </a>
                                        </li>

                                        <li class="menu-item menu-item-submenu"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{route('enquires.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Used Lists</span>
                                            </a>
                                        </li>
                                        

                                    </ul>
                                </div>
                            </li>


                            <li class="menu-item  menu-item-submenu {{ (request()->is('franchises*')||request()->is('franchises-enquires*')||request()->is('enquires*')||request()->is('franchises-emp*'))  ? 'menu-item-open' : '' }}"
                                aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle"><span
                                        class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span><span class="menu-text">Payments</span><i
                                        class="menu-arrow"></i></a>
                                <div class="menu-submenu "><i class="menu-arrow"></i>

                                    <ul class="menu-subnav">

                                        <li class="menu-item menu-item-submenu"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{route('enquires.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Ad Payments</span>
                                            </a>
                                        </li>

                                        <li class="menu-item menu-item-submenu"
                                            aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{route('enquires.index')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Coupon Buy Payments</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li class="menu-item {{ request()->is('state-managers*') ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{route('state-managers.index')}}" class="menu-link">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24"
                                            version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path
                                                    d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path
                                                    d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">Reports</span>
                                </a>
                            </li>

                            @endrole


                            @endauth
                            <li class="menu-item {{ request()->is('settings*') ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{url('settings')}}" class="menu-link">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24"
                                            version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-text">Settings</span>
                                </a>
                            </li>

                        </ul>
                        <!--end::Menu Nav-->
                    </div>
                    <!--end::Menu Container-->
                </div>
                <!--end::Aside Menu-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header header-fixed">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <!--begin::Header Menu Wrapper-->
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                            <!--begin::Header Menu-->
                            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                                <!--begin::Header Nav-->
                                <ul class="menu-nav">

                                </ul>
                                <!--end::Header Nav-->
                            </div>
                            <!--end::Header Menu-->
                        </div>
                        <!--end::Header Menu Wrapper-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <div class="topbar-item">
                                <div
                                    class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                    id="kt_quick_user_toggle">
                                    <span
                                        class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                                    <span
                                        class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{auth()->user()->name}}</span>
                                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                        <span
                                            class="symbol-label font-size-h5 font-weight-bold">{{auth()->user()->name[0]}}</span>
                                    </span>
                                </div>
                            </div>
                            <!--end::user-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->

                @yield('content')
                <!--end::Content-->
                <!--begin::Footer-->
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    <!-- begin::user Panel-->
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            <h3 class="font-weight-bold m-0">User Profile
                <small class="text-muted font-size-sm ml-2"></small>
            </h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="offcanvas-content pr-5 mr-n5">
            <!--begin::Header-->
            <div class="d-flex align-items-center mt-5">
                <div class="symbol symbol-100 mr-5">
                    <div class="symbol-label"
                        style="background-image:url({{!empty(\Illuminate\Support\Facades\Auth::user()->profile_image)?asset('uploads/'.\Illuminate\Support\Facades\Auth::user()->profile_image):asset('assets/media/users/user.jpg')}})"></div>
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div class="d-flex flex-column">
                    <a href="{{url('/')}}"
                        class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ auth()->user()->name }}</a>
                    <div class="navi mt-2">
                        <a href="{{url('/')}}" class="navi-item">
                            <span class="navi-link p-0 pb-2">
                                <span class="navi-icon mr-1">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                    fill="#000000" />
                                                <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span
                                    class="navi-text text-muted text-hover-primary">{{auth()->user()->email}}</span>
                            </span>
                        </a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Separator-->
            <div class="separator separator-dashed mt-8 mb-5"></div>
        </div>
        <!-- end::user Panel-->
        <!--begin::Quick Cart-->
        <div id="kt_quick_cart" class="offcanvas offcanvas-right p-10">
            <!--begin::Header-->
            <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
                <h4 class="font-weight-bold m-0">Shopping Cart</h4>
                <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_close">
                    <i class="ki ki-close icon-xs text-muted"></i>
                </a>
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="offcanvas-content">
                <!--begin::Wrapper-->
                <div class="offcanvas-wrapper mb-5 scroll-pull">
                    <!--begin::Item-->
                    <div class="d-flex align-items-center justify-content-between py-8">
                        <div class="d-flex flex-column mr-2">
                            <a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">iBlender</a>
                            <span class="text-muted">The best kitchen gadget in 2020</span>
                            <div class="d-flex align-items-center mt-2">
                                <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 350</span>
                                <span class="text-muted mr-1">for</span>
                                <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">5</span>
                                <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                                    <i class="ki ki-minus icon-xs"></i>
                                </a>
                                <a href="#" class="btn btn-xs btn-light-success btn-icon">
                                    <i class="ki ki-plus icon-xs"></i>
                                </a>
                            </div>
                        </div>
                        <a href="#" class="symbol symbol-70 flex-shrink-0">
                            <img src="{{asset('assets/media/stock-600x400/img-1.jpg')}}" title="" alt="" />
                        </a>
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-solid"></div>
                    <!--end::Separator-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center justify-content-between py-8">
                        <div class="d-flex flex-column mr-2">
                            <a href="#"
                                class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">SmartCleaner</a>
                            <span class="text-muted">Smart tool for cooking</span>
                            <div class="d-flex align-items-center mt-2">
                                <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 650</span>
                                <span class="text-muted mr-1">for</span>
                                <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">4</span>
                                <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                                    <i class="ki ki-minus icon-xs"></i>
                                </a>
                                <a href="#" class="btn btn-xs btn-light-success btn-icon">
                                    <i class="ki ki-plus icon-xs"></i>
                                </a>
                            </div>
                        </div>
                        <a href="#" class="symbol symbol-70 flex-shrink-0">
                            <img src="{{asset('assets/media/stock-600x400/img-2.jpg')}}" title="" alt="" />
                        </a>
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-solid"></div>
                    <!--end::Separator-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center justify-content-between py-8">
                        <div class="d-flex flex-column mr-2">
                            <a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">CameraMax</a>
                            <span class="text-muted">Professional camera for edge cutting shots</span>
                            <div class="d-flex align-items-center mt-2">
                                <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 150</span>
                                <span class="text-muted mr-1">for</span>
                                <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">3</span>
                                <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                                    <i class="ki ki-minus icon-xs"></i>
                                </a>
                                <a href="#" class="btn btn-xs btn-light-success btn-icon">
                                    <i class="ki ki-plus icon-xs"></i>
                                </a>
                            </div>
                        </div>
                        <a href="#" class="symbol symbol-70 flex-shrink-0">
                            <img src="{{asset('assets/media/stock-600x400/img-3.jpg')}}" title="" alt="" />
                        </a>
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-solid"></div>
                    <!--end::Separator-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center justify-content-between py-8">
                        <div class="d-flex flex-column mr-2">
                            <a href="#" class="font-weight-bold text-dark text-hover-primary">4D Printer</a>
                            <span class="text-muted">Manufactoring unique objects</span>
                            <div class="d-flex align-items-center mt-2">
                                <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 1450</span>
                                <span class="text-muted mr-1">for</span>
                                <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">7</span>
                                <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                                    <i class="ki ki-minus icon-xs"></i>
                                </a>
                                <a href="#" class="btn btn-xs btn-light-success btn-icon">
                                    <i class="ki ki-plus icon-xs"></i>
                                </a>
                            </div>
                        </div>
                        <a href="#" class="symbol symbol-70 flex-shrink-0">
                            <img src="{{asset('assets/media/stock-600x400/img-4.jpg')}}" title="" alt="" />
                        </a>
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-solid"></div>
                    <!--end::Separator-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center justify-content-between py-8">
                        <div class="d-flex flex-column mr-2">
                            <a href="#" class="font-weight-bold text-dark text-hover-primary">MotionWire</a>
                            <span class="text-muted">Perfect animation tool</span>
                            <div class="d-flex align-items-center mt-2">
                                <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 650</span>
                                <span class="text-muted mr-1">for</span>
                                <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">7</span>
                                <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                                    <i class="ki ki-minus icon-xs"></i>
                                </a>
                                <a href="#" class="btn btn-xs btn-light-success btn-icon">
                                    <i class="ki ki-plus icon-xs"></i>
                                </a>
                            </div>
                        </div>
                        <a href="#" class="symbol symbol-70 flex-shrink-0">
                            <img src="{{asset('assets/media/stock-600x400/img-8.jpg')}}" title="" alt="" />
                        </a>
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Purchase-->
                <div class="offcanvas-footer">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <span class="font-weight-bold text-muted font-size-sm mr-2">Total</span>
                        <span class="font-weight-bolder text-dark-50 text-right">$1840.00</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-7">
                        <span class="font-weight-bold text-muted font-size-sm mr-2">Sub total</span>
                        <span class="font-weight-bolder text-primary text-right">$5640.00</span>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary text-weight-bold">Place Order</button>
                    </div>
                </div>
                <!--end::Purchase-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Quick Cart-->
        <!--begin::Quick Panel-->
        <div id="kt_quick_panel" class="offcanvas offcanvas-right pt-5 pb-10">
            <!--begin::Header-->
            <div class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5">
                <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary flex-grow-1 px-10"
                    role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_logs">Audit Logs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_notifications">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_settings">Settings</a>
                    </li>
                </ul>
                <div class="offcanvas-close mt-n1 pr-5">
                    <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_panel_close">
                        <i class="ki ki-close icon-xs text-muted"></i>
                    </a>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="offcanvas-content px-10">
                <div class="tab-content">
                    <!--begin::Tabpane-->
                    <div class="tab-pane fade show pt-3 pr-5 mr-n5 active" id="kt_quick_panel_logs" role="tabpanel">
                        <!--begin::Section-->
                        <div class="mb-15">
                            <h5 class="font-weight-bold mb-5">System Messages</h5>
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-wrap mb-5">
                                <div class="symbol symbol-50 symbol-light mr-5">
                                    <span class="symbol-label">
                                        <img src="{{asset('assets/media/svg/misc/006-plurk.svg')}}"
                                            class="h-50 align-self-center"
                                            alt="" />
                                    </span>
                                </div>
                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                    <a href="#"
                                        class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">Top
                                        Authors</a>
                                    <span class="text-muted font-weight-bold">Most Successful Fellas</span>
                                </div>
                                <span
                                    class="btn btn-sm btn-light font-weight-bolder py-1 my-lg-0 my-2 text-dark-50">+82$</span>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-wrap mb-5">
                                <div class="symbol symbol-50 symbol-light mr-5">
                                    <span class="symbol-label">
                                        <img src="{{asset('assets/media/svg/misc/015-telegram.svg')}}"
                                            class="h-50 align-self-center"
                                            alt="" />
                                    </span>
                                </div>
                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                    <a href="#"
                                        class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">Popular
                                        Authors</a>
                                    <span class="text-muted font-weight-bold">Most Successful Fellas</span>
                                </div>
                                <span
                                    class="btn btn-sm btn-light font-weight-bolder my-lg-0 my-2 py-1 text-dark-50">+280$</span>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-wrap mb-5">
                                <div class="symbol symbol-50 symbol-light mr-5">
                                    <span class="symbol-label">
                                        <img src="{{asset('assets/media/svg/misc/003-puzzle.svg')}}"
                                            class="h-50 align-self-center"
                                            alt="" />
                                    </span>
                                </div>
                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                    <a href="#"
                                        class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">New
                                        Users</a>
                                    <span class="text-muted font-weight-bold">Most Successful Fellas</span>
                                </div>
                                <span
                                    class="btn btn-sm btn-light font-weight-bolder my-lg-0 my-2 py-1 text-dark-50">+4500$</span>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-wrap mb-5">
                                <div class="symbol symbol-50 symbol-light mr-5">
                                    <span class="symbol-label">
                                        <img src="{{asset('assets/media/svg/misc/005-bebo.svg')}}"
                                            class="h-50 align-self-center"
                                            alt="" />
                                    </span>
                                </div>
                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                    <a href="#"
                                        class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">Active
                                        Customers</a>
                                    <span class="text-muted font-weight-bold">Most Successful Fellas</span>
                                </div>
                                <span
                                    class="btn btn-sm btn-light font-weight-bolder my-lg-0 my-2 py-1 text-dark-50">+4500$</span>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-wrap">
                                <div class="symbol symbol-50 symbol-light mr-5">
                                    <span class="symbol-label">
                                        <img src="{{asset('assets/media/svg/misc/014-kickstarter.svg')}}"
                                            class="h-50 align-self-center" alt="" />
                                    </span>
                                </div>
                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                    <a href="#"
                                        class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">Bestseller
                                        Theme</a>
                                    <span class="text-muted font-weight-bold">Most Successful Fellas</span>
                                </div>
                                <span
                                    class="btn btn-sm btn-light font-weight-bolder my-lg-0 my-2 py-1 text-dark-50">+4500$</span>
                            </div>
                            <!--end: Item-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Section-->
                        <div class="mb-5">
                            <h5 class="font-weight-bold mb-5">Notifications</h5>
                            <!--begin: Item-->
                            <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-5">
                                <span class="svg-icon svg-icon-warning mr-5">
                                    <span class="svg-icon svg-icon-lg">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                    fill="#000000" />
                                                <rect fill="#000000" opacity="0.3"
                                                    transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                    x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                    <a href="#"
                                        class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Another
                                        purpose persuade</a>
                                    <span class="text-muted font-size-sm">Due in 2 Days</span>
                                </div>
                                <span class="font-weight-bolder text-warning py-1 font-size-lg">+28%</span>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center bg-light-success rounded p-5 mb-5">
                                <span class="svg-icon svg-icon-success mr-5">
                                    <span class="svg-icon svg-icon-lg">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                <path
                                                    d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                    <a href="#"
                                        class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Would
                                        be to people</a>
                                    <span class="text-muted font-size-sm">Due in 2 Days</span>
                                </div>
                                <span class="font-weight-bolder text-success py-1 font-size-lg">+50%</span>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-5">
                                <span class="svg-icon svg-icon-danger mr-5">
                                    <span class="svg-icon svg-icon-lg">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                    <a href="#"
                                        class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">Purpose
                                        would be to persuade</a>
                                    <span class="text-muted font-size-sm">Due in 2 Days</span>
                                </div>
                                <span class="font-weight-bolder text-danger py-1 font-size-lg">-27%</span>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center bg-light-info rounded p-5">
                                <span class="svg-icon svg-icon-info mr-5">
                                    <span class="svg-icon svg-icon-lg">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Attachment2.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z"
                                                    fill="#000000" opacity="0.3"
                                                    transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641)" />
                                                <path
                                                    d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z"
                                                    fill="#000000"
                                                    transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359)" />
                                                <path
                                                    d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z"
                                                    fill="#000000" opacity="0.3"
                                                    transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146)" />
                                                <path
                                                    d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z"
                                                    fill="#000000" opacity="0.3"
                                                    transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961)" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                    <a href="#"
                                        class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">The
                                        best product</a>
                                    <span class="text-muted font-size-sm">Due in 2 Days</span>
                                </div>
                                <span class="font-weight-bolder text-info py-1 font-size-lg">+8%</span>
                            </div>
                            <!--end: Item-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Tabpane-->
                    <!--begin::Tabpane-->
                    <div class="tab-pane fade pt-2 pr-5 mr-n5" id="kt_quick_panel_notifications" role="tabpanel">
                        <!--begin::Nav-->
                        <div class="navi navi-icon-circle navi-spacer-x-0">
                            <!--begin::Item-->
                            <a href="#" class="navi-item">
                                <div class="navi-link rounded">
                                    <div class="symbol symbol-50 mr-3">
                                        <div class="symbol-label">
                                            <i class="flaticon-bell text-success icon-lg"></i>
                                        </div>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold font-size-lg">5 new user generated report</div>
                                        <div class="text-muted">Reports based on sales</div>
                                    </div>
                                </div>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <a href="#" class="navi-item">
                                <div class="navi-link rounded">
                                    <div class="symbol symbol-50 mr-3">
                                        <div class="symbol-label">
                                            <i class="flaticon2-box text-danger icon-lg"></i>
                                        </div>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold font-size-lg">2 new items submited</div>
                                        <div class="text-muted">by Grog John</div>
                                    </div>
                                </div>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <a href="#" class="navi-item">
                                <div class="navi-link rounded">
                                    <div class="symbol symbol-50 mr-3">
                                        <div class="symbol-label">
                                            <i class="flaticon-psd text-primary icon-lg"></i>
                                        </div>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold font-size-lg">79 PSD files generated</div>
                                        <div class="text-muted">Reports based on sales</div>
                                    </div>
                                </div>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <a href="#" class="navi-item">
                                <div class="navi-link rounded">
                                    <div class="symbol symbol-50 mr-3">
                                        <div class="symbol-label">
                                            <i class="flaticon2-supermarket text-warning icon-lg"></i>
                                        </div>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold font-size-lg">$2900 worth producucts sold</div>
                                        <div class="text-muted">Total 234 items</div>
                                    </div>
                                </div>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <a href="#" class="navi-item">
                                <div class="navi-link rounded">
                                    <div class="symbol symbol-50 mr-3">
                                        <div class="symbol-label">
                                            <i class="flaticon-paper-plane-1 text-success icon-lg"></i>
                                        </div>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold font-size-lg">4.5h-avarage response time</div>
                                        <div class="text-muted">Fostest is Barry</div>
                                    </div>
                                </div>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <a href="#" class="navi-item">
                                <div class="navi-link rounded">
                                    <div class="symbol symbol-50 mr-3">
                                        <div class="symbol-label">
                                            <i class="flaticon-safe-shield-protection text-danger icon-lg"></i>
                                        </div>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold font-size-lg">3 Defence alerts</div>
                                        <div class="text-muted">40% less alerts thar last week</div>
                                    </div>
                                </div>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <a href="#" class="navi-item">
                                <div class="navi-link rounded">
                                    <div class="symbol symbol-50 mr-3">
                                        <div class="symbol-label">
                                            <i class="flaticon-notepad text-primary icon-lg"></i>
                                        </div>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold font-size-lg">Avarage 4 blog posts per author</div>
                                        <div class="text-muted">Most posted 12 time</div>
                                    </div>
                                </div>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <a href="#" class="navi-item">
                                <div class="navi-link rounded">
                                    <div class="symbol symbol-50 mr-3">
                                        <div class="symbol-label">
                                            <i class="flaticon-users-1 text-warning icon-lg"></i>
                                        </div>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold font-size-lg">16 authors joined last week</div>
                                        <div class="text-muted">9 photodrapehrs, 7 designer</div>
                                    </div>
                                </div>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <a href="#" class="navi-item">
                                <div class="navi-link rounded">
                                    <div class="symbol symbol-50 mr-3">
                                        <div class="symbol-label">
                                            <i class="flaticon2-box text-info icon-lg"></i>
                                        </div>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold font-size-lg">2 new items have been submited</div>
                                        <div class="text-muted">by Grog John</div>
                                    </div>
                                </div>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <a href="#" class="navi-item">
                                <div class="navi-link rounded">
                                    <div class="symbol symbol-50 mr-3">
                                        <div class="symbol-label">
                                            <i class="flaticon2-download text-success icon-lg"></i>
                                        </div>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold font-size-lg">2.8 GB-total downloads size</div>
                                        <div class="text-muted">Mostly PSD end AL concepts</div>
                                    </div>
                                </div>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <a href="#" class="navi-item">
                                <div class="navi-link rounded">
                                    <div class="symbol symbol-50 mr-3">
                                        <div class="symbol-label">
                                            <i class="flaticon2-supermarket text-danger icon-lg"></i>
                                        </div>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold font-size-lg">$2900 worth producucts sold</div>
                                        <div class="text-muted">Total 234 items</div>
                                    </div>
                                </div>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <a href="#" class="navi-item">
                                <div class="navi-link rounded">
                                    <div class="symbol symbol-50 mr-3">
                                        <div class="symbol-label">
                                            <i class="flaticon-bell text-primary icon-lg"></i>
                                        </div>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold font-size-lg">7 new user generated report</div>
                                        <div class="text-muted">Reports based on sales</div>
                                    </div>
                                </div>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <a href="#" class="navi-item">
                                <div class="navi-link rounded">
                                    <div class="symbol symbol-50 mr-3">
                                        <div class="symbol-label">
                                            <i class="flaticon-paper-plane-1 text-success icon-lg"></i>
                                        </div>
                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold font-size-lg">4.5h-avarage response time</div>
                                        <div class="text-muted">Fostest is Barry</div>
                                    </div>
                                </div>
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Tabpane-->
                    <!--begin::Tabpane-->
                    <div class="tab-pane fade pt-3 pr-5 mr-n5" id="kt_quick_panel_settings" role="tabpanel">
                        <form class="form">
                            <!--begin::Section-->
                            <div>
                                <h5 class="font-weight-bold mb-3">Customer Care</h5>
                                <div class="form-group mb-0 row align-items-center">
                                    <label class="col-8 col-form-label">Enable Notifications:</label>
                                    <div class="col-4 d-flex justify-content-end">
                                        <span class="switch switch-success switch-sm">
                                            <label>
                                                <input type="checkbox" checked="checked" name="select" />
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row align-items-center">
                                    <label class="col-8 col-form-label">Enable Case Tracking:</label>
                                    <div class="col-4 d-flex justify-content-end">
                                        <span class="switch switch-success switch-sm">
                                            <label>
                                                <input type="checkbox" name="quick_panel_notifications_2" />
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row align-items-center">
                                    <label class="col-8 col-form-label">Support Portal:</label>
                                    <div class="col-4 d-flex justify-content-end">
                                        <span class="switch switch-success switch-sm">
                                            <label>
                                                <input type="checkbox" checked="checked" name="select" />
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Section-->
                            <div class="separator separator-dashed my-6"></div>
                            <!--begin::Section-->
                            <div class="pt-2">
                                <h5 class="font-weight-bold mb-3">Reports</h5>
                                <div class="form-group mb-0 row align-items-center">
                                    <label class="col-8 col-form-label">Generate Reports:</label>
                                    <div class="col-4 d-flex justify-content-end">
                                        <span class="switch switch-sm switch-danger">
                                            <label>
                                                <input type="checkbox" checked="checked" name="select" />
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row align-items-center">
                                    <label class="col-8 col-form-label">Enable Report Export:</label>
                                    <div class="col-4 d-flex justify-content-end">
                                        <span class="switch switch-sm switch-danger">
                                            <label>
                                                <input type="checkbox" name="select" />
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row align-items-center">
                                    <label class="col-8 col-form-label">Allow Data Collection:</label>
                                    <div class="col-4 d-flex justify-content-end">
                                        <span class="switch switch-sm switch-danger">
                                            <label>
                                                <input type="checkbox" checked="checked" name="select" />
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Section-->
                            <div class="separator separator-dashed my-6"></div>
                            <!--begin::Section-->
                            <div class="pt-2">
                                <h5 class="font-weight-bold mb-3">Memebers</h5>
                                <div class="form-group mb-0 row align-items-center">
                                    <label class="col-8 col-form-label">Enable Member singup:</label>
                                    <div class="col-4 d-flex justify-content-end">
                                        <span class="switch switch-sm switch-primary">
                                            <label>
                                                <input type="checkbox" checked="checked" name="select" />
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row align-items-center">
                                    <label class="col-8 col-form-label">Allow User Feedbacks:</label>
                                    <div class="col-4 d-flex justify-content-end">
                                        <span class="switch switch-sm switch-primary">
                                            <label>
                                                <input type="checkbox" name="select" />
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row align-items-center">
                                    <label class="col-8 col-form-label">Enable Customer Portal:</label>
                                    <div class="col-4 d-flex justify-content-end">
                                        <span class="switch switch-sm switch-primary">
                                            <label>
                                                <input type="checkbox" checked="checked" name="select" />
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Section-->
                        </form>
                    </div>
                    <!--end::Tabpane-->
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Quick Panel-->
        <!--begin::Chat Panel-->
        <div class="modal modal-sticky modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <!--begin::Header-->
                        <div class="card-header align-items-center px-4 py-3">
                            <div class="text-left flex-grow-1">
                                <!--begin::Dropdown Menu-->
                                <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="svg-icon svg-icon-lg">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </button>
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md">
                                        <!--begin::Navigation-->
                                        <ul class="navi navi-hover py-5">
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-drop"></i>
                                                    </span>
                                                    <span class="navi-text">New Group</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-list-3"></i>
                                                    </span>
                                                    <span class="navi-text">Contacts</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-rocket-1"></i>
                                                    </span>
                                                    <span class="navi-text">Groups</span>
                                                    <span class="navi-link-badge">
                                                        <span
                                                            class="label label-light-primary label-inline font-weight-bold">new</span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-bell-2"></i>
                                                    </span>
                                                    <span class="navi-text">Calls</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-gear"></i>
                                                    </span>
                                                    <span class="navi-text">Settings</span>
                                                </a>
                                            </li>
                                            <li class="navi-separator my-3"></li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-magnifier-tool"></i>
                                                    </span>
                                                    <span class="navi-text">Help</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-bell-2"></i>
                                                    </span>
                                                    <span class="navi-text">Privacy</span>
                                                    <span class="navi-link-badge">
                                                        <span
                                                            class="label label-light-danger label-rounded font-weight-bold">5</span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                </div>
                                <!--end::Dropdown Menu-->
                            </div>
                            <div class="text-center flex-grow-1">
                                <div class="text-dark-75 font-weight-bold font-size-h5">Matt Pears</div>
                                <div>
                                    <span class="label label-dot label-success"></span>
                                    <span class="font-weight-bold text-muted font-size-sm">Active</span>
                                </div>
                            </div>
                            <div class="text-right flex-grow-1">
                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                    data-dismiss="modal">
                                    <i class="ki ki-close icon-1x"></i>
                                </button>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Scroll-->
                            <div class="scroll scroll-pull" data-height="375" data-mobile-height="300">
                                <!--begin::Messages-->
                                <div class="messages">
                                    <!--begin::Message In-->
                                    <div class="d-flex flex-column mb-5 align-items-start">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-circle symbol-40 mr-3">
                                                <img alt="Pic" src="{{asset('assets/media/users/300_12.jpg')}}" />
                                            </div>
                                            <div>
                                                <a href="#"
                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt
                                                    Pears</a>
                                                <span class="text-muted font-size-sm">2 Hours</span>
                                            </div>
                                        </div>
                                        <div
                                            class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                            How likely are you to recommend our company to your friends and family?
                                        </div>
                                    </div>
                                    <!--end::Message In-->
                                    <!--begin::Message Out-->
                                    <div class="d-flex flex-column mb-5 align-items-end">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <span class="text-muted font-size-sm">3 minutes</span>
                                                <a href="#"
                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                            </div>
                                            <div class="symbol symbol-circle symbol-40 ml-3">
                                                <img alt="Pic" src="{{asset('assets/media/users/300_21.jpg')}}" />
                                            </div>
                                        </div>
                                        <div
                                            class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                            Hey there, we’re just writing to let you know that you’ve been subscribed to a
                                            repository on GitHub.
                                        </div>
                                    </div>
                                    <!--end::Message Out-->
                                    <!--begin::Message In-->
                                    <div class="d-flex flex-column mb-5 align-items-start">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-circle symbol-40 mr-3">
                                                <img alt="Pic" src="{{asset('assets/media/users/300_21.jpg')}}" />
                                            </div>
                                            <div>
                                                <a href="#"
                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt
                                                    Pears</a>
                                                <span class="text-muted font-size-sm">40 seconds</span>
                                            </div>
                                        </div>
                                        <div
                                            class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                            Ok, Understood!
                                        </div>
                                    </div>
                                    <!--end::Message In-->
                                    <!--begin::Message Out-->
                                    <div class="d-flex flex-column mb-5 align-items-end">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <span class="text-muted font-size-sm">Just now</span>
                                                <a href="#"
                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                            </div>
                                            <div class="symbol symbol-circle symbol-40 ml-3">
                                                <img alt="Pic" src="{{asset('assets/media/users/300_21.jpg')}}" />
                                            </div>
                                        </div>
                                        <div
                                            class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                            You’ll receive notifications for all issues, pull requests!
                                        </div>
                                    </div>
                                    <!--end::Message Out-->
                                    <!--begin::Message In-->
                                    <div class="d-flex flex-column mb-5 align-items-start">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-circle symbol-40 mr-3">
                                                <img alt="Pic" src="{{asset('assets/media/users/300_12.jpg')}}" />
                                            </div>
                                            <div>
                                                <a href="#"
                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt
                                                    Pears</a>
                                                <span class="text-muted font-size-sm">40 seconds</span>
                                            </div>
                                        </div>
                                        <div
                                            class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                            You can unwatch this repository immediately by clicking here:
                                            <a href="#">https://github.com</a>
                                        </div>
                                    </div>
                                    <!--end::Message In-->
                                    <!--begin::Message Out-->
                                    <div class="d-flex flex-column mb-5 align-items-end">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <span class="text-muted font-size-sm">Just now</span>
                                                <a href="#"
                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                            </div>
                                            <div class="symbol symbol-circle symbol-40 ml-3">
                                                <img alt="Pic" src="{{asset('assets/media/users/300_21.jpg')}}" />
                                            </div>
                                        </div>
                                        <div
                                            class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                            Discover what students who viewed Learn Figma - UI/UX Design. Essential Training
                                            also viewed
                                        </div>
                                    </div>
                                    <!--end::Message Out-->
                                    <!--begin::Message In-->
                                    <div class="d-flex flex-column mb-5 align-items-start">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-circle symbol-40 mr-3">
                                                <img alt="Pic" src="{{asset('assets/media/users/300_12.jpg')}}" />
                                            </div>
                                            <div>
                                                <a href="#"
                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt
                                                    Pears</a>
                                                <span class="text-muted font-size-sm">40 seconds</span>
                                            </div>
                                        </div>
                                        <div
                                            class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                            Most purchased Business courses during this sale!
                                        </div>
                                    </div>
                                    <!--end::Message In-->
                                    <!--begin::Message Out-->
                                    <div class="d-flex flex-column mb-5 align-items-end">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <span class="text-muted font-size-sm">Just now</span>
                                                <a href="#"
                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                            </div>
                                            <div class="symbol symbol-circle symbol-40 ml-3">
                                                <img alt="Pic" src="{{asset('assets/media/users/300_21.jpg')}}" />
                                            </div>
                                        </div>
                                        <div
                                            class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                            Company BBQ to celebrate the last quater achievements and goals. Food and drinks
                                            provided
                                        </div>
                                    </div>
                                    <!--end::Message Out-->
                                </div>
                                <!--end::Messages-->
                            </div>
                            <!--end::Scroll-->
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer align-items-center">
                            <!--begin::Compose-->
                            <textarea class="form-control border-0 p-0" rows="2" placeholder="Type a message"></textarea>
                            <div class="d-flex align-items-center justify-content-between mt-5">
                                <div class="mr-3">
                                    <a href="#" class="btn btn-clean btn-icon btn-md mr-1">
                                        <i class="flaticon2-photograph icon-lg"></i>
                                    </a>
                                    <a href="#" class="btn btn-clean btn-icon btn-md">
                                        <i class="flaticon2-photo-camera icon-lg"></i>
                                    </a>
                                </div>
                                <div>
                                    <button type="button"
                                        class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">
                                        Send
                                    </button>
                                </div>
                            </div>
                            <!--begin::Compose-->
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Chat Panel-->
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop">
            <span class="svg-icon">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                        <path
                            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                            fill="#000000" fill-rule="nonzero" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </div>
        <!--end::Scrolltop-->
        <!--begin::Sticky Toolbar-->
        <!--end::Sticky Toolbar-->
        <!--begin::Demo Panel-->
        <!--end::Demo Panel-->
        <script>
            var HOST_URL = "/"
        </script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {
                "breakpoints": {
                    "sm": 576,
                    "md": 768,
                    "lg": 992,
                    "xl": 1200,
                    "xxl": 1400
                },
                "colors": {
                    "theme": {
                        "base": {
                            "white": "#ffffff",
                            "primary": "#3699FF",
                            "secondary": "#E5EAEE",
                            "success": "#1BC5BD",
                            "info": "#8950FC",
                            "warning": "#FFA800",
                            "danger": "#F64E60",
                            "light": "#E4E6EF",
                            "dark": "#181C32"
                        },
                        "light": {
                            "white": "#ffffff",
                            "primary": "#E1F0FF",
                            "secondary": "#EBEDF3",
                            "success": "#C9F7F5",
                            "info": "#EEE5FF",
                            "warning": "#FFF4DE",
                            "danger": "#FFE2E5",
                            "light": "#F3F6F9",
                            "dark": "#D6D6E0"
                        },
                        "inverse": {
                            "white": "#ffffff",
                            "primary": "#ffffff",
                            "secondary": "#3F4254",
                            "success": "#ffffff",
                            "info": "#ffffff",
                            "warning": "#ffffff",
                            "danger": "#ffffff",
                            "light": "#464E5F",
                            "dark": "#ffffff"
                        }
                    },
                    "gray": {
                        "gray-100": "#F3F6F9",
                        "gray-200": "#EBEDF3",
                        "gray-300": "#E4E6EF",
                        "gray-400": "#D1D3E0",
                        "gray-500": "#B5B5C3",
                        "gray-600": "#7E8299",
                        "gray-700": "#5E6278",
                        "gray-800": "#3F4254",
                        "gray-900": "#181C32"
                    }
                },
                "font-family": "Poppins"
            };
        </script>
        <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
        <script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
        <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>
        <script src="{{asset('assets/js/common.js')}}"></script>
        <script>
            $('#kt_datatable').DataTable({
                "aaSorting": [],
                "serverSide": false,
                "ordering": false,
                "stateSave": true,
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, 100, 500, 1000000],
                    [10, 25, 50, 100, 500, "All"]
                ]
            });
        </script>
        @stack('scripts')
</body>
<!--end::Body-->

</html>