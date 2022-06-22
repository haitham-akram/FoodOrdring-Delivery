@extends('layouts.adminLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('admins.Add-res-manager') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin_index') }}">{{ __('admins.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin_add_res_manager') }}">{{ __('admins.Add-res-manager') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- form start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="form-section"><i class="ft-user"></i>
                                        {{ __('admins.res-info') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="form-body">
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-12">
                                                        {{-- ID Field --}}
                                                        <div class="form-group">
                                                            <label for="ID">{{ __('admins.id') }}</label>
                                                            <input type="text" id="ID" class="form-control"
                                                                placeholder="{{ __('admins.id') }}" name="id">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- First Name Field --}}
                                                        <div class="form-group">
                                                            <label for="fname">{{ __('admins.fname') }}</label>
                                                            <input type="text" id="fname" class="form-control"
                                                                placeholder="{{ __('admins.fname') }}" name="fname">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Last Name Field --}}
                                                        <div class="form-group">
                                                            <label for="lname">{{ __('admins.lname') }}</label>
                                                            <input type="text" id="lname" class="form-control"
                                                                placeholder="{{ __('admins.lname') }}" name="lname">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-12">
                                                        {{-- Email Field --}}
                                                        <div class="form-group">
                                                            <label for="email">{{ __('admins.email') }}</label>
                                                            <input type="email" id="email" class="form-control"
                                                                placeholder="{{ __('admins.email') }}" name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-12">
                                                        {{-- Password Field --}}
                                                        <div class="form-group">
                                                            <label for="password">{{ __('admins.password') }}</label>
                                                            <input type="password" id="password" class="form-control"
                                                                placeholder="{{ __('admins.password') }}"
                                                                name="password">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- phone number 1 Field --}}
                                                        <div class="form-group">
                                                            <label for="phone1">{{ __('admins.phone1') }}</label>
                                                            <input type="text" id="phone1" class="form-control"
                                                                placeholder="{{ __('admins.phone1') }}" name="phone1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- phone number 2 Field --}}
                                                        <div class="form-group">
                                                            <label for="phone2">{{ __('admins.phone2') }}</label>
                                                            <input type="text" id="phone2" class="form-control"
                                                                placeholder="{{ __('admins.phone2') }}" name="phone2">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-12">
                                                        {{-- Restaurant Owner Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="owend-rest">{{ __('admins.restaurant-owner') }}</label>
                                                            <input type="text" id="owend-rest" class="form-control"
                                                                placeholder="{{ __('admins.restaurant-owner') }}"
                                                                name="restaurant_owner">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Add and Cancel button --}}
                                            <div class="form-actions center">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> {{ __('admins.cancel') }}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>
                                                    {{ __('admins.restaurant_managers_add') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- //  Form section end -->
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
