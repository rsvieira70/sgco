<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecialtyRequest extends FormRequest
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
                'max:80',
                "unique:specialties,description,{$this->id}"
            ]
        ];
    }
    public function attributes()
    {
        return [
            'description' =>  __('specialty')
        ];
    }
}
