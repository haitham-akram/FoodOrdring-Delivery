@extends('layouts.adminLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- statistic -->
                <div class="row">
                    {{-- restaurant number --}}
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="info">{{ $restaurants_count }}</h3>
                                            <h6>{{ __('admins.restaurant-number') }}</h6>
                                        </div>
                                        <div>
                                            <i class="la la-cutlery info font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-info" role="progressbar"
                                            style="width: {{ $restaurants_count }}%" aria-valuenow="80" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- delivery number --}}
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="warning">{{ $delevirys_count }}</h3>
                                            <h6>{{ __('admins.delivery-number') }}</h6>
                                        </div>
                                        <div>
                                            <i class="la la-truck warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-warning" role="progressbar"
                                            style="width: {{ $delevirys_count }}%" aria-valuenow="65" aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- customer number --}}
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success">{{ $customers_count }}</h3>
                                            <h6>{{ __('admins.customer-number') }}</h6>
                                        </div>
                                        <div>
                                            <i class="icon-users success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                            style="width: {{ $customers_count }}%" aria-valuenow="75" aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- notification number --}}
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="danger">{{ $notifications_count }}</h3>
                                            <h6>{{ __('admins.notification-number') }}</h6>
                                        </div>
                                        <div>
                                            <i class="icon-bell danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-danger" role="progressbar"
                                            style="width: {{ $notifications_count }}%" aria-valuenow="85"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/statistic -->
                <!-- New Customers -->
                <div class="row">
                    <div id="recent-transactions" class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('admins.new-customers') }}</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a class="btn btn-sm btn-warning box-shadow-2 round btn-min-width pull-right"
                                                href="{{ route('admin_customer_manager_list') }}"
                                                target="_blank">{{ __('admins.all-customers') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">{{ __('admins.customer-name') }}</th>
                                                <th class="border-top-0">{{ __('admins.email') }}</th>
                                                <th class="border-top-0">{{ __('admins.PhoneNumbers') }}</th>
                                                <th class="border-top-0">{{ __('admins.gender') }}</th>
                                                <th class="border-top-0">{{ __('admins.banStates') }}</th>
                                                <th class="border-top-0">{{ __('admins.dateOfBirth') }}</th>
                                                <th class="border-top-0">{{ __('admins.dateOfJoin') }}</th>
                                                <th class="border-top-0">{{ __('admins.banEndDate') }}</th>
                                                <th class="border-top-0">{{ __('admins.Governorate') }}</th>
                                                <th class="border-top-0">{{ __('admins.Neighborhood') }}</th>
                                                <th class="border-top-0">{{ __('admins.HouseNumber') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customers as $customer)
                                                <tr>
                                                    <td class="text-truncate">
                                                        {{ $customer->FirstName }} {{ $customer->LastName }}
                                                    </td>
                                                    <td class="text-truncate">{{ $customer->Email }}</td>
                                                    <td class="text-truncate">
                                                        {{ $customer->PhoneNumber1 }} , {{ $customer->PhoneNumber2 }}
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            @if ($customer->Gender == 'Male') class="btn btn-sm btn-outline-info round">{{ __('admins.male') }}
                                                             @else
                                                             class="btn btn-sm btn-outline-info round"> {{ __('admins.female') }} @endif
                                                            </button>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            @if ($customer->BanStatus == 'Banned') class="btn btn-sm btn-outline-danger round">{{ __('admins.Banned') }}
                                                        @else
                                                        class="btn btn-sm btn-outline-success round">{{ __('admins.Unbanned') }} @endif
                                                            </button>
                                                    </td>
                                                    <td class="text-truncate">{{ $customer->DateOfBirth }}</td>
                                                    <td class="text-truncate">{{ substr($customer->created_at, 0, 11) }}
                                                    </td>
                                                    <td class="text-truncate">{{ $customer->BanEndDate }}</td>
                                                    <td class="text-truncate">{{ $customer->Governorate }}</td>
                                                    <td class="text-truncate">{{ $customer->Neighborhood }}</td>
                                                    <td class="text-truncate">{{ $customer->HouseNumber }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
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
