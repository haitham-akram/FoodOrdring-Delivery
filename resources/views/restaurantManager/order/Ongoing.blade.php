@extends('layouts.restaurantManagerLayout')
@section('refresh')
    <meta http-equiv="refresh" content="180;url=" {{route('RM_current_orders')}}"/>
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.Ongoing-orders-list') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('RM_Home')}}">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="{{ route('RM_current_orders') }}">{{ __('restaurantManager.Ongoing-orders-list') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-head">
                                <div class="card-header">
                                    <h3 class="form-section"><i class="ft-shopping-cart"></i>
                                        {{ __('restaurantManager.orders') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- start table List  -->
                                    <div class="table-responsive">
                                        <table id="" class="table table-white-space table-bordered row-grouping display no-wrap  table-middle">
                                            <thead>
                                            <tr>
                                                <th class="text-center">{{ __('restaurantManager.order-id') }}
                                                </th>
                                                <th class="text-center">{{ __('restaurantManager.customer-name') }}
                                                </th>
                                                <th class="text-center">{{ __('restaurantManager.meals-list') }}
                                                </th>
                                                <th class="text-center">
                                                    {{ __('restaurantManager.total-price') }}</th>
                                                <th class="text-center">
                                                    {{ __('restaurantManager.order-type') }}</th>
                                                <th class="text-center">
                                                    {{ __('restaurantManager.state') }}</th>
                                                <th class="text-center">
                                                    {{ __('restaurantManager.delivery_name') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($count == 0)
                                                <tr>
                                                    <td class = "text-center" colspan = "7" ><h4>{{ __('admins.No Data') }}</h4></td>
                                                </tr>
                                            @else
                                                @foreach($orders as $order)

                                                    <tr>
                                                        <td class="text-center">
                                                            {{$order->OrderID}}
                                                        </td>
                                                        <td class="text-center">
                                                            {{$order->CustomerName}}
                                                        </td>
                                                        <td class="text-center">
                                                            <table class="table table-white-space table-bordered row-grouping display no-wrap  table-middle">
                                                                <thead>
                                                                <tr>
                                                                    <th class="text-center">{{ __('restaurantManager.meal-id') }}
                                                                    </th>
                                                                    <th class="text-center">{{ __('restaurantManager.meal-name') }}
                                                                    </th>
                                                                    <th class="text-center">{{ __('restaurantManager.price') }}
                                                                    </th>
                                                                    <th class="text-center">
                                                                        {{ __('restaurantManager.count') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @for($i=0; $i<count($order->MealList);$i++)
                                                                    <tr>
                                                                        <td > {{$order->MealList[$i]['ID']}}</td>
                                                                        <td> {{$order->MealList[$i]['Name']}}</td>
                                                                        <td> {{$order->MealList[$i]['Price']}}</td>
                                                                        <td> {{$order->MealList[$i]['Count']}}</td>
                                                                    </tr>
                                                                @endfor
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td class="text-center">
                                                            {{$order->total_price}}
                                                        </td>
                                                        <td class="text-center">
                                                            {{$order->OrderType}}
                                                        </td>
                                                        <td class="text-center">
                                                            {{$order->status}}
                                                        </td>
                                                        <td class="text-center">
                                                            {{$order->NameOfDeliveryOffice}}
                                                        </td>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- end of the list --}}
                                </div>
                                {{-- end of the card body --}}
                            </div>
                        </div>
                        {{-- end of the card --}}
                    </div>
                    {{-- end of the col --}}
                </section>
            </div>
        </div>
    </div>
@endsection

