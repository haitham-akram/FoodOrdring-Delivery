<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="keywords" content="admin dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('auth.login') }}</title>
    @if (App::getLocale() == 'en')
        @include('includes.LTRStyle')
    @else
        @include('includes.RTLStyle')
    @endif

</head>

<body class="vertical-layout 1-column blank-page blank-page pace-done menu-hide vertical-overlay-menu" data-open="click"
    data-menu="vertical-menu-modern" data-col="1-column">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="{{ asset('app-assets/images/logo/80.80.png') }}"
                                            alt="branding logo">
                                        <h4 for="">{{ __('auth.brand') }}</h4>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>{{ __('auth.login-to') }}</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST" action="{{ url('login') }}">
                                            @csrf
                                            @if (Session::has('error'))
                                                <div class="help-block font-small-3 text-danger mb-2">
                                                    <strong>{{ Session::get('error') }}</strong>
                                                </div>
                                            @endif
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input id="email" type="email"
                                                    class="form-control input-lg @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" placeholder="{{ __('auth.your-email') }}"
                                                    autofocus>
                                                <div class="form-control-position">
                                                    <i class="ft-mail"></i>
                                                </div>
                                            </fieldset>
                                            <div class="help-block font-small-3">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input id="password" type="password"
                                                    class="form-control input-lg @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password"
                                                    placeholder="{{ __('auth.enter-password') }}">
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                            </fieldset>
                                            <div class="help-block font-small-3">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-12 text-center text-md-left">
                                                    <fieldset>
                                                        <input class="chk-remember" type="checkbox" name="remember"
                                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="remember">
                                                            {{ __('auth.remember-me') }}
                                                        </label>
                                                    </fieldset>
                                                </div>
                                                @if (Route::has('password.request'))
                                                    <div class="col-md-6 col-12 text-center text-md-right"> <a
                                                            href="{{ route('password.request') }}"class="card-link">
                                                            {{ __('auth.forgot-passowrd') }}
                                                        </a></div>
                                                @endif
                                            </div>
                                            <button type="submit" class="btn btn-warning bg-lighten-2 btn-block"><i
                                                    class="ft-unlock"></i> {{ __('auth.login') }}</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
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
</body>

</html>
