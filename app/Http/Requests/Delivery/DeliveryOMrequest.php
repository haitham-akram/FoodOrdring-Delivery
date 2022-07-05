<?php

namespace App\Http\Requests\Delivery;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryOMrequest extends FormRequest
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
            'Password'=>'required|confirmed|min:8||max:30',
            'Password_confirmation'=>'required||min:8||max:30',
            'PhoneNumber1'=>'required|numeric|min:0560000000||max:0599999999',
            'PhoneNumber2'=>'nullable|numeric|min:0560000000||max:0599999999',
            'NameOfDeliveryOffice'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'FirstName.required'=>__('delivery.delivery_first_name_messages'),
            'LastName.required'=>__('delivery.delivery_last_name_messages'),
            'Email.required'=>__('delivery.delivery_email_messages'),
            'Email.email'=>__('delivery.del_email_email_messages'),
            'Password.required'=>__('delivery.delivery_required_password_messages'),
            'Password.max'=>__('delivery.delivery_max_password_messages'),
            'Password.min'=>__('delivery.delivery_min_password_messages'),
            'Password.confirmed'=>__('delivery.delivery_conf_password_messages'),
            'Password_confirmation.required'=>__('delivery.delivery_required_password_confirmation_messages'),
            'Password_confirmation.max'=>__('delivery.delivery_max_password_messages'),
            'Password_confirmation.min'=>__('delivery.delivery_min_password_messages'),
            'PhoneNumber1.required'=>__('delivery.delivery_required_phone_messages'),
            'PhoneNumber1.max'=>__('delivery.delivery_max_phone_messages'),
            'PhoneNumber1.min'=>__('delivery.delivery_min_phone_messages'),
            'PhoneNumber2.max'=>__('delivery.delivery_max_phone2_messages'),
            'PhoneNumber2.min'=>__('delivery.delivery_min_phone2_messages'),
            'PhoneNumber1.numeric'=>__('delivery.delivery_integer_messages'),
            'PhoneNumber2.numeric'=>__('delivery.delivery_integer_messages'),
            'NameOfDeliveryOffice.required'=>__('delivery.message_for_name'),
        ];
    }
}
