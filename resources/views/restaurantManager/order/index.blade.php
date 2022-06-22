@extends('layouts.restaurantManagerLayout')
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
                                        href="{{ route('RM_orders') }}">{{ __('restaurantManager.orders-list') }}</a>
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
                                                <tr>
                                                    <td class="text-center">
                                                        order-id
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
                                                        order-type
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="dropdown">
                                                            <button id="SearchDrop2" type="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="true"
                                                                class="btn btn-warning dropdown-toggle  dropdown-menu-right "><i
                                                                    class="ft-settings"></i></button>
                                                            <span aria-labelledby="SearchDrop2"
                                                                class="dropdown-menu mt-1 dropdown-menu-left">
                                                                <a class="dropdown-item primary" data-toggle="modal"
                                                                    data-target="#choose_delivery"><i
                                                                        class="ft-plus primary"></i>
                                                                    {{ __('restaurantManager.take-order') }}</a>
                                                                <a href="#" class="dropdown-item danger"><i
                                                                        class="ft-x danger"></i>
                                                                    {{ __('restaurantManager.reject-order') }}</a>
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
                                                                <form action="#" method="POST">
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
                                                                                id="responsive_single">
                                                                                <option selected disabled value="">
                                                                                    {{ __('restaurantManager.choose-delivery') }}
                                                                                </option>
                                                                                <option value="">hamama</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn grey btn-outline-secondary"
                                                                            data-dismiss="modal">{{ __('restaurantManager.close') }}</button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-primary">{{ __('restaurantManager.choose') }}
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end choose_delivery modal --}}
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
