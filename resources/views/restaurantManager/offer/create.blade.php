@extends('layouts.restaurantManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.add-new-offer') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('RM_add_offer') }}">{{ __('restaurantManager.add-new-offer') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- form start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="form-section"><i class="la la-tag font-large-1"></i>
                                        {{ __('restaurantManager.offer-info') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="form-body">
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- meal ID Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="meal-id">{{ __('restaurantManager.meal-id') }}</label>
                                                            <input type="text" id="meal-id" class="form-control"
                                                                placeholder="{{ __('restaurantManager.meal-id') }}"
                                                                name="meal_id">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- category id field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="header">{{ __('restaurantManager.category-id') }}</label>
                                                            <input type="text" id="header" class="form-control"
                                                                placeholder="{{ __('restaurantManager.category-id') }}"
                                                                name="category_id">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- Start date Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="header">{{ __('restaurantManager.date-start') }}</label>
                                                            <input type="date" id="start_date" class="form-control"
                                                                name="start_date" data-toggle="tooltip" data-trigger="hover"
                                                                data-placement="top"
                                                                data-title="{{ __('restaurantManager.date-start') }}"
                                                                data-original-title="" title=""
                                                                aria-describedby="tooltip304834">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- End date Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="header">{{ __('restaurantManager.date-end') }}</label>
                                                            <input type="date" id="start_date" class="form-control"
                                                                name="end_date" data-toggle="tooltip" data-trigger="hover"
                                                                data-placement="top"
                                                                data-title="{{ __('restaurantManager.date-end') }}"
                                                                data-original-title="" title=""
                                                                aria-describedby="tooltip304834">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-12">
                                                        {{-- Discount field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="meal-id">{{ __('restaurantManager.discount-precentage') }}</label>
                                                            <input type="text" id="discount-precentage"
                                                                class="form-control"
                                                                placeholder="{{ __('restaurantManager.discount-precentage') }}"
                                                                name="discount_precentage">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Add and Cancel button --}}
                                            <div class="form-actions center">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> {{ __('restaurantManager.cancel') }}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>
                                                    {{ __('restaurantManager.add-offer') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- //  Form section end -->
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
