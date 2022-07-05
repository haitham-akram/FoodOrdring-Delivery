@extends('layouts.restaurantManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.Edit-profile') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('RM_Home') }}">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">{{ __('restaurantManager.Edit-profile') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- profileinfo-->
                <div class="row">
                    <div id="recent-transactions" class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class=""><i
                                        class="la la-user font-medium-5"></i>{{ __('delivery.deliviry-managers-info') }}
                                </h3>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{route('RM_Update_Profile',$Restaurantmanager->RestManagerID)}}" method="post">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row pl-1 pr-1">
                                                <div class="col-md-6">
                                                    {{-- First Name Field --}}
                                                    <div class="form-group">
                                                        <label
                                                            for="FirstName">{{ __('restaurantManager.first-name') }}</label>
                                                        <input type="text" id="FirstName" class="form-control"
                                                            placeholder="{{ __('restaurantManager.first-name') }}"
                                                               name="FirstName" value="{{$Restaurantmanager->FirstName}}">
                                                        @error('FirstName')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- Last Name Field --}}
                                                    <div class="form-group">
                                                        <label for="LastName">{{ __('restaurantManager.last-name') }}</label>
                                                        <input type="text" id="LastName" class="form-control"
                                                            placeholder="{{ __('restaurantManager.last-name') }}"
                                                               name="LastName" value="{{$Restaurantmanager->LastName}}">
                                                        @error('LastName')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pl-1 pr-1">
                                                <div class="col-md-12">
                                                    {{-- Email Field --}}
                                                    <div class="form-group">
                                                        <label for="email">{{ __('restaurantManager.email') }}</label>
                                                        <input type="email" id="Email" class="form-control"
                                                            placeholder="{{ __('restaurantManager.email') }}"
                                                               name="Email" value="{{$Restaurantmanager->Email}}">
                                                        @error('Email')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pl-1 pr-1">
                                                <div class="col-md-6">
                                                    {{-- Password Field --}}
                                                    <div class="form-group">
                                                        <label
                                                            for="password">{{ __('restaurantManager.password') }}</label>
                                                        <input type="password" id="Password" class="form-control"
                                                            placeholder="{{ __('restaurantManager.password') }}"
                                                            name="Password">
                                                        @error('Password')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- comfirm password Field --}}
                                                    <div class="form-group">
                                                        <label
                                                            for="confirm-password">{{ __('restaurantManager.confirm-password') }}</label>
                                                        <input type="Password" id="Password_confirmation" class="form-control"
                                                            placeholder="{{ __('restaurantManager.confirm-password') }}"
                                                            name="Password_confirmation">
                                                        @error('Password_confirmation')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pl-1 pr-1">
                                                <div class="col-md-6">
                                                    {{-- phone number 1 Field --}}
                                                    <div class="form-group">
                                                        <label
                                                            for="phone1">{{ __('restaurantManager.Phone-Number-1') }}</label>
                                                        <input type="text" id="PhoneNumber1" class="form-control"
                                                            placeholder="{{ __('restaurantManager.Phone-Number-1') }}"
                                                            name="PhoneNumber1" value="0{{(int)$Restaurantmanager->PhoneNumber1}}">
                                                        @error('PhoneNumber1')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- phone number 2 Field --}}
                                                    <div class="form-group">
                                                        <label
                                                            for="PhoneNumber2">{{ __('restaurantManager.Phone-Number-2') }}</label>
                                                        <input type="text" id="PhoneNumber2" class="form-control"
                                                            placeholder="{{ __('restaurantManager.Phone-Number-2') }}"
                                                               name="PhoneNumber2" value="@if( (int)$Restaurantmanager->PhoneNumber2 != 0)
                                                                 0{{(int)$Restaurantmanager->PhoneNumber2}}
                                                                @endif">
                                                        @error('PhoneNumber2')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pl-1 pr-1">
                                                <div class="col-md-12">
                                                    {{-- Restaurant Owner Field --}}
                                                    <div class="form-group">
                                                        <label
                                                            for="owend-rest">{{ __('admins.restaurant-owner') }}</label>
                                                        <input type="text" id="RestaurantName" class="form-control"
                                                               placeholder="{{ __('admins.restaurant-owner') }}"
                                                               name="RestaurantName" value="{{$Restaurantmanager->RestaurantName}}">
                                                        @error('RestaurantName')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
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
                                                {{ __('restaurantManager.edit') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ profile-->
            </div>
        </div>
    </div>
@endsection
@section('search js')
    @if (Session::has('update_msg_profile'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('update_msg_profile') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('update_msg_profile') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
@endsection
