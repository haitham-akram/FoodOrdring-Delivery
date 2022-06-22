@extends('layouts.adminLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('admins.Customers-list') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin_index') }}">{{ __('admins.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="{{ route('admin_customer_manager_list') }}">{{ __('admins.Customers-list') }}</a>
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
                                        {{ __('admins.All-Customers') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- search -->
                                    <div class="row p-1">
                                        <form action="" method="post">
                                            <div class="position-relative">
                                                <input type="search" id="search" class="form-control"
                                                    placeholder="{{ __('admins.Search-customer') }}">
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
                                                    <th>{{ __('admins.customer-name') }}</th>
                                                    <th>{{ __('admins.email') }}</th>
                                                    <th>{{ __('admins.PhoneNumbers') }}</th>
                                                    <th>{{ __('admins.gender') }}</th>
                                                    <th>{{ __('admins.banStates') }}</th>
                                                    <th>{{ __('admins.dateOfBirth') }}</th>
                                                    <th>{{ __('admins.dateOfJoin') }}</th>
                                                    <th>{{ __('admins.banEndDate') }}</th>
                                                    <th>{{ __('admins.Governorate') }}</th>
                                                    <th>{{ __('admins.Neighborhood') }}</th>
                                                    <th>{{ __('admins.HouseNumber') }}</th>
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
        //     search(); // this will run after every 4 seconds
        // }, 4000);

        function search() {
            var keyword = $('#search').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('{{ route('search_customers') }}', {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    keyword: keyword,

                },
                function(data) {
                    table_post_row(data);
                });
        }
        // table row with ajax
        function table_post_row(res) {
            let htmlView = '';
            if (res.customers.length <= 0) {
                htmlView += `<tr>
                <td class = "text-center" colspan = "12" > <h4>{{ __('admins.No Data') }}</h4></td>
                    </tr>`;
            }
            console.log(res.customers);
            for (let i = 0; i < res.customers.length; i++) {
                var id = res.customers[i].CustomerID;
                // console.log(id);
                var gender = "";
                if (res.customers[i].Gender == "Male") {
                    gender = " {{ __('admins.male') }}"
                } else {
                    gender = "{{ __('admins.female') }}"
                }
                var BanStatus = "";
                if (res.customers[i].BanStatus == "Banned") {
                    BanStatus = "class = 'btn btn-sm btn-outline-danger round' > {{ __('admins.Banned') }}"

                } else {
                    BanStatus = "class='btn btn-sm btn-outline-success round'> {{ __('admins.Unbanned') }}"
                }
                // this for switch the ban-unban link
                var BanURL = "{{ route('ban_unbad_customer', ':id') }}";
                BanURL = BanURL.replace(':id', id);

                var link = "";
                if (res.customers[i].BanStatus == "Banned") {
                    link = "class='dropdown-item primary'><i class='ft-user-check'></i> {{ __('admins.unban') }}"
                } else {
                    link = "class='dropdown-item danger'><i class='ft-user-x'></i> {{ __('admins.ban') }}"
                }
                htmlView += `<tr>
                    <td class = "text-center"> ` + res.customers[i].FirstName + ` ` +
                    res.customers[i].LastName + ` </td>
                    <td class = "text-center"> <a href="mailto:` + res.customers[i].Email + `">` +
                    res.customers[i].Email + `</a>  </td>
                    <td class = "text-center"> ` + res.customers[i].PhoneNumber1 + ` , ` +
                    res.customers[i].PhoneNumber2 + ` </td>
                    <td class = "text-center">
                     <button type="button" class = "btn btn-sm btn-outline-info round" >
                        ` + gender + `</button></td>
                        <td class = "text-center">
                     <button type="button"
                        ` + BanStatus + `</button>
                    <td class = "text-center"> ` + res.customers[i].DateOfBirth + ` </td>
                    <td class = "text-center">` + res.customers[i].created_at.slice(0, 10) + ` </td>
                    <td class = "text-center"> ` + res.customers[i].BanEndDate + ` </td>
                    <td class = "text-center"> ` + res.customers[i].Governorate + ` </td>
                    <td class = "text-center"> ` + res.customers[i].Neighborhood + ` </td>
                    <td class = "text-center"> ` + res.customers[i].HouseNumber + ` </td>
                    <td class = "text-center">
                        <span class="dropdown">
                            <button id="SearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-warning dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                            <span aria-labelledby="SearchDrop2" class="dropdown-menu mt-1 dropdown-menu-left">
                            <a href=" ` + BanURL + `" ` + link + `</a>
                            </span>
                        </span>
                    </td>
                    </tr>`;
            }
            $('tbody').html(htmlView);
        }
    </script>
    @if (Session::has('success'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('success') }}', '{{ Session::get('success-title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('success') }}', '{{ Session::get('success-title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
@endsection
