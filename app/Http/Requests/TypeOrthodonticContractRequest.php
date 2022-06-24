<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeOrthodonticContractRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' =>  ['required', 'string', 'min:3', 'max:50', "unique:type_orthodontic_contracts,description,{$this->id}"],
            'receive_bracket' => ['nullable'],
            'amount_orthodontic_bracket' => ['nullable'],
            'orthodontic_bracket_price' => ['nullable'],
            'receive_band' => ['nullable'],
            'amount_orthodontic_band' => ['nullable'],
            'orthodontic_band_price' => ['nullable'],
            'orthodontic_appliance_price' => ['nullable'],
            'Orthodontic_appliance_installation_price' => ['nullable'],
            'Orthodontic_appliance_maintenance_price' => ['nullable'],
            'fixed_value_contract' => ['nullable']
        ];
    }
    public function attributes()
    { {
            return [
                'description' =>  __('Description'),
            ];
        }
    }
}
