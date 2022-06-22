<?php

namespace App\Http\Requests\Resturant;

use Illuminate\Foundation\Http\FormRequest;

class Offerrequest extends FormRequest
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
            'RestaurantID'=>'required',
            'DateOfStart'=>'required',
            'DateOfEnd'=>'required',
            'MealID'=>'required',
            'CategoryID'=>'required',
            'DiscountPercentage'=>'required'
        ];
    }
    public function messages()
    {
        return [
    'RestaurantID.required'=>__('resturantManager.offer_resid_messages'),
    'DateOfStart.required'=>__('resturantManager.date_of_start_messages'),
    'DateOfEnd.required'=>__('resturantManager.date_of_end_messages'),
    'MealID.required'=>__('resturantManager.offer_mealid_messages'),
    'CategoryID.required'=>__('resturantManager.offer_catid_messages'),
    'DiscountPercentage.required'=>__('resturantManager.discountperentage_messages'),

        ];
    }
}
