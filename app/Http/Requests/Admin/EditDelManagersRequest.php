<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditDelManagersRequest extends FormRequest
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
            'NameOfDeliveryOffice'=>'required',
            'PhoneNumber1'=>'required||min:10||max:10',
            'PhoneNumber2'=>'nullable|min:10||max:10',
                ];
    }
    public function messages()
    {
        return [
            'FirstName.required'=>__('delivery.del_first_name_messages'),
            'LastName.required'=>__('delivery.del_last_name_messages'),
            'Email.required'=>__('delivery.del_email_messages'),
            'Email.email'=>__('delivery.del_email_email_messages'),
            'NameOfDeliveryOffice.required'=>__('delivery.message_for_name'),
            'PhoneNumber1.required'=>__('delivery.delivery_required_phone_messages'),
            'PhoneNumber1.max'=>__('delivery.delivery_max_phone_messages'),
            'PhoneNumber1.min'=>__('delivery.delivery_min_phone_messages'),
            'PhoneNumber2.max'=>__('delivery.delivery_max_phone2_messages'),
            'PhoneNumber2.min'=>__('delivery.delivery_min_phone2_messages'),
        ];
    }
}
