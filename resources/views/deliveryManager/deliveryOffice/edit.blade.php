@extends('layouts.deliveryManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('delivery.edit-delivery') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('DM_Home') }}">{{ __('delivery.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('DM_Edit',$deliveryOffice->DeliveryOfficeID)}}">{{ __('delivery.edit-delivery') }}</a>
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
                                    <h3 class="form-section"><i class="la la-truck font-large-1"></i>
                                        {{ __('admins.delivery-info') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" method="post" action="{{route('DM_Update',$deliveryOffice->DeliveryOfficeID)}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-12">
                                                        {{-- resaturant Name Field --}}
                                                        <div class="form-group">
                                                            <label for="name">{{ __('delivery.Delivery-Name') }}</label>
                                                            <input type="text" id="NameOfDeliveryOffice" class="form-control"
                                                                placeholder="{{ __('admins.delivery-name') }}"
                                                                name="NameOfDeliveryOffice" value="{{$deliveryOffice->NameOfDeliveryOffice}}">
                                                            @error('NameOfDeliveryOffice')
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
                                                                for="street-name">{{ __('delivery.street-name') }}</label>
                                                            <input type="text" id="StreetName" class="form-control"
                                                                placeholder="{{ __('delivery.street-name') }}"
                                                                name="StreetName" value="{{$deliveryOffice->StreetName}}">
                                                            @error('StreetName')
                                                            <small class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Governorate Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="Governorate">{{ __('delivery.Governorate') }}</label>
                                                            <input type="text" id="Governorate" class="form-control"
                                                                placeholder="{{ __('delivery.Governorate') }}"
                                                                name="Governorate" value="{{$deliveryOffice->Governorate}}">
                                                            @error('Governorate')
                                                            <small class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- Neighborhood Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="Neighborhood">{{ __('delivery.Neighborhood') }}</label>
                                                            <input type="text" id="Neighborhood" class="form-control"
                                                                placeholder="{{ __('delivery.Neighborhood') }}"
                                                                name="Neighborhood" value="{{$deliveryOffice->Neighborhood}}">
                                                            @error('Neighborhood')
                                                            <small class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Navigational-mark Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="NavigationalMark">{{ __('delivery.Navigational-mark') }}</label>
                                                            <input type="text" id="NavigationalMark" class="form-control"
                                                                placeholder="{{ __('delivery.Navigational-mark') }}"
                                                                name="NavigationalMark" value="{{$deliveryOffice->NavigationalMark}}">
                                                            @error('NavigationalMark')
                                                            <small class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- opening time Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="OpiningTime">{{ __('delivery.opening-time') }}</label>
                                                            <input type="time" id="OpiningTime" class="form-control"
                                                                placeholder="{{ __('delivery.opening-time') }}"
                                                                name="OpiningTime" value="{{$deliveryOffice->OpiningTime}}">
                                                            @error('OpiningTime')
                                                            <small class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- closing time Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="ClosingTime">{{ __('delivery.closing-time') }}</label>
                                                            <input type="time" id="ClosingTime" class="form-control"
                                                                placeholder="{{ __('delivery.closing-time') }}"
                                                                name="ClosingTime" value="{{$deliveryOffice->ClosingTime}}">
                                                            @error('ClosingTime')
                                                            <small class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">

                                                    <div class="col-md-6">
                                                        {{-- Available Status Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="Available-Status">{{ __('admins.Available-status') }}</label>
                                                            <fieldset class="form-group">
                                                                <select class="form-control" name="AvailableStatus"
                                                                        id="AvailableStatus">
                                                                    <option value="Open" @if($deliveryOffice->AvailableStatus =='Open') selected @endif>
                                                                        {{ __('admins.Open') }}</option>
                                                                    <option value="Close" @if($deliveryOffice->AvailableStatus =='Close') selected @endif>
                                                                        {{ __('admins.Close') }}
                                                                    </option>
                                                                    <option value="Inmaintenance" @if($deliveryOffice->AvailableStatus =='Inmaintenance') selected @endif>
                                                                        {{ __('admins.Inmaintenance') }}</option>
                                                                </select>
                                                            </fieldset>
                                                            @error('AvailableStatus')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        {{-- logo Field --}}
                                                        <label for="closing-time">{{ __('delivery.logo') }}</label>
                                                        <fieldset class="form-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="Logo"
                                                                    name="Logo" accept="image/*">
                                                                <label class="custom-file-label"
                                                                    for="inputGroupFile01">{{ __('delivery.choose-logo') }}</label>
                                                            </div>
                                                            @error('Logo')
                                                            <small class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- edit and Cancel button --}}
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
                </section>
                <!-- //  Form section end -->
            </div>
        </div>
    </div>
    </div>
@endsection
@section('search js')
    @if (Session::has('update_msg_delivery'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('update_msg_delivery') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('update_msg_delivery') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif

@endsection
