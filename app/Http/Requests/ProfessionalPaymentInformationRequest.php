<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionalPaymentInformationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'professional_id' => ['required', 'min:1'],
            'maintenance_payment_amount' => ['nullable'],
            'clinical_payment_type' => ['required'],
            'clinical_payment_amount' => ['nullable'],
            'fixed_value' => ['nullable'],
            'cut_off_day_for_payment' => ['required'],
            'day_for_payment' => ['required'],
            'pix_key_payment_type' => ['required'],
            'pix_key' => ['nullable'],
        ];
    }
    public function attributes()
    {
        return [
            'maintenance_payment_type' => __('Maintenance payment type'),
            'maintenance_payment_amount' =>  __('Maintenance payment amount'),
            'clinical_payment_type' =>  __('Clinical payment type'),
            'clinical_payment_amount' =>  __('Clinical payment amount'),
            'fixed_value' =>  __('Fixed value'),
            'cut_off_day_for_payment' => __('Cut off day for payment'),
            'day_for_payment' => __('Day for payment'),
            'pix_key' => __('Pix key'),
            'pix_key_type' => __('Pix key type'),
        ];
    }
}
