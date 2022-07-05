@extends('layouts.restaurantManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.meals-list') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="{{ route('RM_Meals') }}">{{ __('restaurantManager.meals-list') }}</a>
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
                                    <h3 class="form-section"><i class="la la-cutlery font-large-1"></i>
                                        {{ __('restaurantManager.meals') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">

                                        <a href="{{ route('RM_create_meal') }}"><button type="button"
                                                class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#add_form"><i class="ft-plus white"></i>
                                                {{ __('restaurantManager.add-new-meal') }}</button></a>
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
                                                        placeholder="{{ __('restaurantManager.search-meal') }}">
                                                    <div class="form-control-position">
                                                        <i class="la la-search text-size-base text-muted"></i>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- End Choosing Category Options --}}
                                    <!-- start table List  -->
                                    <div class="table-responsive">
                                        <table id=""
                                            class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">{{ __('restaurantManager.meal-id') }}
                                                    </th>
                                                    <th class="text-center">
                                                        {{ __('restaurantManager.logo') }}</th>
                                                    <th class="text-center">
                                                        {{ __('restaurantManager.meal-name') }}</th>
                                                    <th class="text-center">{{ __('restaurantManager.category-name') }}
                                                    </th>
                                                    <th class="text-center">
                                                        {{ __('restaurantManager.price') }}</th>
{{--                                                    <th class="text-center">{{ __('restaurantManager.offer') }}--}}
{{--                                                    </th>--}}
                                                    <th class="text-center">
                                                        {{ __('restaurantManager.estimate-finish-time') }}</th>
                                                    <th class="text-center">
                                                        {{ __('restaurantManager.ability-to-order') }}</th>
                                                    <th class="text-center">{{ __('restaurantManager.ingredients') }}
                                                    <th class="text-center">
                                                        {{ __('restaurantManager.description') }}</th>
                                                    <th class="text-center">
                                                        {{ __('restaurantManager.rate') }}</th>
                                                    <th class="text-center">{{ __('restaurantManager.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
            $.post('{{ route('search_Meals') }}', {
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
            if (res.Meals.length <= 0) {
                htmlView += `<tr>
                <td class = "text-center" colspan = "12" ><h4>{{ __('admins.No Data') }}</h4></td>
                    </tr>`;
            }
            for (let i = 0; i < res.Meals.length; i++) {
                var id = res.Meals[i].MealID;
                var EditURL = "{{ route('RM_edit_meal', ':id') }}";
                EditURL = EditURL.replace(':id', id);
                var DeleteURL = "{{ route('RM_delete_meal', ':id') }}";
                DeleteURL = DeleteURL.replace(':id', id);
                //<td class = "text-center"> ` + res.Meals[i].Offer + `</td> this col i delete it
                htmlView += `<tr>
                    <td class = "text-center"> ` + res.Meals[i].MealID + ` </td>
                    <td class = "text-center"> <img style="width:100px; hight:100px" src="` + res.Meals[i].MealLogo + `" alt="logo"> </td>
                    <td class = "text-center"> ` + res.Meals[i].MealName + ` </td>
                    <td class = "text-center"> ` + res.Meals[i].CategoryType + `</td>
                    <td class = "text-center"> ` + res.Meals[i].Price + ` </td>
                    <td class = "text-center"> ` + res.Meals[i].EstimateFinishTime + `</td>
                    <td class = "text-center"> ` + res.Meals[i].AbilityToOrder + `</td>
                    <td class = "text-center"> ` + res.Meals[i].Ingredients + `</td>
                    <td class = "text-center"> ` + res.Meals[i].Description + `</td>
                    <td class = "text-center"> ` + res.Meals[i].Rate + `</td>
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
    @if (Session::has('delete_msg_Meal'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('delete_msg_Meal') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('delete_msg_Meal') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
    {{-- this script for toastr alert error --}}
    @if (Session::has('not_found_msg_restaurant'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.error('{{ Session::get('not_found_msg_Meal') }}', '{{ Session::get('error_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.error('{{ Session::get('not_found_msg_Meal') }}', '{{ Session::get('error_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
@endsection
