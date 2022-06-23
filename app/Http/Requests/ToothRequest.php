<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToothRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tooth_code' =>  ['required', 'integer', 'max:3', "unique:teeth,tooth_code,{$this->id}"],
            'tooth_name' =>  ['required', 'string', 'min:3', 'max:50', "unique:teeth,tooth_name,{$this->id}"],
            'image' => ['nullable', 'image', 'max:1024'],
            'mesial' => ['nullable'],
            'distal' => ['nullable'],
            'lingual' => ['nullable'],
            'palatal' => ['nullable'],
            'cervical' => ['nullable'],
            'incisal' => ['nullable'],
            'occlusal' => ['nullable'],
            'buccal' => ['nullable'],
            'multiple_teeth' => ['nullable']
        ];
    }
    public function attributes()
    { {
            return [
                'tooth_code' =>  __('tooth code'),
                'tooth_name' =>  __('tooth name'),
            ];
        }
    }
}