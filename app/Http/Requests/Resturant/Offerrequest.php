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
            'DateOfStart'=>'required',
            'DateOfEnd'=>'required',
            'MealID'=>'required',
            'CategoryID'=>'required',
            'DiscountPercentage'=>'required|numeric||min:1||max:99'
        ];
    }
    public function messages()
    {
        return [
    'DateOfStart.required'=>__('restaurantManager.date_of_start_messages'),
    'DateOfEnd.required'=>__('restaurantManager.date_of_end_messages'),
    'MealID.required'=>__('restaurantManager.offer_mealid_messages'),
    'CategoryID.required'=>__('restaurantManager.offer_catid_messages'),
    'DiscountPercentage.required'=>__('restaurantManager.discountperentage_messages'),
    'DiscountPercentage.numeric'=>__('restaurantManager.offer_numeric_messages'),
    'DiscountPercentage.min'=>__('restaurantManager.offer_min_messages'),
    'DiscountPercentage.max'=>__('restaurantManager.offer_max_messages'),

        ];
    }
}
