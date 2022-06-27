<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="keywords" content="admin dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/logo/80.80.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('app-assets/images/logo/80.80.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    @if (App::getLocale() == 'en')
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
        <!-- END VENDOR CSS-->
        <!-- BEGIN MODERN CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.css')}}">
        <!-- END MODERN CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css')}}">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">

        {{--for production--}}
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('app-assets/css/vendors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
        <!-- END VENDOR CSS-->
        <!-- BEGIN MODERN CSS-->
        <link rel="stylesheet" type="text/css" href="{{secure_asset('app-assets/css/app.css')}}">
        <!-- END MODERN CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('app-assets/css/core/colors/palette-gradient.css')}}">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/css/style.css')}}">
    @else
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/vendors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
        <!-- END VENDOR CSS-->
        <!-- BEGIN MODERN CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/custom-rtl.css')}}">
        <!-- END MODERN CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-rtl.css')}}">
        <!-- END Custom CSS-->
        {{--for production--}}
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('app-assets/css-rtl/vendors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
        <!-- END VENDOR CSS-->
        <!-- BEGIN MODERN CSS-->
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('app-assets/css-rtl/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('app-assets/css-rtl/custom-rtl.css')}}">
        <!-- END MODERN CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/css/style-rtl.css')}}">
        <!-- END Custom CSS-->
    @endif

</head>

<body class="vertical-layout vertical-menu-modern content-detached-right-sidebar   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="content-detached-right-sidebar">
{{-- Start Top Fixed nav --}}
<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark  navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header bg-warning bg-darken-2">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                        class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                            class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ route('admin_index') }}">
                        <img class="brand-logo" alt="logo"
                             src="{{ asset('app-assets/images/logo/120.120.png') }}">
                        @if (App::getLocale() == 'en')
                            <h5 class="brand-text">{{ __('admins.brand') }}</h5>
                        @else
                            <h3 class="brand-text">{{ __('admins.brand') }}</h3>
                        @endif
                    </a>
                </li>
                <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0"
                                                                      data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white"
                                                                                                data-ticon="ft-toggle-right"></i></a></li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                            class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        {{-- start content of top navbar --}}
        <div class="navbar-container content bg-warning bg-darken-2">
            <div class="collapse navbar-collapse" id="navbar-mobile">

                <ul class="nav navbar-nav mr-auto float-left">
                </ul>

                <ul class="nav navbar-nav float-left">
                    {{-- start profile dropdown --}}
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#"
                           data-toggle="dropdown">
                                <span class="mr-1">{{ __('admins.Hello') }},
                                    <span class="user-name text-bold-700">{{ Auth::user()->name }}</span>
                                </span>
                            <span class="avatar avatar-online">
                                    <img src="{{ asset('app-assets/images/portrait/small/avatar-s-19.png') }}"
                                         alt="avatar"><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i>
                                {{ __('admins.Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    {{-- end profile dropdown --}}
                    {{-- start language switcher --}}
                    <li class="dropdown dropdown-language nav-item">
                        <a id="dropdown-flag1" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="{{ __('admins.flag') }}"></i>
                            <span class="selected-language" data-toggle="tooltip" data-popup="tooltip-custom"
                                  data-original-title="{{ __('admins.Change-The-Language') }}">{{ __('admins.lang') }}</span>
                            <i class="caret"></i>
                        </a>
                        <div aria-labelledby="dropdown-flag1" class="dropdown-menu dropdown-menu-right">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <i
                                        class="flag-icon @if ($properties['native'] == 'English') flag-icon-gb
                                    @else
                                    flag-icon-ps @endif  "></i>{{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                    {{-- end of lang switcher --}}
                </ul>
            </div>
        </div>
        {{-- end content of top navbar --}}
    </div>
</nav>
{{-- End Top Fixed nav --}}
{{-- start side menu --}}
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- Dashboard --}}
            <li class=" @if (Route::currentRouteName() == 'admin_index') active @endif">
                <a href="{{ route('admin_index') }}"><i class="la la-home"></i><span class="menu-title"
                                                                                     data-i18n="nav.dash.main">{{ __('admins.Dashboard') }}</span></a>
            </li>
            {{-- People Involved --}}
            <li class=" navigation-header">
                <span data-i18n="nav.category.People">{{ __('admins.People-Involved') }}</span><i
                    class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right"
                    data-original-title="People"></i>
            </li>
            {{-- Restaurant Managers --}}
            <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title"
                                                                               data-i18n="nav.restaurant_managers.main">{{ __('admins.Restaurant-Managers') }}</span></a>
                <ul class="menu-content">
                    <li class=" @if (Route::currentRouteName() == 'admin_add_res_manager') active @endif"><a class="menu-item"
                                                                                                             href="{{ route('admin_add_res_manager') }}"
                                                                                                             data-i18n="nav.restaurant_managers.add">{{ __('admins.restaurant_managers_add') }}</a>
                    </li>
                    <li class="@if (Route::currentRouteName() == 'admin_res_manager_list') active @endif"><a class="menu-item"
                                                                                                             href="{{ route('admin_res_manager_list') }}"
                                                                                                             data-i18n="nav.restaurant_managers.list">{{ __('admins.restaurant_managers_list') }}</a>
                    </li>
                </ul>
            </li>
            {{-- Delivery Managers --}}
            <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title"
                                                                               data-i18n="nav.delivery_managers.main">{{ __('admins.Delivery-Managers') }}</span></a>
                <ul class="menu-content">
                    <li class="@if (Route::currentRouteName() == 'admin_add_deliviry_manager') active @endif"><a class="menu-item"
                                                                                                                 href="{{ route('admin_add_deliviry_manager') }}"
                                                                                                                 data-i18n="nav.delivery_managers.add">{{ __('admins.Delivery-Managers-add') }}</a>
                    </li>
                    <li class="@if (Route::currentRouteName() == 'admin_deliviry_manager_list') active @endif"><a class="menu-item"
                                                                                                                  href="{{ route('admin_deliviry_manager_list') }}"
                                                                                                                  data-i18n="nav.delivery_managers.list">{{ __('admins.Delivery-Managers-list') }}</a>
                    </li>
                </ul>
            </li>
            {{-- Customers --}}
            <li class=" nav-item"><a href="#"><i class="la la-user"></i><span class="menu-title"
                                                                              data-i18n="nav.restaurant_managers.main">{{ __('admins.Customers') }}</span></a>
                <ul class="menu-content">
                    <li class="@if (Route::currentRouteName() == 'admin_customer_manager_list') active @endif"><a class="menu-item"
                                                                                                                  href="{{ route('admin_customer_manager_list') }}"
                                                                                                                  data-i18n="nav.customer.list">{{ __('admins.Customers-list') }}</a>
                    </li>
                </ul>
            </li>
            {{-- Places --}}
            <li class="                              navigation-header">
                <span data-i18n="nav.category.Places">{{ __('admins.Places') }}</span><i
                    class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right"
                    data-original-title="Places"></i>
            </li>
            {{-- Restaurants --}}
            <li class=" nav-item"><a href="#"><i class="la la-cutlery"></i><span class="menu-title"
                                                                                 data-i18n="nav.restaurants.main">{{ __('admins.restaurants') }}</span></a>
                <ul class="menu-content">
                    <li class="@if (Route::currentRouteName() == 'admin_restaurant_list') active @endif"><a class="menu-item"
                                                                                                            href="{{ route('admin_restaurant_list') }}"
                                                                                                            data-i18n="nav.restaurants.list">{{ __('admins.restaurants-list') }}</a>
                    </li>
                </ul>
            </li>
            {{-- Delivery Offices --}}
            <li class=" nav-item"><a href="#"><i class="la la-truck"></i><span class="menu-title"
                                                                               data-i18n="nav.delivery.main">{{ __('admins.delivery') }}</span></a>
                <ul class="menu-content">
                    <li class="@if (Route::currentRouteName() == 'admin_delivery_list') active @endif"><a class="menu-item"
                                                                                                          href="{{ route('admin_delivery_list') }}"
                                                                                                          data-i18n="nav.delivery.list">{{ __('admins.delivery-list') }}</a>
                    </li>
                </ul>
            </li>
            {{-- Other --}}
            <li class=" navigation-header">
                <span data-i18n="nav.category.Places">{{ __('admins.other') }}</span><i
                    class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right"
                    data-original-title="other"></i>
            </li>
            {{-- Notifications --}}
            <li class=" nav-item"><a href="#"><i class="la la-bell"></i><span class="menu-title"
                                                                              data-i18n="nav.notifications.main">{{ __('admins.notifications') }}</span></a>
                <ul class="menu-content">
                    <li class="@if (Route::currentRouteName() == 'admin_add_notification') active @endif"><a class="menu-item"
                                                                                                             href="{{ route('admin_add_notification') }}"
                                                                                                             data-i18n="nav.notifications.send">{{ __('admins.add-notification') }}</a>
                    </li>
                    <li class="@if (Route::currentRouteName() == 'admin_notification_list') active @endif"><a class="menu-item"
                                                                                                              href="{{ route('admin_notification_list') }}"
                                                                                                              data-i18n="nav.notifications.list">{{ __('admins.notification-list') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
{{-- end side menu --}}
{{-- start page content --}}
@yield('content')
{{-- end page content --}}
{{-- Start Footer --}}
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
            <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2022 <a
                    class="text-bold-800 grey darken-2" href="#" target="_blank">Atlub Ealaa Rahatik
                </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i
                class="ft-heart pink"></i></span>
    </p>
</footer>
{{-- End Footer --}}

<!-- BEGIN VENDOR JS-->
{{--<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>--}}
{{--<!-- BEGIN VENDOR JS-->--}}
{{--<!-- BEGIN PAGE VENDOR JS-->--}}
{{--<script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>--}}
{{--<!-- END PAGE VENDOR JS-->--}}
{{--<!-- BEGIN MODERN JS-->--}}
{{--<script src="{{asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{asset('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>--}}
{{--<!-- END MODERN JS-->--}}
{{--<!-- BEGIN PAGE LEVEL JS-->--}}
{{--<script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>--}}
{{-- for toastr --}}
{{--<script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('app-assets/js/scripts/extensions/toastr.js') }}" type="text/javascript"></script>--}}
{{--for production--}}
<!-- BEGIN VENDOR JS-->
<script src="{{secure_asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{secure_asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{secure_asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{secure_asset('app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
{{-- for toastr --}}
<script src="{{ secure_asset('app-assets/vendors/js/extensions/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ secure_asset('app-assets/js/scripts/extensions/toastr.js') }}" type="text/javascript"></script>
@yield('search js')
</body>

</html>
