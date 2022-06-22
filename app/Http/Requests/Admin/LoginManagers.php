<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginManagers extends FormRequest
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
            'Email'=>'required',
            'Password'=>'required||min:8||max:30'
        ];
    }
    public function messages()
    {
        return [
            'Email.required'=>__('admins.log_required_email_messages'),
            'Password.required'=>__('admins.log_required_password_messages'),
            'Password.max'=>__('admins.log_max_password_messages'),
            'Password.min'=>__('admins.log_min_password_messages'),

                ];
    }
}
