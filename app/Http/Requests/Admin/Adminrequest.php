<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Adminrequest extends FormRequest
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
            'PhoneNumber1'=>'required||max:10||min:10',
            'PhoneNumber2'=>'max:10||min:10',//prove if this did not make a error
            'Password'=>'required||min:8||max:30'
        ];
    }
    public function messages()
    {
        return [
    'FirstName'=>__('admins.admin_first_name_messages'),
    'LastName'=>__('admins.admin_last_name_messages'),
    'Email'=>__('admins.admin_email_messages'),
    'PhoneNumber1.required'=>__('admins.admin_required_phone_messages'),
    'PhoneNumber1.max'=>__('admins.admin_max_phone_messages'),
    'PhoneNumber1.min'=>__('admins.admin_min_phone_messages'),
    'PhoneNumber2.max'=>__('admins.admin_max_phone2_messages'),
    'PhoneNumber2.min'=>__('admins.admin_min_phone2_messages'),
    'Password.min'=>__('admins.admin_min_pass_messages'),
    'Password.max'=>__('admins.admin_max_pass_messages'),
    'Password.required'=>__('admins.admin_required_pass_messages'),

        ];
    }

}
