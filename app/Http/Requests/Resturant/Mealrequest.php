<?php

namespace App\Http\Requests\Resturant;

use Illuminate\Foundation\Http\FormRequest;

class Mealrequest extends FormRequest
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
            'MealName'=>'required',
            'MealLogo'=>'required',
            'MenuID'=>'required',
            'Price'=>'required|numeric|min:1||max:100',
            'AbilityToOrder'=>'required',
            'Description'=>'required',
            'Ingredients'=>'required',
            'EstimateFinishTime'=>'required|numeric|min:5||max:60',
            'Offer'=>'nullable|numeric||min:1||max:90',
        ];
    }
    public function messages()
    {
        return [
    'MealName.required'=>__('restaurantManager.meal_name_messages'),
    'MealLogo.required'=>__('restaurantManager.meal_logo_messages'),
    'MenuID.required'=>__('restaurantManager.meal_menuid_messages'),
    'Price.required'=>__('restaurantManager.meal_price_messages'),
    'Price.numeric'=>__('restaurantManager.meal_price_numeric_messages'),
    'AbilityToOrder.required'=>__('restaurantManager.meal_abilitytoorder_messages'),
    'Description.required'=>__('restaurantManager.meal_description_messages'),
    'EstimateFinishTime.required'=>__('restaurantManager.meal_estimate_finish_time_messages'),
    'EstimateFinishTime.numeric'=>__('restaurantManager.meal_estimate_finish_time_numeric_messages'),
    'EstimateFinishTime.min'=>__('restaurantManager.meal_estimate_finish_time_min_messages'),
    'EstimateFinishTime.max'=>__('restaurantManager.meal_estimate_finish_time_max_messages'),
    'Price.min'=>__('restaurantManager.meal_price_min_messages'),
    'Price.max'=>__('restaurantManager.meal_price_max_messages'),
    'Ingredients.required'=>__('restaurantManager.meal_ingredients_messages'),
    'Offer.numeric'=>__('restaurantManager.meal_offer_numeric_messages'),
    'Offer.min'=>__('restaurantManager.meal_offer_min_messages'),
    'Offer.max'=>__('restaurantManager.meal_offer_max_messages'),

        ];
    }
}
