@extends('layouts.deliveryManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('delivery.Delivery-profile') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('DM_Home') }}">{{ __('delivery.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">{{ __('delivery.Delivery-profile') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Delivery office info-->
                <div class="row">
                    <div id="recent-transactions" class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class=""><i
                                        class="la la-user font-medium-5"></i>{{ __('delivery.deliviry-managers-info') }}
                                </h3>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a class="btn btn-sm btn-warning box-shadow-2 round btn-min-width pull-right"
                                                href="{{ route('DM_Edit_Profile', 1) }}"
                                                target="_blank">{{ __('delivery.Edit-profile') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="form-body">
                                    <div class="row pt-1 pl-3 pr-1">
                                        <div class="col-md-6">
                                            {{-- first-name --}}
                                            <div class="form-group">
                                                <h5 for="fullname">{{ __('delivery.first-name') }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- last-name --}}
                                            <div class="form-group">
                                                <h5 for="office">{{ __('delivery.last-name') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row pt-1 pl-3 pr-1">
                                        <div class="col-md-6">
                                            {{-- Deliviry Office --}}
                                            <div class="form-group">
                                                <h5 for="office">{{ __('delivery.Deliviry-Office-Owner') }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- Email --}}
                                            <div class="form-group">
                                                <h5 for="email">{{ __('delivery.email') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row p-1 pl-3 ">
                                        <div class="col-md-6">
                                            {{-- Phone Number 1 --}}
                                            <div class="form-group">
                                                <label for="opening-time">{{ __('delivery.Phone-Number-1') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- Phone Number 2 --}}
                                            <div class="form-group">
                                                <h5 for="closing-time">{{ __('delivery.Phone-Number-2') }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ New Customers -->
            </div>
        </div>
    </div>
@endsection
