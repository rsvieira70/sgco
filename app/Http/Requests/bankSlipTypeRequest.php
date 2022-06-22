<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bankSlipTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' =>  [
                'required',
                'string',
                'min:3',
                'max:50',
                "unique:bank_slip_types,description,{$this->id}"
            ]
        ];
    }
    public function attributes()
    { {
            return [
                'description' =>  __('Description') 
            ];
        }
    }
}
