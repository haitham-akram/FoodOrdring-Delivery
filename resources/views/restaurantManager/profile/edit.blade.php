@extends('layouts.restaurantManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.Edit-profile') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('RM_Home') }}">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">{{ __('restaurantManager.Edit-profile') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- profileinfo-->
                <div class="row">
                    <div id="recent-transactions" class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class=""><i
                                        class="la la-user font-medium-5"></i>{{ __('delivery.deliviry-managers-info') }}
                                </h3>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form">
                                        <div class="form-body">
                                            <div class="row pl-1 pr-1">
                                                <div class="col-md-6">
                                                    {{-- First Name Field --}}
                                                    <div class="form-group">
                                                        <label
                                                            for="fname">{{ __('restaurantManager.first-name') }}</label>
                                                        <input type="text" id="fname" class="form-control"
                                                            placeholder="{{ __('restaurantManager.first-name') }}"
                                                            name="fname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- Last Name Field --}}
                                                    <div class="form-group">
                                                        <label for="lname">{{ __('restaurantManager.last-name') }}</label>
                                                        <input type="text" id="lname" class="form-control"
                                                            placeholder="{{ __('restaurantManager.last-name') }}"
                                                            name="lname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pl-1 pr-1">
                                                <div class="col-md-12">
                                                    {{-- Email Field --}}
                                                    <div class="form-group">
                                                        <label for="email">{{ __('restaurantManager.email') }}</label>
                                                        <input type="email" id="email" class="form-control"
                                                            placeholder="{{ __('restaurantManager.email') }}"
                                                            name="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pl-1 pr-1">
                                                <div class="col-md-6">
                                                    {{-- Password Field --}}
                                                    <div class="form-group">
                                                        <label
                                                            for="password">{{ __('restaurantManager.password') }}</label>
                                                        <input type="password" id="password" class="form-control"
                                                            placeholder="{{ __('restaurantManager.password') }}"
                                                            name="password">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- comfirm password Field --}}
                                                    <div class="form-group">
                                                        <label
                                                            for="confirm-password">{{ __('restaurantManager.confirm-password') }}</label>
                                                        <input type="password" id="email" class="form-control"
                                                            placeholder="{{ __('restaurantManager.confirm-password') }}"
                                                            name="confirm_password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pl-1 pr-1">
                                                <div class="col-md-6">
                                                    {{-- phone number 1 Field --}}
                                                    <div class="form-group">
                                                        <label
                                                            for="phone1">{{ __('restaurantManager.Phone-Number-1') }}</label>
                                                        <input type="text" id="phone1" class="form-control"
                                                            placeholder="{{ __('restaurantManager.Phone-Number-1') }}"
                                                            name="phone1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- phone number 2 Field --}}
                                                    <div class="form-group">
                                                        <label
                                                            for="phone2">{{ __('restaurantManager.Phone-Number-2') }}</label>
                                                        <input type="text" id="phone2" class="form-control"
                                                            placeholder="{{ __('restaurantManager.Phone-Number-2') }}"
                                                            name="phone2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Add and Cancel button --}}
                                        <div class="form-actions center">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> {{ __('restaurantManager.cancel') }}
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i>
                                                {{ __('restaurantManager.edit') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ profile-->
            </div>
        </div>
    </div>
@endsection
