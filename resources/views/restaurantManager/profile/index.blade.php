@extends('layouts.restaurantManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.profile') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('RM_Home') }}">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('RM_Profile') }}">{{ __('restaurantManager.profile') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- profile info-->
                <div class="row">
                    <div id="recent-transactions" class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class=""><i
                                        class="la la-user font-medium-5"></i>{{ __('restaurantManager.profile-info') }}
                                </h3>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a class="btn btn-sm btn-warning box-shadow-2 round btn-min-width pull-right"
                                                href="{{ route('RM_Edit_Profile', 1) }}"
                                                target="_blank">{{ __('restaurantManager.Edit-profile') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="form-body">
                                    <div class="row pt-1 pl-3 pr-1">
                                        <div class="col-md-6">
                                            {{-- first-name --}}
                                            <div class="form-group">
                                                <h5 for="fullname">{{ __('restaurantManager.first-name') }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- last-name --}}
                                            <div class="form-group">
                                                <h5 for="office">{{ __('restaurantManager.last-name') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row pt-1 pl-3 pr-1">
                                        <div class="col-md-6">
                                            {{-- Deliviry Office --}}
                                            <div class="form-group">
                                                <h5 for="office">{{ __('restaurantManager.restaurant-Owner') }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- Email --}}
                                            <div class="form-group">
                                                <h5 for="email">{{ __('restaurantManager.email') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row p-1 pl-3 ">
                                        <div class="col-md-6">
                                            {{-- Phone Number 1 --}}
                                            <div class="form-group">
                                                <label
                                                    for="opening-time">{{ __('restaurantManager.Phone-Number-1') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- Phone Number 2 --}}
                                            <div class="form-group">
                                                <h5 for="closing-time">{{ __('restaurantManager.Phone-Number-2') }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ profile -->
            </div>
        </div>
    </div>
@endsection
