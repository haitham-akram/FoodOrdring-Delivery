<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
            'ReceiverID'=>'required',
            'Header'=>'required',
            'Description'=>'required',
            'TypeOfNotification'=>'required||max:10||min:10',
                ];
    }
    public function messages()
    {
        return [
    'ReceiverID.required'=>__('admins.admin_ReceiverID_messages'),
    'Header.required'=>__('admins.admin_Header_messages'),
    'Description.required'=>__('admins.admin_Description_messages'),
    'TypeOfNotification.required'=>__('admins.admin_TypeOfNotification_messages'),

        ];
    }
}
