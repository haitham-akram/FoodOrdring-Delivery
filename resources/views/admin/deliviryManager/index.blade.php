@extends('layouts.adminLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('admins.Delivery-Managers-list') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin_index') }}">{{ __('admins.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="{{ route('admin_deliviry_manager_list') }}">{{ __('admins.Delivery-Managers-list') }}</a>
                                </li>
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
                                    <h3 class="form-section"><i class="ft-users"></i>
                                        {{ __('admins.all-Deliviry-Manager') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <a href="{{ route('admin_add_res_manager') }}"> <button
                                                class="btn btn-warning btn-sm"><i class="ft-plus white"></i>
                                                {{ __('admins.deliviry-managers-add') }}</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- search -->
                                    <div class="row p-1">
                                        <form action="#">
                                            <div class="position-relative">
                                                <input type="search" id="search" class="form-control"
                                                    placeholder="{{ __('admins.Search') }}">
                                                <div class="form-control-position">
                                                    <i class="la la-search text-size-base text-muted"></i>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- start table List  -->
                                    <div class="table-responsive">
                                        <table id=""
                                            class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('admins.id') }}</th>
                                                    <th>{{ __('admins.full-name') }}</th>
                                                    <th>{{ __('admins.email') }}</th>
                                                    <th>{{ __('admins.PhoneNumbers') }}</th>
                                                    <th>{{ __('admins.deliviry-owner') }}</th>
                                                    <th>{{ __('admins.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            $.post('{{ route('search_Delivery_Manager') }}', {
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
            if (res.DeliveryOfficeManagers.length <= 0) {
                htmlView += `<tr>
                <td class = "text-center" colspan = "6" ><h4>{{ __('admins.No Data') }}</h4></td>
                    </tr>`;
            }
            for (let i = 0; i < res.DeliveryOfficeManagers.length; i++) {
                var id = res.DeliveryOfficeManagers[i].DeliManagerID;
                var EditURL = "{{ route('admin_edit_deliviry_manager', ':id') }}";
                EditURL = EditURL.replace(':id', id);
                var DeleteURL = "{{ route('admin_delete_deliviry_manager', ':id') }}";
                DeleteURL = DeleteURL.replace(':id', id);
                htmlView += `<tr>
                    <td class = "text-center"> ` + res.DeliveryOfficeManagers[i].DeliManagerID + ` </td>
                    <td class = "text-center"> ` + res.DeliveryOfficeManagers[i].FirstName + ` ` +
                    res.DeliveryOfficeManagers[i].LastName + ` </td>
                    <td class = "text-center"> <a href="mailto:` + res.DeliveryOfficeManagers[i].Email + `">` +
                    res.DeliveryOfficeManagers[i].Email + `</a>  </td>
                    <td class = "text-center"> ` + res.DeliveryOfficeManagers[i].PhoneNumber1 + ` , ` +
                    res.DeliveryOfficeManagers[i].PhoneNumber2 + ` </td>
                    <td class = "text-center">` + res.DeliveryOfficeManagers[i].NameOfDeliveryOffice + `</td>
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
    {{-- this script for toastr alert success --}}
    @if (Session::has('delete_msg_delivery'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('delete_msg_delivery') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('delete_msg_delivery') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
    {{-- this script for toastr alert error --}}
    @if (Session::has('not_found_msg_delivery'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.error('{{ Session::get('not_found_msg_delivery') }}', '{{ Session::get('error_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.error('{{ Session::get('not_found_msg_delivery') }}', '{{ Session::get('error_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
@endsection
