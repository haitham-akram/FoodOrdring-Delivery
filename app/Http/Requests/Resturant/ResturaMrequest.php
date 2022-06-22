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
            'Email'=>'required',
            'Password'=>'required||min:8||max:30',
            'PhoneNumber1'=>'required||min:10||max:10',
            'PhoneNumber2'=>'min:10||max:10',//prove if this did not make a error
        ];
    }
    public function messages()
    {
        return [
            'FirstName.required'=>__('resturantManager.res_first_name_messages'),
            'LastName.required'=>__('resturantManager.res_last_name_messages'),
            'Email.required'=>__('resturantManager.res_email_messages'),
            'Password.required'=>__('resturantManager.res_required_password_messages'),
            'Password.max'=>__('resturantManager.res_max_password_messages'),
            'Password.min'=>__('resturantManager.res_min_password_messages'),
            'PhoneNumber1.required'=>__('resturantManager.res_required_phone_messages'),
            'PhoneNumber1.max'=>__('resturantManager.res_max_phone_messages'),
            'PhoneNumber1_min'=>__('resturantManager.res_min_phone_messages'),
            'PhoneNumber2.max'=>__('resturantManager.res_max_phone2_messages'),
            'PhoneNumber2.min'=>__('resturantManager.res_min_phone2_messages'),

        ];
    }
}
