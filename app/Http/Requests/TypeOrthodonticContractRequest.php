<?php

namespace App\Http\Requests;

use App\Rules\amountValidationConditional;
use App\Rules\percentageValidationConditional;
use App\Rules\valueValidationConditional;
use App\Rules\validateConditionalZeroValue;
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
            'amount_orthodontic_bracket' => ['required_with:receive_bracket','prohibitedIf:receive_bracket,null',new amountValidationConditional($this->receive_bracket)],
            'orthodontic_bracket_price' => ['required_with:receive_bracket','prohibitedIf:receive_bracket,null',new percentageValidationConditional($this->receive_bracket)],
            'receive_band' => ['boolean'],
            'amount_orthodontic_band' => ['required_with:receive_band','prohibitedIf:receive_band,null',new amountValidationConditional($this->receive_band)],
            'orthodontic_band_price' => ['required_with:receive_band','prohibitedIf:receive_band,null',new percentageValidationConditional($this->receive_band)],
            'orthodontic_appliance_price' => ['nullable'],
            'orthodontic_appliance_installation_price' => ['nullable'],
            'orthodontic_appliance_maintenance_price' => ['required_without:fixed_value_contract','prohibited_unless:fixed_value_contract,null',new valueValidationConditional($this->fixed_value_contract)],
            'fixed_value_contract' => ['boolean']
        ];
    }
    public function attributes()
    { {
            return [
                'description' =>  __('type orthodontic contract'),
                'receive_bracket' => __('Generate bracket charge'),
                'amount_orthodontic_bracket' => __('Above how many exchanges'),
                'orthodontic_bracket_price' =>  __('Maintenance percentage'),
                'receive_band' => __('Generate band charge'),
                'amount_orthodontic_band' => __('Above how many exchanges'),
                'orthodontic_band_price' =>  __('Maintenance percentage'),
                'orthodontic_appliance_price' => __('Orthodontic appliance price'),
                'orthodontic_appliance_installation_price' => __('Orthodontic appliance installation price'),
                'orthodontic_appliance_maintenance_price' => __('Orthodontic appliance maintenance price'),
                'fixed_value_contract' => __('Fixed value contract'),
                ];
        }
    }
}
