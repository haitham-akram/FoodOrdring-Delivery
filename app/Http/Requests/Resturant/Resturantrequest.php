<?php

namespace App\Http\Requests\Resturant;

use Illuminate\Foundation\Http\FormRequest;

class Resturantrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'RestaurantName'=>'required',
            'Governorate'=>'required',
            'Neighborhood'=>'required',
            'StreetName'=>'required',
            'NavigationalMark'=>'required',
            'CategoriesID'=>'required',
            'Logo'=>'required',
            'OpiningTime'=>'required',
            'ClosingTime'=>'required',
            'AvailableStatus'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'RestaurantName.required'=>__('restaurantManager.resturant_name_messages'),
            'Governorate.required'=>__('restaurantManager.res_governorate_messages'),
            'Neighborhood.required'=>__('restaurantManager.res_neighborhood_messages'),
            'StreetName.required'=>__('restaurantManager.res_streetName_messages'),
            'NavigationalMark.required'=>__('restaurantManager.res_navigationalMark_messages'),
            'CategoriesID.required'=>__('restaurantManager.res_categoryid_messages'),
            'Logo.required'=>__('restaurantManager.res_logo_messages'),
            'OpiningTime.required'=>__('restaurantManager.res_opining_time_messages'),
            'ClosingTime.required'=>__('restaurantManager.res_closing_time_messages'),
            'AvailableStatus.required'=>__('restaurantManager.res_available_status_messages'),


        ];
    }
}
