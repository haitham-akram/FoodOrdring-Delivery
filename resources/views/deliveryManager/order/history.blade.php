@extends('layouts.deliveryManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.orders-list') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="{{ route('DM_orders') }}">{{ __('restaurantManager.orders-list') }}</a>
                                </li>
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
                                        {{ __('delivery.orders') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- search -->
                                    <div class="row pb-1">
                                        <div class="col-md-2 pb-1">
                                            <form class="form" action="#">
                                                <div class="position-relative">
                                                    <input type="search" id="search-order" class="form-control"
                                                        name="search-order"
                                                        placeholder="{{ __('delivery.search-order') }}">
                                                    <div class="form-control-position">
                                                        <i class="la la-search text-size-base text-muted"></i>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- start table List  -->
                                    <div class="table-responsive">
                                        <table id=""
                                            class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">{{ __('delivery.order-id') }}
                                                    </th>
                                                    <th class="text-center">{{ __('delivery.restaurant') }}
                                                    </th>
                                                    <th class="text-center">{{ __('delivery.customer-name') }}
                                                    </th>
                                                    <th class="text-center">{{ __('delivery.meals-list') }}
                                                    </th>
                                                    </th>
                                                    <th class="text-center">
                                                        {{ __('delivery.total-price') }}</th>
                                                    <th class="text-center">{{ __('delivery.location') }}
                                                    </th>
                                                    <th class="text-center">{{ __('delivery.order-date') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">
                                                        order-id
                                                    </td>
                                                    <td class="text-center">
                                                        restaurant
                                                    </td>
                                                    <td class="text-center">
                                                        customer-name
                                                    </td>
                                                    <td class="text-center">
                                                        meals-list
                                                    </td>
                                                    <td class="text-center">
                                                        total-price
                                                    </td>
                                                    <td class="text-center">
                                                        location
                                                    </td>
                                                    <td class="text-center">
                                                        date
                                                    </td>
                                                </tr>
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
