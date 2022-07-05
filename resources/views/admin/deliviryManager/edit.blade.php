@extends('layouts.adminLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('admins.Edit-deliviry-manager') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin_index') }}">{{ __('admins.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin_edit_deliviry_manager',$deliveryofficemanager->DeliManagerID)}}">{{ __('admins.Edit-delivrry-manager') }}</a>
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
                                    <h3 class="form-section"><i class="ft-user"></i>
                                        {{ __('admins.deliviry-managers-info') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin_update_delivery_manager',$deliveryofficemanager->DeliManagerID)}}" method="post">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- First Name Field --}}
                                                        <div class="form-group">
                                                            <label for="fname">{{ __('admins.fname') }}</label>
                                                            <input type="text" id="FirstName" class="form-control"
                                                                   placeholder="{{ __('admins.fname') }}" name="FirstName"
                                                                   value="{{$deliveryofficemanager->FirstName}}">
                                                            @error('FirstName')
                                                            <small  class="form-text text-danger">{{$message}}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Last Name Field --}}
                                                        <div class="form-group">
                                                            <label for="lname">{{ __('admins.lname') }}</label>
                                                            <input type="text" id="LastName" class="form-control"
                                                                   placeholder="{{ __('admins.lname') }}" name="LastName"
                                                                   value="{{$deliveryofficemanager->LastName}}">
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
                                                            <label for="email">{{ __('admins.email') }}</label>
                                                            <input type="email" id="Email" class="form-control"
                                                                   placeholder="{{ __('admins.email') }}" name="Email"
                                                                   value="{{$deliveryofficemanager->Email}}">
                                                            @error('Email')
                                                            <small  class="form-text text-danger">{{$message}}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- phone number 1 Field --}}
                                                        <div class="form-group">
                                                            <label for="phone1">{{ __('admins.phone1') }}</label>
                                                            <input type="text" id="PhoneNumber1" class="form-control"
                                                                   placeholder="{{ __('admins.phone1') }}" name="PhoneNumber1"
                                                                   value="0{{(int)$deliveryofficemanager->PhoneNumber1}}">
                                                            @error('PhoneNumber1')
                                                            <small  class="form-text text-danger">{{$message}}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- phone number 2 Field --}}
                                                        <div class="form-group">
                                                            <label for="phone2">{{ __('admins.phone2') }}</label>
                                                            <input type="text" id="PhoneNumber2" class="form-control"
                                                                   placeholder="{{ __('admins.phone2') }}" name="PhoneNumber2"
                                                                   value="@if( (int)$deliveryofficemanager->PhoneNumber2 != 0)
                                                                 0{{ (int)$deliveryofficemanager->PhoneNumber2}}
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
                                                                for="owend-rest">{{ __('admins.deliviry-owner') }}</label>
                                                            <input type="text" id="NameOfDeliveryOffice" class="form-control"
                                                                   placeholder="{{ __('admins.deliviry-owner') }}"
                                                                   name="NameOfDeliveryOffice" value="{{$deliveryofficemanager->NameOfDeliveryOffice}}">
                                                            @error('NameOfDeliveryOffice')
                                                            <small  class="form-text text-danger">{{$message}}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Add and Cancel button --}}
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
    @if (Session::has('update_msg_deliveryManager'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('update_msg_deliveryManager') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('update_msg_deliveryManager') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
@endsection
