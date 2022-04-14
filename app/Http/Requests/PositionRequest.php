<?php

namespace App\Http\Requests;

use App\Rules\TenantUnique;
use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
                new TenantUnique('positions', $this->id)
            ]
        ];
    }
    public function attributes()
    { {
            return [
                'description' =>  __('position') 
            ];
        }
    }
}
