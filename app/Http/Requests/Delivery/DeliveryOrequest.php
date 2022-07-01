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
            'Governorate'=>'required',//3
            'Neighborhood'=>'required',//4
            'StreetName'=>'required',//2
            'NavigationalMark'=>'required',//5
            'NameOfDeliveryOffice'=>'required',//1
            'Logo'=>'required',
            'OpiningTime'=>'required',//6
            'ClosingTime'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'Governorate.required'=>__('delivery.message_for_Governorate'),
            'Neighborhood.required'=>__('delivery.message_for_Neighborhood'),
            'StreetName.required'=>__('delivery.message_for_StreetName'),
            'NavigationalMark.required'=>__('delivery.message_for_NavigationalMark'),
            'NameOfDeliveryOffice.required'=>__('delivery.message_for_name'),
            'Logo.required'=>__('delivery.message_for_Logo'),
            'OpiningTime.required'=>__('delivery.message_for_OpiningTime'),
            'ClosingTime.required'=>__('delivery.message_for_ClosingTime'),
        ];
    }
}
