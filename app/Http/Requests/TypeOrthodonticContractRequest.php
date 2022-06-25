<?php

namespace App\Http\Requests;

use App\Rules\ValidatePercentage;
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
            'receive_bracket' => ['boolean'],
            'amount_orthodontic_bracket' => ['required_with:receive_bracket'],
            'orthodontic_bracket_price' => ['required_with:receive_bracket',new ValidatePercentage],
            'receive_band' => ['boolean'],
            'amount_orthodontic_band' => ['required_with:receive_band'],
            'orthodontic_band_price' => ['required_with:receive_band',new ValidatePercentage],
            'orthodontic_appliance_price' => ['nullable'],
            'orthodontic_appliance_installation_price' => ['nullable'],
            'orthodontic_appliance_maintenance_price' => ['nullable'],
            'fixed_value_contract' => ['nullable']
        ];
    }
    public function attributes()
    { {
            return [
                'description' =>  __('type orthodontic contract'),
                'orthodontic_bracket_price' =>  __('Maintenance percentage'),
                'orthodontic_band_price' =>  __('Maintenance percentage'),
            ];
        }
    }
}
