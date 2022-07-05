@extends('layouts.restaurantManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.orders-history') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="{{ route('RM_orders_history') }}">{{ __('restaurantManager.orders-history') }}</a>
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
                                    <!-- search -->
                                    <div class="row pb-1">
                                        <div class="col-md-2 pb-1">
                                            <form class="form" action="#">
                                                <div class="position-relative">
                                                    <input type="text" id="search" class="form-control"
                                                        name="search-order"
                                                        placeholder="{{ __('restaurantManager.search-order') }}">
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
                                                    <th class="text-center">{{ __('restaurantManager.order-date') }}
                                                    </th>
                                                    <th class="text-center">
                                                        {{ __('restaurantManager.delivery_name') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

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
            $.post('{{ route('RM_search_orders') }}', {
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
                    total_price += parseFloat( res.orders[i].MealList[j]['Price']);
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
                    <td class = "text-center"> `+total_price+`</td>
                    <td class = "text-center"> ` + res.orders[i].OrderType+ `</td>
                    <td class = "text-center"> ` + res.orders[i].Logs + `</td>
                    <td class = "text-center"> ` + res.orders[i].NameOfDeliveryOffice + `</td>
                    </tr>`;
            }
            $('tbody').html(htmlView);
        }
    </script>

@endsection
