@extends('layouts.restaurantManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.edit-meal') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin_index') }}">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">{{ __('restaurantManager.edit-meal') }}</a>
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
                                    <h3 class="form-section"><i class="la la-cutlery font-large-1"></i>
                                        {{ __('restaurantManager.meal-info') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="form-body">
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- meal name Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="name">{{ __('restaurantManager.meal-name') }}</label>
                                                            <input type="text" id="name" class="form-control"
                                                                placeholder="{{ __('restaurantManager.meal-name') }}"
                                                                name="name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- menu id Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="meun_id">{{ __('restaurantManager.meun-id') }}</label>
                                                            <input type="text" id="meun_id" class="form-control"
                                                                placeholder="{{ __('restaurantManager.meun-id') }}"
                                                                name="meun_id">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- price Field --}}
                                                        <div class="form-group">
                                                            <label for="price">{{ __('restaurantManager.price') }}</label>
                                                            <input type="text" id="price" class="form-control"
                                                                placeholder="{{ __('restaurantManager.price') }}"
                                                                name="price">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Offer ID  Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="offer">{{ __('restaurantManager.offer') }}</label>
                                                            <input type="text" id="offer" class="form-control"
                                                                placeholder="{{ __('restaurantManager.offer') }}"
                                                                name="offer">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- estimate-finish-time Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="estimate-finish-time">{{ __('restaurantManager.estimate-finish-time') }}</label>
                                                            <input type="text" id="estimate-finish-time"
                                                                class="form-control"
                                                                placeholder="{{ __('restaurantManager.estimate-finish-time') }}"
                                                                name="estimate-finish-time">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- ability-to-order Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="ability-to-order">{{ __('restaurantManager.ability-to-order') }}</label>
                                                            <input type="text" id="ability-to-order" class="form-control"
                                                                placeholder="{{ __('restaurantManager.ability-to-order') }}"
                                                                name="ability-to-order">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- ingredients Field --}}
                                                        <fieldset class="form-group">
                                                            <label>{{ __('restaurantManager.ingredients') }}</label>
                                                            <textarea class="form-control" id="ingredients" rows="3" name="ingredients"
                                                                placeholder="{{ __('restaurantManager.ingredients') }}"></textarea>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Description Field --}}
                                                        <fieldset class="form-group">
                                                            <label>{{ __('restaurantManager.description') }}</label>
                                                            <textarea class="form-control" id="description" rows="3" name="description"
                                                                placeholder="{{ __('restaurantManager.description') }}"></textarea>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">

                                                    <div class="col-md-6">
                                                        {{-- pic Field --}}
                                                        <label for="photo">{{ __('restaurantManager.photo') }}</label>
                                                        <fieldset class="form-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="photo"
                                                                    name="photo">
                                                                <label class="custom-file-label"
                                                                    for="inputGroupFile01">{{ __('restaurantManager.choose-photo') }}</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="rate">{{ __('restaurantManager.rate') }}</label>
                                                            <input type="text" id="rate" class="form-control"
                                                                placeholder="{{ __('restaurantManager.rate') }}"
                                                                name="rate">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- Edit and Cancel button --}}
                                            <div class="form-actions center">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> {{ __('restaurantManager.cancel') }}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>
                                                    {{ __('restaurantManager.edit') }}
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
