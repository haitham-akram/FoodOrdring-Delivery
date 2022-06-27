@extends('layouts.notificationLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('admins.edit-notification-content') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                            href="{{ route('admin_index') }}">{{ __('admins.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                            href="{{route('admin_edit_notification',$Notification->NotificationID)}}">{{ __('admins.edit-notification-content') }}</a>
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
                                    <h3 class="form-section"><i class="la la-bell font-large-1"></i>
                                        {{ __('admins.notification-content') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" method="post"
                                              action="{{route('admin_store_notification',$Notification->NotificationID)}}">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6 collapse show">
                                                        {{-- Receiver ID Field --}}
                                                        <div class="form-group">
                                                            <label for="header">{{ __('admins.Receiver-id') }}</label>


                                                            <select class="select2 form-control" multiple="multiple"
                                                                    id="ReceiverID" name="ReceiverID[]">
                                                                <optgroup label="{{__('admins.Restaurant-Managers')}}">
                                                                    @foreach($RestaurantManagers as $RestaurantManager)
                                                                        <option value="{{$RestaurantManager->RestManagerID}}" {{ in_array($RestaurantManager->RestManagerID,$Notification->ReceiverID)?'selected':''}}>
                                                                            {{$RestaurantManager->FirstName}} {{$RestaurantManager->LastName}}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                                <optgroup label="{{__('admins.Delivery-Managers')}}">
                                                                    @foreach($DeliveryManagers as $DeliveryManager)
                                                                        <option value="{{$DeliveryManager->DeliManagerID}}" {{ in_array($DeliveryManager->DeliManagerID,$Notification->ReceiverID)?'selected':''}}>
                                                                            {{$DeliveryManager->FirstName}} {{$DeliveryManager->LastName}}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                            @error('ReceiverID')
                                                            <small class="form-text text-danger">{{$message}}</small>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        {{-- Title field --}}
                                                        <div class="form-group">
                                                            <label for="header">{{ __('admins.header') }}</label>
                                                            <input type="text" id="Header" class="form-control"
                                                                   placeholder="{{ __('admins.header') }}" name="Header"
                                                                   value="{{$Notification->Header}}">
                                                            @error('Header')
                                                            <small class="form-text text-danger">{{$message}}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-12">
                                                        {{-- Description Field --}}
                                                        <fieldset class="form-group">
                                                            <label>{{ __('admins.description') }}</label>
                                                            <textarea style="resize: none" class="form-control"
                                                                      id="Description" rows="3" name="Description"
                                                                      placeholder="{{ __('admins.description') }}">{{$Notification->Description}}</textarea>
                                                            @error('Description')
                                                            <small class="form-text text-danger">{{$message}}</small>
                                                            @enderror
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                {{-- notification type field --}}
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group">
                                                            <label
                                                                    for="notification_type">{{ __('admins.notification-type') }}</label>
                                                            <select class="custom-select" id="customSelect"
                                                                    name="TypeOfNotification">
                                                                <option selected="" disabled>
                                                                    {{ __('admins.notification-type') }}
                                                                </option>
                                                                <option value="Alert"
                                                                        @if($Notification->TypeOfNotification =="Alert")selected @endif>{{ __('admins.Informing') }}
                                                                </option>
                                                                <option value="Emergence"
                                                                        @if($Notification->TypeOfNotification =="Emergence")selected @endif>{{ __('admins.Warning') }}
                                                                </option>
                                                                <option value="Message"
                                                                        @if($Notification->TypeOfNotification =="Message")selected @endif>{{ __('admins.Message') }}
                                                                </option>
                                                            </select>
                                                            @error('TypeOfNotification')
                                                            <small class="form-text text-danger">{{$message}}</small>
                                                            @enderror
                                                        </fieldset>
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- Send and Cancel button --}}
                                            <div class="form-actions center">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> {{ __('admins.cancel') }}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>
                                                    {{ __('admins.send-notification') }}
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
    {{--    </div>--}}
    </div>

@endsection
@section('search js')

    @if (Session::has('create_msg_notification'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('update_msg_notification') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('update_msg_notification') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
    {{-- this script for toastr alert error --}}
    @if (Session::has('not_found_msg_notification'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.error('{{ Session::get('not_found_msg_notification') }}', '{{ Session::get('error_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.error('{{ Session::get('not_found_msg_notification') }}', '{{ Session::get('error_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif

@endsection
