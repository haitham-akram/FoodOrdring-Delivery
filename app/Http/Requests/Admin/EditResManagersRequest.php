<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditResManagersRequest extends FormRequest
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
            'FirstName'=>'required',
            'LastName'=>'required',
            'Email'=>'required||email',
            'RestaurantName'=>'required',


                ];
    }
    public function messages()
    {
        return [
            'FirstName.required'=>__('resturantManager.res_first_name_messages'),
            'LastName.required'=>__('resturantManager.res_last_name_messages'),
            'Email.required'=>__('resturantManager.res_email_messages'),
            'Email.email'=>__('resturantManager.res_email_email_messages'),
            'RestaurantName.required'=>__('resturantManager.resturant_name_messages'),
        ];
    }
}
