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
                                <li class="breadcrumb-item"><a href="{{route('DM_Home')}}">{{ __('restaurantManager.home') }}</a>
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
                                                    <input type="text" id="search" class="form-control"
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
@section('search js')
    <script>
        $('#search').on('keyup', function() {
            search();
        });
        search();
        function search() {
            var keyword = $('#search').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('{{ route('DM_search_orders') }}', {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    keyword: keyword
                },
                function(data) {
                    table_post_row(data);
                });
        }

        // table row with ajax
        function table_post_row(res) {
            let htmlView = '';
            if (res.orders.length <= 0) {
                htmlView += `<tr>
                <td class = "text-center" colspan = "7" ><h4>{{ __('admins.No Data') }}</h4></td>
                    </tr>`;
            }
            let total_price = 0.0;
            for (let i = 0; i < res.orders.length; i++) {
                let mealList = "";
                for (let j=0; j < res.orders[i].MealList.length; j++){
                    mealList +=`
                        <tr>
                        <td>`+res.orders[i].MealList[j]['ID']+`</td>
                        <td>`+res.orders[i].MealList[j]['Name']+`</td>
                        <td>`+res.orders[i].MealList[j]['Price']+`</td>
                        <td>`+res.orders[i].MealList[j]['Count']+`</td>
                        </tr>`
                }
                htmlView += `<tr>
                    <td class = "text-center"> ` + res.orders[i].OrderID + ` </td>
                     <td class = "text-center"> ` + res.orders[i].RestaurantName + ` </td>
                    <td class = "text-center"> ` + res.orders[i].CustomerName + ` </td>
                    <td class = "text-center">
                              <table class="table table-white-space table-bordered row-grouping display no-wrap  table-middle">
                              <thead>
                                  <tr>
                                  <th class="text-center">{{ __('restaurantManager.meal-id') }}</th>
                                  <th class="text-center">{{ __('restaurantManager.meal-name') }}</th>
                                  <th class="text-center">{{ __('restaurantManager.price') }}</th>
                                  <th class="text-center">{{ __('restaurantManager.count') }}</th>
                                  </tr>
                              </thead>
                              <tbody>
                               `+mealList+`
                              </tbody>
                              </table>
                    </td>
                    <td class = "text-center"> `+res.orders[i].total_price+`</td>
                    <td class = "text-center"> ` + res.orders[i].Governorate+ ` ,`+res.orders[i].Neighborhood +` ,`+res.orders[i].HouseNumber +` ,`+res.orders[i].NavigationalMark+`</td>
                    <td class = "text-center"> ` + res.orders[i].Logs + `</td>
                    </tr>`;
            }
            $('tbody').html(htmlView);
        }
    </script>

@endsection
