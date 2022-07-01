@extends('layouts.restaurantManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.offers-list') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('RM_Home')}}">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="{{ route('RM_offers') }}">{{ __('restaurantManager.offers-list') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-head">
                                <div class="card-header">
                                    <h3 class="form-section"><i class="la la-tags font-large-1"></i>
                                        {{ __('restaurantManager.offers') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">

                                        <a href="{{ route('RM_create_meal') }}"><button type="button"
                                                class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#add_form"><i class="ft-plus white"></i>
                                                {{ __('restaurantManager.Add-new-offer') }}</button></a>
                                    </div>

                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- search -->
                                    <div class="row pb-1">
                                        <div class="col-md-2 pb-1">
                                            <form class="form" action="#">
                                                <div class="position-relative">
                                                    <input type="text" id="search" class="form-control"
                                                        placeholder="{{ __('restaurantManager.search-offer') }}">
                                                    <div class="form-control-position">
                                                        <i class="la la-search text-size-base text-muted"></i>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- start table List  -->
                                    <div class="table-responsive">
                                        <table id=""
                                            class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">{{ __('restaurantManager.offer-id') }}
                                                    </th>
                                                    <th class="text-center">{{ __('restaurantManager.meal-name') }}
                                                    </th>
                                                    <th class="text-center">{{ __('restaurantManager.category-name') }}
                                                    </th>
                                                    <th class="text-center">
                                                        {{ __('restaurantManager.discount-precentage') }}</th>
                                                    <th class="text-center">{{ __('restaurantManager.date-start') }}
                                                    </th>
                                                    <th class="text-center">{{ __('restaurantManager.date-end') }}
                                                    </th>
                                                    <th class="text-center">{{ __('restaurantManager.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
{{--                                                <tr>--}}
{{--                                                    <td class="text-center">--}}
{{--                                                        offer-id--}}
{{--                                                    </td>--}}
{{--                                                    <td class="text-center">--}}
{{--                                                        meal-id--}}
{{--                                                    </td>--}}
{{--                                                    <td class="text-center">--}}
{{--                                                        category-id--}}
{{--                                                    </td>--}}
{{--                                                    <td class="text-center">--}}
{{--                                                        discount-precentage--}}
{{--                                                    </td>--}}

{{--                                                    <td class="text-center">--}}
{{--                                                        date-start--}}
{{--                                                    </td>--}}
{{--                                                    <td class="text-center">--}}
{{--                                                        date-end--}}
{{--                                                    </td>--}}

{{--                                                    <td class="text-center">--}}
{{--                                                        <span class="dropdown">--}}
{{--                                                            <button id="SearchDrop2" type="button" data-toggle="dropdown"--}}
{{--                                                                aria-haspopup="true" aria-expanded="true"--}}
{{--                                                                class="btn btn-warning dropdown-toggle  dropdown-menu-right "><i--}}
{{--                                                                    class="ft-settings"></i></button>--}}
{{--                                                            <span aria-labelledby="SearchDrop2"--}}
{{--                                                                class="dropdown-menu mt-1 dropdown-menu-left">--}}
{{--                                                                <a class="dropdown-item primary" data-toggle="modal"--}}
{{--                                                                    data-target="#edit_form"><i--}}
{{--                                                                        class="ft-edit-2 primary"></i>--}}
{{--                                                                    {{ __('admins.edit') }}</a>--}}
{{--                                                                <a href="#" class="dropdown-item danger"><i--}}
{{--                                                                        class="ft-trash-2 danger"></i>--}}
{{--                                                                    {{ __('admins.delete') }}</a>--}}
{{--                                                            </span>--}}
{{--                                                        </span>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- end of the list --}}
                                </div>
                                {{-- end of the card body --}}
                            </div>
                        </div>
                        {{-- end of the card --}}
                    </div>
                    {{-- end of the col --}}
                </section>
            </div>
        </div>
    </div>
@endsection
@section('search js')
    <script>
        $('#search').on('keyup', function() {
            search();
        });
        search();

        // setInterval(function() {
        //     search(); // this will run after every 1.5 seconds
        // }, 1500);

        function search() {
            var keyword = $('#search').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('{{ route('RM_search_Offer') }}', {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    keyword: keyword
                },
                function(data) {
                    table_post_row(data);
                });
        }

        // table row with ajax
        function table_post_row(res) {
            let htmlView = '';
            if (res.offers.length <= 0) {
                htmlView += `<tr>
                <td class = "text-center" colspan = "7" ><h4>{{ __('admins.No Data') }}</h4></td>
                    </tr>`;
            }
            console.log();
            for (let i = 0; i < res.offers.length; i++) {
                var id = res.offers[i].OfferID;
                var EditURL = "{{ route('RM_edit_offer', ':id') }}";
                EditURL = EditURL.replace(':id', id);
                var DeleteURL = "{{ route('RM_delete_offer', ':id') }}";
                DeleteURL = DeleteURL.replace(':id', id);
                htmlView += `<tr>
                    <td class = "text-center"> ` + res.offers[i].OfferID + ` </td>
                    <td class = "text-center"> ` + res.offers[i].MealName + ` </td>
                    <td class = "text-center"> ` + res.offers[i].CategoryType + `</td>
                    <td class = "text-center"> ` + res.offers[i].DiscountPercentage + ` </td>
                    <td class = "text-center"> ` + res.offers[i].DateOfStart + `</td>
                    <td class = "text-center"> ` + res.offers[i].DateOfEnd + `</td>
                    <td class = "text-center">
                        <span class="dropdown">
                            <button id="SearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-warning dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                            <span aria-labelledby="SearchDrop2" class="dropdown-menu mt-1 dropdown-menu-left">
                            <a href=" ` + EditURL + `" class="dropdown-item primary"><i class="ft-edit-2"></i> {{ __('admins.edit') }} </a>
                            <a href="` + DeleteURL + `" class="dropdown-item danger"><i class="ft-trash-2 danger"></i> {{ __('admins.delete') }}</a>
                            </span>
                        </span>
                    </td>
                    </tr>`;
            }
            $('tbody').html(htmlView);
        }
    </script>
    @if (Session::has('delete_msg_offer'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('delete_msg_offer') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('delete_msg_offer') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
    {{-- this script for toastr alert error --}}
    @if (Session::has('not_found_msg_offer'))
        @if (App::getLocale() == 'ar')
            <script>

                toastr.error('{{ Session::get('not_found_msg_offer') }}', '{{ Session::get('error_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.error('{{ Session::get('not_found_msg_offer') }}', '{{ Session::get('error_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
@endsection
