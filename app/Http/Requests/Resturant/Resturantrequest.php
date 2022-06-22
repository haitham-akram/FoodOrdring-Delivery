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
            // 'Rate'=>'required',
            'CategoriesID'=>'required',
            'Logo'=>'required',
            'OpiningTime'=>'required',
            'ClosingTime'=>'required',
            'AvailableStatus'=>'required',
            // 'CustomerFeedBackID'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'RestaurantName.required'=>__('resturantManager.resturant_name_messages'),
            'Governorate.required'=>__('resturantManager.res_governorate_messages'),
            'Neighborhood.required'=>__('resturantManager.res_neighborhood_messages'),
            'StreetName.required'=>__('resturantManager.res_streetName_messages'),
            'NavigationalMark.required'=>__('resturantManager.res_navigationalMark_messages'),
            // 'Rate.required'=>__('resturantManager.resturantrate_messages'),
            'CategoriesID.required'=>__('resturantManager.res_categoryid_messages'),
            'Logo.required'=>__('resturantManager.res_logo_messages'),
            'OpiningTime.required'=>__('resturantManager.res_opining_time_messages'),
            'ClosingTime.required'=>__('resturantManager.res_closing_time_messages'),
            'AvailableStatus.required'=>__('resturantManager.res_available_status_messages'),
            // 'CustomerFeedBackID.required'=>__('resturantManager.res_customer_feedBackid_messages'),

        ];
    }
}
