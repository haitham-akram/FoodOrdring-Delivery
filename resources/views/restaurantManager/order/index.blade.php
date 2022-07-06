@extends('layouts.restaurantManagerLayout')
@section('refresh')
    <meta http-equiv="refresh" content="180;url=" {{route('RM_orders')}}"/>
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.orders-list') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('RM_Home')}}">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="{{ route('RM_orders') }}">{{ __('restaurantManager.orders-list') }}</a>
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
                                    <p>{{__('restaurantManager.explain')}} </p>
                                    <ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="active-tab32" data-toggle="tab" href="#new" aria-controls="active32"
                                               aria-expanded="true">{{__('restaurantManager.new')}}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="link-tab32" data-toggle="tab" href="#preparation" aria-controls="link32"
                                               aria-expanded="false">{{__('restaurantManager.in-preparation')}}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="linkOpt-tab2" data-toggle="tab" href="#ready" aria-controls="linkOpt2">{{__('restaurantManager.ready')}}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="linkOpt-tab2" data-toggle="tab" href="#delivering" aria-controls="linkOpt2">{{__('restaurantManager.delivering')}}</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content px-1 pt-1">
{{--                                        new orders tab--}}
                                        <div role="tabpanel" class="tab-pane active" id="new" aria-labelledby="new" aria-expanded="true">
                                            <!-- start new orders table   -->
                                            <div class="table-responsive">
                                                <table id=""
                                                       class="table table-white-space table-bordered row-grouping display no-wrap  table-middle">
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
                                                        <th class="text-center">{{ __('restaurantManager.actions') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($count == 0)
                                                        <tr>
                                                            <td class = "text-center" colspan = "6" ><h4>{{ __('admins.No Data') }}</h4></td>
                                                        </tr>
                                                    @else
                                                        @foreach($orders as $order)
                                                            @if($order->status == 'Not arrived')
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
                                                            <span class="dropdown">
                                                            <button id="SearchDrop2" type="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="true"
                                                                    class="btn btn-warning dropdown-toggle  dropdown-menu-right "><i
                                                                    class="ft-settings"></i></button>
                                                                <span aria-labelledby="SearchDrop2"
                                                                  class="dropdown-menu mt-1 dropdown-menu-left">
                                                                <a class="dropdown-item primary" href="{{route('RM_Prepare_order',$order->OrderID)}}"  onclick="event.preventDefault();
                                                                    document.getElementById('Prepare-order-form').submit();">
                                                                     <i class="ft-plus primary"></i>
                                                                    {{ __('restaurantManager.take-order') }}</a>
                                                                    <form id="Prepare-order-form" action="{{ route('RM_Prepare_order',$order->OrderID)}}" method="POST" class="d-none">@csrf</form>
                                                                </span>
                                                            </span>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{-- end of new orders table --}}

                                        </div>
                                        <div class="tab-pane" id="preparation" role="tabpanel" aria-labelledby="preparation" aria-expanded="false">
                                            <!-- start preparation orders table   -->
                                            <div class="table-responsive">
                                                <table id=""
                                                       class="table table-white-space table-bordered row-grouping display no-wrap  table-middle">
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

                                                        <th class="text-center">{{ __('restaurantManager.actions') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($count == 0)
                                                        <tr>
                                                            <td class = "text-center" colspan = "6" ><h4>{{ __('admins.No Data') }}</h4></td>
                                                        </tr>
                                                    @else
                                                        @foreach($orders as $order)
                                                            @if($order->status == 'In preparation')
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
                                                                                    <td> {{$order->MealList[$i]['ID']}}</td>
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
                                                            <span class="dropdown">
                                                            <button id="SearchDrop2" type="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="true"
                                                                    class="btn btn-warning dropdown-toggle  dropdown-menu-right "><i
                                                                    class="ft-settings"></i></button>
                                                            <span aria-labelledby="SearchDrop2"
                                                                  class="dropdown-menu mt-1 dropdown-menu-left">
                                                                <a class="dropdown-item primary" href="{{route('RM_Ready_order',$order->OrderID)}}"  onclick="event.preventDefault();
                                                                    document.getElementById('Prepare-order-form').submit();">
                                                                     <i class="ft-plus primary"></i>
                                                                    {{ __('restaurantManager.prepare_order') }}</a>
                                                                    <form id="Prepare-order-form" action="{{ route('RM_Ready_order',$order->OrderID)}}" method="POST" class="d-none">@csrf</form>
                                                                </span>
                                                            </span>
                                                                    </td>
                                                                </tr>

                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{-- end of preparation orders table --}}
                                        </div>
                                        <div class="tab-pane" id="ready" role="tabpanel" aria-labelledby="linkOpt-tab2"
                                             aria-expanded="false">
                                            <!-- start ready orders table   -->
                                            <div class="table-responsive">
                                                <table id=""
                                                       class="table table-white-space table-bordered row-grouping display no-wrap  table-middle">
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
                                                        <th class="text-center">{{ __('restaurantManager.actions') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($count == 0)
                                                        <tr>
                                                            <td class = "text-center" colspan = "6" ><h4>{{ __('admins.No Data') }}</h4></td>
                                                        </tr>
                                                    @else
                                                        @foreach($orders as $order)
                                                            @if($order->status == 'Ready')
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
                                                                <td class="text-center">
                                                        <span class="dropdown">
                                                            <button id="SearchDrop2" type="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="true"
                                                                    class="btn btn-warning dropdown-toggle  dropdown-menu-right "><i
                                                                    class="ft-settings"></i></button>
                                                            <span aria-labelledby="SearchDrop2"
                                                                  class="dropdown-menu mt-1 dropdown-menu-left">
                                                                <a class="dropdown-item primary"
                                                                   @if($order->OrderType == 'Receipt')
                                                                       href="{{route('RM_take_order',$order->OrderID)}}"  onclick="event.preventDefault();
                                                                    document.getElementById('take-order-form').submit();">
                                                                     <i class="ft-plus primary"></i>
                                                                    {{ __('restaurantManager.take-reservation') }}</a>
                                                                    <form id="take-order-form" action="{{ route('RM_take_order',$order->OrderID)}}" method="POST" class="d-none">@csrf</form>
                                                                    @else
                                                                    data-toggle="modal" data-target="#choose_delivery">
                                                                    <i class="ft-plus primary"></i>{{ __('restaurantManager.take-order') }}</a>
                                                                @endif
                                                            </span>
                                                        </span>
                                                                </td>
                                                                {{-- start choose_delivery modal --}}
                                                                <div class="modal fade text-left" id="choose_delivery" tabindex="-1"
                                                                     role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true"
                                                                     data-backdrop="false" outsidedata-backdrop="false">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-primary white">
                                                                                <h4 class="modal-title white" id="myModalLabel12">
                                                                                    {{ __('restaurantManager.choose-delivery') }}
                                                                                </h4>
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <form action="{{route('RM_take_order',$order->OrderID)}}" method="POST">
                                                                                @csrf
                                                                                <div class="modal-body">
                                                                                    <h5><i class="la la-arrow-right"></i>
                                                                                        {{ __('restaurantManager.choose-delivery-header') }}
                                                                                    </h5>
                                                                                    <hr>
                                                                                    <label>
                                                                                        {{ __('restaurantManager.delivery-offices-available') }}
                                                                                    </label>
                                                                                    <div class="form-group">
                                                                                        <select class="select2 form-control block"
                                                                                                id="deliveryOffice_id" name="deliveryOffice_id">

                                                                                            @foreach($deliveryOffices as $deliveryOffice)
                                                                                                <option value="{{$deliveryOffice->DeliveryOfficeID}}">{{$deliveryOffice->NameOfDeliveryOffice}}</option>
                                                                                            @endforeach

                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                            class="btn grey btn-outline-secondary"
                                                                                            data-dismiss="modal">{{ __('restaurantManager.close') }}</button>
                                                                                    <button type="submit"
                                                                                            class="btn btn-outline-primary">{{ __('restaurantManager.choose') }}
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- end choose_delivery modal --}}
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{-- end of ready orders table --}}
                                        </div>
                                        <div class="tab-pane" id="delivering" role="tabpanel" aria-labelledby="linkOpt-tab2"
                                             aria-expanded="false">
                                            <!-- start the on delivering table   -->
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
{{--                                                        <th class="text-center">--}}
{{--                                                            {{ __('restaurantManager.state') }}</th>--}}
                                                        <th class="text-center">
                                                            {{ __('restaurantManager.delivery_name') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($delivering_order_count == 0)
                                                        <tr>
                                                            <td class = "text-center" colspan = "6" ><h4>{{ __('admins.No Data') }}</h4></td>
                                                        </tr>
                                                    @else
                                                        @foreach($delivering_orders as $order)

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
{{--                                                                <td class="text-center">--}}
{{--                                                                    {{$order->status}}--}}
{{--                                                                </td>--}}
                                                                <td class="text-center">
                                                                    {{$order->NameOfDeliveryOffice}}
                                                                </td>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{-- end of the on delivering table --}}
                                        </div>
                                    </div>



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
    @if (Session::has('take_order_msg'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('take_order_msg') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('take_order_msg') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif

    @if (Session::has('order_Booked_msg'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.info('{{ Session::get('order_Booked_msg') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.info('{{ Session::get('order_Booked_msg') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif

    @if (Session::has('order_Prepare_msg'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.info('{{ Session::get('order_Prepare_msg') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.info('{{ Session::get('order_Prepare_msg') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif

    @if (Session::has('order_Ready_msg'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.info('{{ Session::get('order_Ready_msg') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.info('{{ Session::get('order_Ready_msg') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
    @if (Session::has('order_Delivering_msg'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.info('{{ Session::get('order_Delivering_msg') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.info('{{ Session::get('order_Delivering_msg') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif

@endsection
