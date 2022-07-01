@extends('layouts.restaurantManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.edit-info') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('RM_Home') }}">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('RM_Edit',$restaurant->RestaurantID)}}">{{ __('restaurantManager.edit-info') }}</a>
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
                                        {{ __('admins.restaurant-info') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" method="post" action="{{route('RM_Update',$restaurant->RestaurantID)}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-12">
                                                        {{-- resaturant Name Field --}}
                                                        <div class="form-group">
                                                            <label for="name">{{ __('admins.restaurant-name') }}</label>
                                                            <input type="text" id="RestaurantName" class="form-control"
                                                                placeholder="{{ __('admins.restaurant-name') }}"
                                                                name="RestaurantName" value="{{$restaurant->RestaurantName}}">
                                                            @error('RestaurantName')
                                                            <small class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- street name Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="street-name">{{ __('admins.street-name') }}</label>
                                                            <input type="text" id="StreetName" class="form-control"
                                                                placeholder="{{ __('admins.street-name') }}"
                                                                name="StreetName" value="{{$restaurant->StreetName}}">
                                                            @error('StreetName')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Governorate Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="Governorate">{{ __('admins.Governorate') }}</label>
                                                            <input type="text" id="Governorate" class="form-control"
                                                                placeholder="{{ __('admins.Governorate') }}"
                                                                name="Governorate" value="{{$restaurant->Governorate}}">
                                                            @error('Governorate')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- Neighborhood Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="Neighborhood">{{ __('admins.Neighborhood') }}</label>
                                                            <input type="text" id="Neighborhood" class="form-control"
                                                                placeholder="{{ __('admins.Neighborhood') }}"
                                                                name="Neighborhood" value="{{$restaurant->Neighborhood}}">
                                                            @error('Neighborhood')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Navigational-mark Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="Navigational-mark">{{ __('admins.Navigational-mark') }}</label>
                                                            <input type="text" id="NavigationalMark" class="form-control"
                                                                placeholder="{{ __('admins.Navigational-mark') }}"
                                                                name="NavigationalMark" value="{{$restaurant->NavigationalMark}}">
                                                            @error('NavigationalMark')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- opening time Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="opening-time">{{ __('admins.opening-time') }}</label>
                                                            <input type="time" id="OpiningTime" class="form-control"
                                                                placeholder="{{ __('admins.opening-time') }}"
                                                                   name="OpiningTime" value="{{$restaurant->OpiningTime}}">
                                                            @error('OpiningTime')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- closing time Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="closing-time">{{ __('admins.closing-time') }}</label>
                                                            <input type="time" id="ClosingTime" class="form-control"
                                                                placeholder="{{ __('admins.closing-time') }}"
                                                                   name="ClosingTime" value="{{$restaurant->ClosingTime}}">
                                                            @error('ClosingTime')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- restaurant category --}}
                                                        <div class="form-group">
                                                            <label for="category">{{ __('admins.category') }}</label>
                                                            <fieldset class="form-group">
                                                                <select class="form-control" name="CategoriesID"
                                                                        id="CategoriesID">
                                                                    <option disabled selected value="">
                                                                        {{ __('admins.category') }}</option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->CategorytypeID }}"
                                                                                @if($category->CategorytypeID == $restaurant->CategoriesID)selected @endif>{{ $category->CategoryName }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </fieldset>
                                                            @error('CategoriesID')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Available Status Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="Available-Status">{{ __('admins.Available-status') }}</label>
                                                            <fieldset class="form-group">
                                                                <select class="form-control" name="AvailableStatus"
                                                                        id="AvailableStatus">
                                                                    <option value="Open" @if($restaurant->AvailableStatus =='Open') selected @endif>
                                                                        {{ __('admins.Open') }}</option>
                                                                    <option value="Close" @if($restaurant->AvailableStatus =='Close') selected @endif>
                                                                        {{ __('admins.Close') }}
                                                                    </option>
                                                                    <option value="Inmaintenance" @if($restaurant->AvailableStatus =='Inmaintenance') selected @endif>
                                                                        {{ __('admins.Inmaintenance') }}</option>
                                                                </select>
                                                            </fieldset>
                                                            @error('AvailableStatus')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row pl-1 pr-1">
                                                <div class="col-md-12">
                                                    {{-- logo Field --}}
                                                    <label for="closing-time">{{ __('admins.logo') }}</label>
                                                    <fieldset class="form-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="Logo"
                                                                   name="Logo">
                                                            <label class="custom-file-label"
                                                                   for="inputGroupFile01">{{ __('admins.choose-logo') }}</label>
                                                            @error('Logo')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            </div>
                                            {{-- Edit and Cancel button --}}
                                            <div class="form-actions center">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> {{ __('admins.cancel') }}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>
                                                    {{ __('admins.edit') }}
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
    @if (Session::has('update_msg_restaurant'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('update_msg_restaurant') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('update_msg_restaurant') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
@endsection
