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
                                            <h3 class="info">{{$history_count}}</h3>
                                            <h6>{{ __('delivery.done-orders-number') }}</h6>
                                        </div>
                                        <div>
                                            <i class="ft-check-square info font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: {{$history_count}}%"
                                            aria-valuenow="{{$history_count}}" aria-valuemin="0" aria-valuemax="100">
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
                                            <h3 class="danger">{{$orders_count}}</h3>
                                            <h6>{{ __('delivery.orders-number') }}</h6>
                                        </div>
                                        <div>
                                            <i class="ft-shopping-cart danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: {{$orders_count}}%"
                                            aria-valuenow="{{$orders_count}}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                                href="{{ route('DM_Edit', $deliveryOffice->DeliveryOfficeID) }}"
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

                                                    <img class="image mb-2"
                                                        src="{{$deliveryOffice->Logo}}"
                                                        style="min-height: 100px;min-width: 100px; width: 150px; height: 150px "
                                                        alt="Delivery office logo">
                                                    <div class="form-group">
                                                        {{-- Delivery Office Name --}}
                                                        <h5 for="Delivery Office Name"> {{ __('delivery.Delivery-Name') }}: {{$deliveryOffice->NameOfDeliveryOffice}}
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row pt-1 pl-1 pr-1">
                                        <div class="col-md-6">
                                            {{-- street --}}
                                            <div class="form-group">
                                                <h5 for="street">{{ __('delivery.street-name') }}: {{$deliveryOffice->StreetName}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- Governorate --}}
                                            <div class="form-group">
                                                <h5 for="Governorate">{{ __('delivery.Governorate') }}: {{$deliveryOffice->Governorate}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row pt-1 pl-1 pr-1">
                                        <div class="col-md-6">
                                            {{-- Neighborhood --}}
                                            <div class="form-group">
                                                <h5 for="Neighborhood">{{ __('delivery.Neighborhood') }}: {{$deliveryOffice->Neighborhood}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- Navigational-mark --}}
                                            <div class="form-group">
                                                <h5 for="Navigational-mark">
                                                    {{ __('delivery.Navigational-mark') }}: {{$deliveryOffice->NavigationalMark}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row pt-1 pl-1 pr-1 ">
                                        <div class="col-md-6">
                                            {{-- opening-time --}}
                                            <div class="form-group">
                                                <label for="opening-time">{{ __('delivery.opening-time') }}: {{$deliveryOffice->OpiningTime}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- closing-time --}}
                                            <div class="form-group">
                                                <h5 for="closing-time">{{ __('delivery.closing-time') }}: {{$deliveryOffice->ClosingTime}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            {{-- Available Status --}}
                                            <div class="form-group">
                                                <h5 for="Available-status">
                                                    {{ __('admins.Available-status') }}
                                                    @if($deliveryOffice->AvailableStatus =='Open')
                                                        : {{ __('admins.Open') }}
                                                    @elseif($deliveryOffice->AvailableStatus =='Close')
                                                        : {{ __('admins.Close') }}
                                                    @elseif($deliveryOffice->AvailableStatus =='Inmaintenance')
                                                        : {{ __('admins.Inmaintenance') }}
                                                    @endif
                                                </h5>
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
