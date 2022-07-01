@extends('layouts.restaurantManagerLayout')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('restaurantManager.add-new-offer') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('RM_Home')}}">{{ __('restaurantManager.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('RM_add_offer') }}">{{ __('restaurantManager.add-new-offer') }}</a>
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
                                    <h3 class="form-section"><i class="la la-tag font-large-1"></i>
                                        {{ __('restaurantManager.offer-info') }}
                                    </h3>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" method="post" action="{{route('RM_store_offer')}}">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- category id field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="header">{{ __('restaurantManager.category-name') }}</label>
                                                            <fieldset class="form-group">
                                                                <select class="form-control" name="CategoryID"
                                                                        id="CategoryID">
                                                                    <option value="" disabled selected >{{ __('restaurantManager.category-name') }}</option>
                                                                    @foreach($categories as $category)
                                                                        <option value="{{$category->MenuID}}" >{{$category->CategoryType}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('CategoryID')
                                                                <small
                                                                    class="form-text text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                <div class="col-md-6">
                                                    {{-- meal ID Field --}}
                                                    <div class="form-group">
                                                        <label for="MealID">{{ __('restaurantManager.meal-name') }}</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-control" name="MealID"
                                                                    id="MealID">
                                                            </select>
                                                            @error('MealID')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-6">
                                                        {{-- Start date Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="header">{{ __('restaurantManager.date-start') }}</label>
                                                            <input type="datetime-local" id="DateOfStart" class="form-control"
                                                                name="DateOfStart" data-toggle="tooltip" data-trigger="hover"
                                                                data-placement="top"
                                                                data-title="{{ __('restaurantManager.date-start') }}"
                                                                data-original-title="" title=""
                                                                aria-describedby="tooltip304834">
                                                            @error('DateOfStart')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- End date Field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="header">{{ __('restaurantManager.date-end') }}</label>
                                                            <input type="datetime-local" id="DateOfEnd" class="form-control"
                                                                name="DateOfEnd" data-toggle="tooltip" data-trigger="hover"
                                                                data-placement="top"
                                                                data-title="{{ __('restaurantManager.date-end') }}"
                                                                data-original-title="" title=""
                                                                aria-describedby="tooltip304834">
                                                            @error('DateOfEnd')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-md-12">
                                                        {{-- Discount field --}}
                                                        <div class="form-group">
                                                            <label
                                                                for="DiscountPercentage">{{ __('restaurantManager.discount-precentage') }}</label>
                                                            <input type="text" id="DiscountPercentage"
                                                                class="form-control"
                                                                placeholder="{{ __('restaurantManager.discount-precentage') }}"
                                                                name="DiscountPercentage">
                                                            @error('DiscountPercentage')
                                                            <small
                                                                class="form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Add and Cancel button --}}
                                            <div class="form-actions center">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> {{ __('restaurantManager.cancel') }}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>
                                                    {{ __('restaurantManager.add-offer') }}
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

    {{-- get meal by category--}}
    <script type="text/javascript">
        $("#CategoryID").change(function(){
            $.ajax({
                url: "{{ route('RM_get_Meal') }}?CategoryID=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#MealID').html(data.html);
                }
            });
        });
    </script>
    {{-- create--}}
    @if (Session::has('create_msg_Offer'))
        @if (App::getLocale() == 'ar')
            <script>
                toastr.success('{{ Session::get('create_msg_Offer') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.success('{{ Session::get('create_msg_Offer') }}', '{{ Session::get('success_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
    {{-- offer is found --}}
    @if (Session::has('isFound_msg_Offer'))
        @if (App::getLocale() == 'ar')
            <script>
                // toastr.error('I do not think that word means what you think it means.', 'Inconceivable!');
                toastr.error('{{ Session::get('isFound_msg_Offer') }}', '{{ Session::get('error_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000,
                    positionClass: 'toast-top-left',
                    containerId: 'toast-top-left'
                });
            </script>
        @else
            <script>
                toastr.error('{{ Session::get('isFound_msg_Offer') }}', '{{ Session::get('error_title') }}', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    timeOut: 3000
                });
            </script>
        @endif
    @endif
@endsection
