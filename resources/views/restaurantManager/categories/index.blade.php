@extends('layouts.restaurantManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.categories-list') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="{{ route('RM_Categories') }}">{{ __('restaurantManager.categories-list') }}</a>
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
                                    <h3 class="form-section"><i class="la la-th-list font-large-1"></i>
                                        {{ __('restaurantManager.categories') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <!--  Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#add_form"><i class="ft-plus white"></i>
                                            {{ __('restaurantManager.add-new-category') }}</button>
                                    </div>
                                    {{-- start of add modal --}}
                                    <!-- Modal -->
                                    <div class="modal fade text-left" id="add_form" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel12" aria-hidden="true" data-backdrop="false"
                                        outsidedata-backdrop="false">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning white">
                                                    <h4 class="modal-title white" id="myModalLabel12">
                                                        {{ __('restaurantManager.add-new-category') }}</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('RM_store_category')}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <h5><i class="la la-arrow-right"></i>
                                                            {{ __('restaurantManager.add-form-header') }}</h5>
                                                        <hr>
                                                        <label>{{ __('restaurantManager.category-name') }} </label>
                                                        <div class="form-group">
                                                            <fieldset class="form-group">
                                                                <select class="form-control" name="CategoryName"
                                                                        id="CategoryName">
                                                                    <option value="" disabled selected >{{ __('restaurantManager.category-name') }}</option>
                                                                    <option value="السلطات">
                                                                        {{ __('restaurantManager.Salads') }}</option>
                                                                    <option value="الحلويات"  >
                                                                        {{ __('restaurantManager.Sweets') }}
                                                                    </option>
                                                                    <option value="البيتزا">
                                                                        {{ __('restaurantManager.Pizza') }}</option>
                                                                    <option value="الشاورما">
                                                                        {{ __('restaurantManager.Shawarma') }}</option>
                                                                    <option value="الوجبات">
                                                                        {{ __('restaurantManager.meals') }}</option>
                                                                    <option value="الساندوتشات">
                                                                        {{ __('restaurantManager.Sandwiches') }}</option>
                                                                    <option value="المشروبات">
                                                                        {{ __('restaurantManager.Drinks') }}</option>
                                                                    <option value="المقبلات">
                                                                        {{ __('restaurantManager.Appetizers') }}</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                        @error('CategoryName')
                                                        <small
                                                            class="form-text text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn grey btn-outline-secondary"
                                                            data-dismiss="modal">{{ __('restaurantManager.close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-outline-warning">{{ __('restaurantManager.add') }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end of add modal --}}
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <!-- start table List  -->
                                    <div class="table-responsive">
                                        <table id=""
                                            class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">{{ __('restaurantManager.category-id') }}
                                                    </th>
                                                    <th class="text-center">
                                                        {{ __('restaurantManager.category-name') }}</th>
                                                    <th class="text-center">{{ __('restaurantManager.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $category)
                                                <tr>
                                                    <td class="text-center">
                                                        {{$category->MenuID}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{$category->CategoryType}}
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="dropdown">
                                                            <button id="SearchDrop2" type="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="true"
                                                                class="btn btn-warning dropdown-toggle  dropdown-menu-right "><i
                                                                    class="ft-settings"></i></button>
                                                            <span aria-labelledby="SearchDrop2"
                                                                class="dropdown-menu mt-1 dropdown-menu-left">
                                                                <a class="dropdown-item primary" data-toggle="modal"
                                                                    data-target="#edit_form"><i
                                                                        class="ft-edit-2 primary"></i>
                                                                    {{ __('admins.edit') }}</a>
                                                                <a href="{{route('RM_delete_category',$category->MenuID)}}" class="dropdown-item danger">
                                                                    <i class="ft-trash-2 danger"></i>
                                                                    {{ __('admins.delete') }}</a>
                                                            </span>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <div class="modal fade text-left" id="edit_form" tabindex="-1"
                                                     role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true"
                                                     data-backdrop="false" outsidedata-backdrop="false">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary white">
                                                                <h4 class="modal-title white" id="myModalLabel12">
                                                                    {{ __('restaurantManager.edit-category') }}
                                                                </h4>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{route('RM_update_category',$category->MenuID)}}" method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <h5><i class="la la-arrow-right"></i>
                                                                        {{ __('restaurantManager.edit-form-header') }}
                                                                    </h5>
                                                                    <hr>
                                                                    <label>{{ __('restaurantManager.category-name') }}</label>
                                                                    <div class="form-group">
                                                                        <fieldset class="form-group">
                                                                            <select class="form-control" name="CategoryName" id="CategoryName">
                                                                                <option value="السلطات" @if($category->CategoryType =='السلطات')selected @endif >{{ __('restaurantManager.Salads') }}</option>
                                                                                <option value="الحلويات" @if($category->CategoryType =='الحلويات')selected @endif>{{ __('restaurantManager.Sweets') }}</option>
                                                                                <option value="البيتزا"@if($category->CategoryType =='البيتزا')selected @endif >{{ __('restaurantManager.Pizza') }}</option>
                                                                                <option value="الشاورما" @if($category->CategoryType =='الشاورما')selected @endif>{{ __('restaurantManager.Shawarma') }}</option>
                                                                                <option value="الوجبات" @if($category->CategoryType =='الوجبات')selected @endif>{{ __('restaurantManager.meals') }}</option>
                                                                                <option value="الساندوتشات" @if($category->CategoryType =='الساندوتشات')selected @endif>{{ __('restaurantManager.Sandwiches') }}</option>
                                                                                <option value="المشروبات"@if($category->CategoryType =='المشروبات')selected @endif >{{ __('restaurantManager.Drinks') }}</option>
                                                                                <option value="المقبلات" @if($category->CategoryType =='المقبلات')selected @endif>{{ __('restaurantManager.Appetizers') }}</option>
                                                                            </select>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                            class="btn grey btn-outline-secondary"
                                                                            data-dismiss="modal">{{ __('restaurantManager.close') }}</button>
                                                                    <button type="submit"
                                                                            class="btn btn-outline-primary">{{ __('restaurantManager.edit') }}
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
{{--    create--}}
    @if (Session::has('create_msg_Category_Meal'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('create_msg_Category_Meal') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('create_msg_Category_Meal') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
{{--    update--}}
    @if (Session::has('update_msg_Category_Meal'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('update_msg_Category_Meal') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('update_msg_Category_Meal') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
{{--    not found--}}
    @if (Session::has('not_found_msg_Category'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.error('{{ Session::get('not_found_msg_Category') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.error('{{ Session::get('not_found_msg_Category') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
{{--    delete--}}
    @if (Session::has('delete_msg_Category'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('delete_msg_Category') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('delete_msg_Category') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
@endsection
