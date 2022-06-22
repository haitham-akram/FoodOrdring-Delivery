@extends('layouts.adminLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('admins.notification-list') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin_index') }}">{{ __('admins.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="{{ route('admin_notification_list') }}">{{ __('admins.notification-list') }}</a>
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
                                    <h3 class="form-section"><i class="la la-bell font-large-1"></i>
                                        {{ __('admins.All-notification') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- search -->
                                    <div class="row p-1">
                                        {{-- <form action="" method=""> --}}
                                        <div class="position-relative">
                                            <input type="search" id="search" class="form-control"
                                                placeholder="{{ __('admins.Search-notification') }}" name="search"
                                                id="search">
                                            <div class="form-control-position">
                                                <i class="la la-search text-size-base text-muted"></i>
                                            </div>
                                        </div>
                                        {{-- </form> --}}
                                    </div>
                                    <!-- start table  -->
                                    <div class="table-responsive">
                                        <table id=""
                                            class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">{{ __('admins.id') }}</th>
                                                    <th class="text-center">{{ __('admins.Receiver-id') }}</th>
                                                    <th class="text-center">{{ __('admins.header') }}</th>
                                                    <th class="text-center">{{ __('admins.description') }}</th>
                                                    <th class="text-center">{{ __('admins.notification-type') }}</th>
                                                    <th class="text-center">{{ __('admins.log-data') }}</th>
                                                    <th class="text-center">{{ __('admins.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- end table --}}
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
    @if (Session::has('delete_msg_notification'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('delete_msg_notification') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('delete_msg_notification') }}', '{{ Session::get('success_title') }}', {
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
            $.post('{{ route('search_Notification') }}', {
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
            if (res.notifications.length <= 0) {
                htmlView += `<tr>
                <td class = "text-center" colspan = "7" > <h4>{{ __('admins.No Data') }}</h4></td>
                    </tr>`;
            }
            for (let i = 0; i < res.notifications.length; i++) {
                var id = res.notifications[i].NotificationID;
                var EditURL = "{{ route('admin_edit_notification', ':id') }}";
                EditURL = EditURL.replace(':id', id);
                var DeleteURL = "{{ route('admin_delete_notification', ':id') }}";
                DeleteURL = DeleteURL.replace(':id', id);
                htmlView += `<tr>
                    <td class = "text-center"> ` + res.notifications[i].NotificationID + ` </td>
                    <td class = "text-center"> ` + res.notifications[i].ReceiverID + ` </td>
                    <td class = "text-center"> ` + res.notifications[i].Header + ` </td>
                    <td class = "text-center"> ` + res.notifications[i].Description + ` </td>
                    <td class = "text-center"> ` + res.notifications[i].TypeOfNotification + ` </td>
                    <td class = "text-center"> ` + res.notifications[i].LogDate + ` </td>
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

@endsection
