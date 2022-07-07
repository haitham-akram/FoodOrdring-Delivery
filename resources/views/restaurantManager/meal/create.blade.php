@extends('layouts.restaurantManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.add-new-meal') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin_index') }}">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('RM_create_meal') }}">{{ __('restaurantManager.add-new-meal') }}</a>
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
                                        <form class="form" method="Post" action="{{route('RM_store_meal')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- meal name Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="MealName">{{ __('restaurantManager.meal-name') }}</label>
                                                            <input type="text" id="MealName" class="form-control"
                                                                placeholder="{{ __('restaurantManager.meal-name') }}"
                                                                name="MealName">
                                                            @error('MealName')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- menu id Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="MenuID">{{ __('restaurantManager.category-name') }}</label>
                                                            <fieldset class="form-group">
                                                                <select class="form-control" name="MenuID" id="MenuID">
                                                                    <option disabled selected value="">
                                                                        {{ __('restaurantManager.category-name') }}</option>
                                                                    @foreach ($menus as $menu)
                                                                        <option value="{{ $menu->MenuID }}">
                                                                            {{ $menu->CategoryType }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('MenuID')
                                                                <small
                                                                    class="form-text text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- price Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="Price">{{ __('restaurantManager.price') }}</label>
                                                            <input type="text" id="Price" class="form-control"
                                                                placeholder="{{ __('restaurantManager.price') }}"
                                                                name="Price">
                                                            @error('Price')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
{{--                                                         Offer Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="Offer">{{ __('restaurantManager.offer') }}</label>
                                                            <input type="text" id="Offer" class="form-control"
                                                                placeholder="{{ __('restaurantManager.offer') }}"
                                                                name="Offer">
                                                            @error('Offer')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- estimate-finish-time Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="EstimateFinishTime">{{ __('restaurantManager.estimate-finish-time') }}</label>
                                                            <input type="text" id="EstimateFinishTime"
                                                                   class="form-control"
                                                                   placeholder="{{ __('restaurantManager.estimate-finish-time-placeholder') }}"
                                                                   name="EstimateFinishTime">
                                                            @error('EstimateFinishTime')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- ability-to-order Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="AbilityToOrder">{{ __('restaurantManager.ability-to-order') }}</label>
                                                            <select class="form-control" name="AbilityToOrder" id="AbilityToOrder">
                                                                <option disabled selected value="">{{ __('restaurantManager.ability-to-order') }}</option>
                                                                <option value="Able">{{  __('restaurantManager.Able') }}</option>
                                                                <option value="Unable">{{  __('restaurantManager.Unable') }}</option>
                                                                <option value="ComingSoon">{{  __('restaurantManager.ComingSoon') }}</option>
                                                            </select>
                                                            @error('AbilityToOrder')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- ingredients Field --}}
                                                        <fieldset class="form-group">
                                                            <label>{{ __('restaurantManager.ingredients') }}</label>
                                                            <textarea style="resize: none" class="form-control" id="Ingredients" rows="3" name="Ingredients"
                                                                placeholder="{{ __('restaurantManager.ingredients') }}"></textarea>
                                                            @error('Ingredients')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Description Field --}}
                                                        <fieldset class="form-group">
                                                            <label>{{ __('restaurantManager.description') }}</label>
                                                            <textarea style="resize: none" class="form-control" id="Description" rows="3" name="Description"
                                                                placeholder="{{ __('restaurantManager.description') }}"></textarea>
                                                            @error('Description')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pl-1 pr-1">
                                                <div class="col-md-12">
                                                    {{-- pic Field --}}
                                                    <label for="photo">{{ __('restaurantManager.photo') }}</label>
                                                    <fieldset class="form-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="MealLogo"
                                                                   name="MealLogo" accept="image/*">
                                                            <label class="custom-file-label"
                                                                   for="inputGroupFile01">{{ __('restaurantManager.choose-photo') }}</label>
                                                            @error('MealLogo')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            {{-- Add and Cancel button --}}
                                            <div class="form-actions center">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> {{ __('restaurantManager.cancel') }}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>
                                                    {{ __('restaurantManager.add-meal') }}
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
@endsection
@section('search js')
    @if (Session::has('create_msg_Meal'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('create_msg_Meal') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('create_msg_Meal') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif

@endsection
