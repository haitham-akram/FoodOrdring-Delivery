@extends('layouts.restaurantManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- statistic -->
                <div class="row">
                    {{-- category number --}}
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="warning">{{$categories_count}}</h3>
                                            <h6>{{ __('restaurantManager.category-number') }}</h6>
                                        </div>
                                        <div>
                                            <i class="la la-th-list warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-warning" role="progressbar"
                                            style="width:{{$categories_count}}%" aria-valuenow="{{$categories_count}}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- meals number --}}
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="info">{{$meal_count}}</h3>
                                            <h6>{{ __('restaurantManager.meal-number') }}</h6>
                                        </div>
                                        <div>
                                            <i class="la la-cutlery info font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: {{$meal_count}}%"
                                            aria-valuenow="{{$meal_count}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- offer number --}}
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success">{{$offers_count}}</h3>
                                            <h6>{{ __('restaurantManager.offer-number') }}</h6>
                                        </div>
                                        <div>
                                            <i class="la la-tags success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                            style="width: {{$offers_count}}%" aria-valuenow="{{$offers_count}}" aria-valuemin="0" aria-valuemax="100">
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
                                            <h6>{{ __('restaurantManager.orders-number') }}</h6>
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

                <!-- Restaurant info-->
                <div class="row">
                    <div id="recent-transactions" class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('restaurantManager.restaurant-info') }}</h3>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a class="btn btn-sm btn-warning box-shadow-2 round btn-min-width pull-right"
                                                href="{{ route('RM_Edit', $restaurant->RestaurantID) }}"
                                                target="_blank">{{ __('restaurantManager.edit-info') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="form-body">
                                    <div class="d-flex justify-content-center">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{-- restaurant logo --}}
                                                    <img class="image mb-2"
                                                        src="{{ $restaurant->Logo}}"
                                                        alt="restaurant logo" style="min-height: 100px;min-width: 100px; width: 150px; height: 150px ">
                                                    {{-- resturant name --}}
                                                    <h5 for="restaurant-name"> {{ __('restaurantManager.Restaurant-name') }}{{$restaurant->RestaurantName}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row pt-1 pl-2 pr-1">
                                        <div class="col-md-6">
                                            {{-- street --}}
                                            <div class="form-group">
                                                <h5 for="street">{{ __('restaurantManager.street-name') }}{{$restaurant->StreetName}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- Governorate --}}
                                            <div class="form-group">
                                                <h5 for="Governorate">{{ __('restaurantManager.Governorate') }}{{$restaurant->Governorate}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row pt-1 pl-2 pr-1">
                                        <div class="col-md-6">
                                            {{-- Neighborhood --}}
                                            <div class="form-group">
                                                <h5 for="Neighborhood">{{ __('restaurantManager.Neighborhood') }}{{$restaurant->Neighborhood}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- Navigational-mark --}}
                                            <div class="form-group">
                                                <h5 for="Navigational-mark">
                                                    {{ __('restaurantManager.Navigational-mark') }}{{$restaurant->NavigationalMark}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row pt-1 pl-2 pr-1">
                                        <div class="col-md-6">
                                            {{-- restaurant category  --}}
                                            <div class="form-group">
                                                <h5 for="category">{{ __('admins.category') }}
                                                    @foreach ($categories as $category)
                                                    @if($category->CategorytypeID == $restaurant->CategoriesID): {{ $category->CategoryName }} @endif</option>
                                                    @endforeach</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- Available Status --}}
                                            <div class="form-group">
                                                <h5 for="Available-status">
                                                    {{ __('admins.Available-status') }}
                                                    @if($restaurant->AvailableStatus =='Open')
                                                        : {{ __('admins.Open') }}
                                                    @elseif($restaurant->AvailableStatus =='Close')
                                                        : {{ __('admins.Close') }}
                                                    @elseif($restaurant->AvailableStatus =='Inmaintenance')
                                                        : {{ __('admins.Inmaintenance') }}
                                                    @endif
                                                  </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            {{-- opening-time --}}
                                            <div class="form-group">
                                                <label
                                                    for="opening-time">{{ __('restaurantManager.opening-time') }}{{$restaurant->OpiningTime}}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- closing-time --}}
                                            <div class="form-group">
                                                <h5 for="closing-time">{{ __('restaurantManager.closing-time') }}{{$restaurant->ClosingTime}}</h5>
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
