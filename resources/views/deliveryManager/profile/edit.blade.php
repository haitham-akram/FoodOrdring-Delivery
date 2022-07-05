@extends('layouts.deliveryManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('delivery.Edit-profile') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('DM_Home') }}">{{ __('delivery.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('DM_Edit_Profile',$deliveryManager->DeliManagerID)}}">{{ __('delivery.Edit-profile') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Delivery office info-->
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
                                    <form class="form" method="post" action="{{route('DM_Update_Profile',$deliveryManager->DeliManagerID)}}">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row pl-1 pr-1">
                                                <div class="col-md-6">
                                                    {{-- First Name Field --}}
                                                    <div class="form-group">
                                                        <label for="FirstName">{{ __('delivery.first-name') }}</label>
                                                        <input type="text" id="FirstName" class="form-control"
                                                            placeholder="{{ __('delivery.first-name') }}" name="FirstName" value="{{$deliveryManager->FirstName}}">
                                                        @error('FirstName')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- Last Name Field --}}
                                                    <div class="form-group">
                                                        <label for="LastName">{{ __('delivery.last-name') }}</label>
                                                        <input type="text" id="LastName" class="form-control"
                                                            placeholder="{{ __('delivery.last-name') }}" name="LastName" value="{{$deliveryManager->LastName}}">
                                                        @error('LastName')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pl-1 pr-1">
                                                <div class="col-md-6">
                                                    {{-- Email Field --}}
                                                    <div class="form-group">
                                                        <label for="email">{{ __('delivery.email') }}</label>
                                                        <input type="email" id="Email" class="form-control"
                                                            placeholder="{{ __('delivery.email') }}" name="Email" value="{{$deliveryManager->Email}}">
                                                        @error('Email')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- Delivery Office Owner Field --}}
                                                    <div class="form-group">
                                                        <label
                                                            for="NameOfDeliveryOffice">{{ __('admins.restaurant-owner') }}</label>
                                                        <input type="text" id="NameOfDeliveryOffice" class="form-control"
                                                               placeholder="{{ __('admins.restaurant-owner') }}"
                                                               name="NameOfDeliveryOffice" value="{{$deliveryManager->NameOfDeliveryOffice}}">
                                                        @error('NameOfDeliveryOffice')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pl-1 pr-1">
                                                <div class="col-md-6">
                                                    {{-- Password Field --}}
                                                    <div class="form-group">
                                                        <label for="Password">{{ __('delivery.password') }}</label>
                                                        <input type="password" id="Password" class="form-control"
                                                            placeholder="{{ __('delivery.password') }}" name="Password">
                                                        @error('Password')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- Confirm Password Field --}}
                                                    <div class="form-group">
                                                        <label
                                                            for="Password_confirmation">{{ __('delivery.Confirm-Password') }}</label>
                                                        <input type="password" id="Password_confirmation" class="form-control"
                                                            placeholder="{{ __('delivery.Confirm-Password') }}"
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
                                                        <label for="PhoneNumber1">{{ __('delivery.Phone-Number-1') }}</label>
                                                        <input type="text" id="PhoneNumber1" class="form-control"
                                                            placeholder="{{ __('delivery.Phone-Number-1') }}"
                                                            name="PhoneNumber1" value="0{{(int)$deliveryManager->PhoneNumber1}}">
                                                        @error('PhoneNumber1')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- phone number 2 Field --}}
                                                    <div class="form-group">
                                                        <label for="PhoneNumber2">{{ __('delivery.Phone-Number-2') }}</label>
                                                        <input type="text" id="PhoneNumber2" class="form-control"
                                                            placeholder="{{ __('delivery.Phone-Number-2') }}"
                                                            name="PhoneNumber2" value=" @if( (int)$deliveryManager->PhoneNumber2 != 0)
                                                                 0{{ (int)$deliveryManager->PhoneNumber2}}
                                                                @endif">
                                                        @error('PhoneNumber2')
                                                        <small  class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Add and Cancel button --}}
                                        <div class="form-actions center">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> {{ __('delivery.cancel') }}
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i>
                                                {{ __('delivery.edit') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ New Customers -->
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
