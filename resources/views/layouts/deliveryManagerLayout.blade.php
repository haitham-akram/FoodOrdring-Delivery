<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="keywords" content="admin dashboard">
    <title>Delivery Manager</title>
    @if (App::getLocale() == 'en')
        @include('includes.LTRStyle')
    @else
        @include('includes.RTLStyle')
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
                        <a class="navbar-brand" href="{{ route('RM_Home') }}">
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
                    {{-- start search --}}
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i
                                    class="ficon ft-search"></i></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Explore Modern...">
                            </div>
                        </li>
                    </ul>
                    {{-- end search --}}
                    <ul class="nav navbar-nav float-right">
                        {{-- start profile dropdown --}}
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1">{{ __('admins.Hello') }},
                                    <span class="user-name text-bold-700">User Name</span>
                                </span>
                                <span class="avatar avatar-online">
                                    <img src="{{ asset('app-assets/images/portrait/small/avatar-s-19.png') }}"
                                        alt="avatar"><i></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="ft-power"></i>
                                    {{ __('admins.Logout') }}</a>
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
                        {{-- start dropdown notification --}}
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i
                                    class="ficon ft-bell"></i>
                                <span
                                    class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0">
                                        <span class="grey darken-2">Notifications</span>
                                    </h6>
                                    <span class="notification-tag badge badge-default badge-danger float-right m-0">5
                                        New</span>
                                </li>
                                <li class="scrollable-container media-list w-100">
                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                    class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">You have new order!</h6>
                                                <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor
                                                    sit amet, consectetuer elit.</p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                    class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading red darken-1">99% Server load</h6>
                                                <p class="notification-text font-small-3 text-muted">Aliquam tincidunt
                                                    mauris eu risus.</p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">Five hour ago</time>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                    class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                                                <p class="notification-text font-small-3 text-muted">Vestibulum auctor
                                                    dapibus neque.</p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">Today</time>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                    class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Complete the task</h6>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">Last week</time>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                    class="ft-file icon-bg-circle bg-teal"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Generate monthly report</h6>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">Last month</time>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                        href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li>
                        {{-- end of dropdown notification --}}
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
                <li class=" @if (Route::currentRouteName() == 'DM_Home') active @endif">
                    <a href="{{ route('DM_Home') }}"><i class="la la-home"></i><span class="menu-title"
                            data-i18n="nav.dash.main">{{ __('delivery.Dashboard') }}</span></a>
                </li>
                {{-- Delivery manager profile --}}
                <li class=" @if (Route::currentRouteName() == 'DM_Profile') active @endif">
                    <a href="{{ route('DM_Profile') }}"><i class="la la-user"></i><span class="menu-title"
                            data-i18n="nav.dash.main">{{ __('delivery.Delivery-profile') }}</span></a>
                </li>
                {{-- Customer requests --}}
                <li class="navigation-header">
                    <span data-i18n="nav.category.Customer_orders">{{ __('delivery.Customer-orders') }}</span><i
                        class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right"
                        data-original-title="Customer_orders"></i>
                </li>
                {{-- Orders --}}
                <li class=" nav-item"><a href="#"><i class="ft-shopping-cart"></i><span class="menu-title"
                            data-i18n="nav.orders.main">{{ __('delivery.orders') }}</span></a>
                    <ul class="menu-content">
                        <li class="@if (Route::currentRouteName() == 'DM_orders') active @endif"><a class=" menu-item"
                                href="{{ route('DM_orders') }}" data-i18n="nav.orders.list">
                                {{ __('delivery.orders-list') }}</a>
                        </li>
                        <li class="@if (Route::currentRouteName() == 'DM_orders_history') active @endif"><a class="menu-item"
                                href="{{ route('DM_orders_history') }}"
                                data-i18n="nav.order.history">{{ __('delivery.orders-history') }}</a>
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
    @include('includes.appJS')
</body>

</html>
