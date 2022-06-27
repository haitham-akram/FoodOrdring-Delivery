<?php

namespace App\Http\Requests\Resturant;

use Illuminate\Foundation\Http\FormRequest;

class ResturaMrequest extends FormRequest
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
            'Password'=>'required|confirmed|min:8||max:30',
            'Password_confirmation'=>'required||min:8||max:30',
            'PhoneNumber1'=>'required||min:10||max:10',
            'PhoneNumber2'=>'nullable|min:10||max:10',
            'RestaurantName'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'FirstName.required'=>__('restaurantManager.res_first_name_messages'),
            'LastName.required'=>__('restaurantManager.res_last_name_messages'),
            'Email.required'=>__('restaurantManager.res_email_messages'),
            'Email.email'=>__('restaurantManager.res_email_email_messages'),
            'Password.required'=>__('restaurantManager.res_required_password_messages'),
            'Password.max'=>__('restaurantManager.res_max_password_messages'),
            'Password.min'=>__('restaurantManager.res_min_password_messages'),
            'Password.confirmed'=>__('restaurantManager.res_conf_password_messages'),
            'Password_confirmation.required'=>__('restaurantManager.res_required_password_messages'),
            'Password_confirmation.max'=>__('restaurantManager.res_max_password_messages'),
            'Password_confirmation.min'=>__('restaurantManager.res_min_password_messages'),
            'PhoneNumber1.required'=>__('restaurantManager.res_required_phone_messages'),
            'PhoneNumber1.max'=>__('restaurantManager.res_max_phone_messages'),
            'PhoneNumber1_min'=>__('restaurantManager.res_min_phone_messages'),
            'PhoneNumber2.max'=>__('restaurantManager.res_max_phone2_messages'),
            'PhoneNumber2.min'=>__('restaurantManager.res_min_phone2_messages'),
            'RestaurantName.required'=>__('restaurantManager.resturant_name_messages')

        ];
    }
}
