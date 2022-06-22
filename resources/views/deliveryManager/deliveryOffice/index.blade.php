@extends('layouts.deliveryManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- statistic -->
                <div class="row">
                    {{-- orders delivered number --}}
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="info">$748</h3>
                                            <h6>{{ __('delivery.done-orders-number') }}</h6>
                                        </div>
                                        <div>
                                            <i class="ft-check-square info font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 65%"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- orders number --}}
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="danger">99.89 %</h3>
                                            <h6>{{ __('delivery.orders-number') }}</h6>
                                        </div>
                                        <div>
                                            <i class="ft-shopping-cart danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%"
                                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/statistic -->

                <!-- Delivery office info-->
                <div class="row">
                    <div id="recent-transactions" class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('delivery.delivery-info') }}</h3>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a class="btn btn-sm btn-warning box-shadow-2 round btn-min-width pull-right"
                                                href="{{ route('DM_Edit', 1) }}"
                                                target="_blank">{{ __('delivery.edit-info') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="form-body">
                                    <div class="d-flex justify-content-center">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{-- Delivery office logo --}}
                                                    <img src="" alt="">
                                                    <img class="image"
                                                        src="{{ asset('app-assets/images/portrait/small/avatar-s-22.png') }}"
                                                        alt="restaurant logo">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{-- Delivery Office Name --}}
                                                    <h5 for="Delivery Office Name"> {{ __('delivery.Delivery-Name') }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row pt-1 pl-1 pr-1">
                                        <div class="col-md-6">
                                            {{-- street --}}
                                            <div class="form-group">
                                                <h5 for="street">{{ __('delivery.street-name') }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- Governorate --}}
                                            <div class="form-group">
                                                <h5 for="Governorate">{{ __('delivery.Governorate') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row pt-1 pl-1 pr-1">
                                        <div class="col-md-6">
                                            {{-- Neighborhood --}}
                                            <div class="form-group">
                                                <h5 for="Neighborhood">{{ __('delivery.Neighborhood') }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- Navigational-mark --}}
                                            <div class="form-group">
                                                <h5 for="Navigational-mark">
                                                    {{ __('delivery.Navigational-mark') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row p-1">
                                        <div class="col-md-6">
                                            {{-- opening-time --}}
                                            <div class="form-group">
                                                <label for="opening-time">{{ __('delivery.opening-time') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- closing-time --}}
                                            <div class="form-group">
                                                <h5 for="closing-time">{{ __('delivery.closing-time') }}</h5>
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
