@extends('layouts.adminLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('admins.send-new-notification') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin_index') }}">{{ __('admins.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin_add_notification') }}">{{ __('admins.send-new-notification') }}</a>
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
                                    <h3 class="form-section"><i class="la la-bell font-large-1"></i>
                                        {{ __('admins.notification-content') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="form-body">
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- Receiver ID Field --}}
                                                        <div class="form-group">
                                                            <label for="ID">{{ __('admins.Receiver-id') }}</label>
                                                            <input type="text" id="Receiver-id" class="form-control"
                                                                placeholder="{{ __('admins.Receiver-id') }}"
                                                                name="receiver_id">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Title field --}}
                                                        <div class="form-group">
                                                            <label for="header">{{ __('admins.header') }}</label>
                                                            <input type="text" id="header" class="form-control"
                                                                placeholder="{{ __('admins.header') }}" name="header">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-12">
                                                        {{-- Description Field --}}
                                                        <fieldset class="form-group">
                                                            <label>{{ __('admins.description') }}</label>
                                                            <textarea class="form-control" id="description" rows="3" name="description"
                                                                placeholder="{{ __('admins.description') }}"></textarea>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                {{-- notification type field --}}
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group">
                                                            <label
                                                                for="notification_type">{{ __('admins.notification-type') }}</label>
                                                            <select class="custom-select" id="customSelect">
                                                                <option selected="" disabled>
                                                                    {{ __('admins.notification-type') }}
                                                                </option>
                                                                <option value="Informing">{{ __('admins.Informing') }}
                                                                </option>
                                                                <option value="Worning">{{ __('admins.Worning') }}
                                                                </option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- Send and Cancel button --}}
                                            <div class="form-actions center">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> {{ __('admins.cancel') }}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>
                                                    {{ __('admins.send-notification') }}
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
