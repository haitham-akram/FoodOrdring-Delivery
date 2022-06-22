@extends('layouts.adminLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('admins.add-new-delivery') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin_index') }}">{{ __('admins.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin_add_delivery') }}">{{ __('admins.add-new-delivery') }}</a>
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
                                    <h3 class="form-section"><i class="la la-truck font-large-1"></i>
                                        {{ __('admins.delivery-info') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="form-body">
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- ID Field --}}
                                                        <div class="form-group">
                                                            <label for="ID">{{ __('admins.id') }}</label>
                                                            <input type="text" id="ID" class="form-control"
                                                                placeholder="{{ __('admins.id') }}" name="id">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- delivery Name Field --}}
                                                        <div class="form-group">
                                                            <label for="name">{{ __('admins.delivery-name') }}</label>
                                                            <input type="text" id="name" class="form-control"
                                                                placeholder="{{ __('admins.delivery-name') }}"
                                                                name="name">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- street name Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="street-name">{{ __('admins.street-name') }}</label>
                                                            <input type="text" id="street-name" class="form-control"
                                                                placeholder="{{ __('admins.street-name') }}"
                                                                name="street_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Governorate Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="Governorate">{{ __('admins.Governorate') }}</label>
                                                            <input type="text" id="Governorate" class="form-control"
                                                                placeholder="{{ __('admins.Governorate') }}"
                                                                name="governorate">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- Neighborhood Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="Neighborhood">{{ __('admins.Neighborhood') }}</label>
                                                            <input type="text" id="Neighborhood" class="form-control"
                                                                placeholder="{{ __('admins.Neighborhood') }}"
                                                                name="neighborhood">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Navigational-mark Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="Navigational-mark">{{ __('admins.Navigational-mark') }}</label>
                                                            <input type="text" id="Navigational-mark" class="form-control"
                                                                placeholder="{{ __('admins.Navigational-mark') }}"
                                                                name="navigational_mark">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- opening time Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="opening-time">{{ __('admins.opening-time') }}</label>
                                                            <input type="time" id="opening-time" class="form-control"
                                                                placeholder="{{ __('admins.opening-time') }}"
                                                                name="opening_time" value="09:00:00">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- closing time Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="closing-time">{{ __('admins.closing-time') }}</label>
                                                            <input type="time" id="closing-time" class="form-control"
                                                                placeholder="{{ __('admins.closing-time') }}"
                                                                name="closing_time" value="00:00:00">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">

                                                    <div class="col-md-12">
                                                        {{-- logo Field --}}
                                                        <label for="closing-time">{{ __('admins.logo') }}</label>
                                                        <fieldset class="form-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="logo"
                                                                    name="logo">
                                                                <label class="custom-file-label"
                                                                    for="inputGroupFile01">{{ __('admins.choose-logo') }}</label>
                                                            </div>
                                                        </fieldset>
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
                                                    {{ __('admins.add-delivery') }}
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
