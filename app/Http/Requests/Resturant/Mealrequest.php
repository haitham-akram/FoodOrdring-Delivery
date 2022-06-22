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
            'Price'=>'required',
            'AbilityToOrder'=>'required',
            'Description'=>'required',
            'CategorytypeID'=>'required'
        ];
    }
    public function messages()
    {
        return [
    'MealName.required'=>__('resturantManager.meal_name_messages'),
    'MealLogo.required'=>__('resturantManager.meal_logo_messages'),
    'MenuID.required'=>__('resturantManager.meal_menuid_messages'),
    'Price.required'=>__('resturantManager.meal_price_messages'),
    'AbilityToOrder.required'=>__('resturantManager.meal_abilitytoorder_messages'),
    'Description.required'=>__('resturantManager.meal_description_messages'),
    'CategorytypeID.required'=>__('resturantManager.meal_categoryid_messages'),

        ];
    }
}
