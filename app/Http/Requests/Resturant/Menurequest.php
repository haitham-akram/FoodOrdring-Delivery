<?php

namespace App\Http\Requests\Resturant;

use Illuminate\Foundation\Http\FormRequest;

class Menurequest extends FormRequest
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
            'RestaurantID '=>'required',
            'CategoryTypeID '=>'required',
        ];
    }
    public function messages()
    {
        return [
            'RestaurantID.required'=>__('resturantManager.menu_resid_messages'),
            'CategoryTypeID.required'=>__('resturantManager.menu_catid_messages'),
            ];
    }
}
