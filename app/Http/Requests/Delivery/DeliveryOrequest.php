<?php

namespace App\Http\Requests\Delivery;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryOrequest extends FormRequest
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
            'NameOfDeliveryOffice'=>'required',
            'Governorate'=>'required',
            'Neighborhood'=>'required',
            'StreetName'=>'required',
            'NavigationalMark'=>'required',
            'OwnerID'=>'required',
            'Logo'=>'required',
            'OpiningTime'=>'required',
            'ClosingTime'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'NameOfDeliveryOffice.required'=>__('delivery.message_for_name'),
            'Governorate.required'=>__('delivery.message_for_Governorate'),
            'Neighborhood.required'=>__('delivery.message_for_Neighborhood'),
            'StreetName.required'=>__('delivery.message_for_StreetName'),
            'NavigationalMark.required'=>__('delivery.message_for_NavigationalMark'),
            'OwnerID.required'=>__('delivery.message_for_ManagerOfDeliveryOfficeID'),
            'Logo.required'=>__('delivery.message_for_Logo'),
            'OpiningTime.required'=>__('delivery.message_for_OpiningTime'),
            'ClosingTime.required'=>__('delivery.message_for_ClosingTime'),
        ];
    }
}
