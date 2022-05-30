<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'social_reason' =>  [
                'required',
                'string',
                'min:3',
                'max:50'
                
            ]
        ];
    }
    public function attributes()
    { {
            return [
                'social reason' =>  __('social reason') 
            ];
        }
    }
}
