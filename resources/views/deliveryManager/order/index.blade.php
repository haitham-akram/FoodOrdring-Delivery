@extends('layouts.deliveryManagerLayout')
@section('refresh')
    <meta http-equiv="refresh" content="180;url=" {{route('DM_orders')}}"/>
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('delivery.orders-list') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('DM_Home')}}">{{ __('delivery.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="{{ route('DM_orders') }}">{{ __('delivery.orders-list') }}</a>
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
                                        <table id=""
                                            class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">{{ __('delivery.order-id') }}</th>
                                                    <th class="text-center">{{ __('delivery.restaurant') }}</th>
                                                    <th class="text-center">{{ __('delivery.customer-name') }}</th>
                                                    <th class="text-center">{{ __('delivery.meals-list') }}</th>
                                                    <th class="text-center">{{ __('delivery.total-price') }}</th>
                                                    <th class="text-center">{{ __('delivery.location') }}</th>
                                                    <th class="text-center">{{ __('delivery.status') }}</th>
                                                    <th class="text-center">{{ __('delivery.actions') }}</th>
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
                                                        {{$order->RestaurantName}}
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
                                                        {{$order->Governorate}}, {{$order->Neighborhood}}, {{$order->HouseNumber}}, {{$order->NavigationalMark}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{$order->Status}}
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="dropdown">
                                                            <button id="SearchDrop2" type="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="true"
                                                                    class="btn btn-warning dropdown-toggle  dropdown-menu-right "><i
                                                                    class="ft-settings"></i></button>
                                                            <span aria-labelledby="SearchDrop2"
                                                                  class="dropdown-menu mt-1 dropdown-menu-left">
                                                                <a class="dropdown-item primary"
                                                                   href="{{route('RM_delivering_order',$order->OrderID)}}"
                                                                   onclick="event.preventDefault();
                                                                    document.getElementById('delivering-order-form').submit();">
                                                                     <i class="ft-check primary"></i>
                                                                    {{ __('delivery.order_delivering') }}</a>
                                                                  <form id="delivering-order-form" action="{{ route('RM_delivering_order',$order->OrderID)}}" method="POST" class="d-none">@csrf</form>
                                                            </span>
                                                        </span>
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
@section('search js')

    @if (Session::has('delivering_order_msg'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('delivering_order_msg') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 4000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('delivering_order_msg') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 4000
                });
            </script>
        @endif
    @endif
@endsection
