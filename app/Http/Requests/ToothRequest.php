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
            'tooth_code' =>  ['required', 'max:3', "unique:teeth,tooth_code,{$this->id}"],
            'tooth_name' =>  ['required', 'string', 'min:3', 'max:50', "unique:teeth,tooth_name,{$this->id}"],
            'mesial' => ['boolean', 'prohibited_unless:multiple_teeth,null'],
            'distal' => ['boolean', 'prohibited_unless:multiple_teeth,null'],
            'lingual' => ['boolean', 'prohibited_unless:multiple_teeth,null'],
            'palatal' => ['boolean', 'prohibited_unless:multiple_teeth,null'],
            'cervical' => ['boolean', 'prohibited_unless:multiple_teeth,null'],
            'incisal' => ['boolean', 'prohibited_unless:multiple_teeth,null'],
            'occlusal' => ['boolean', 'prohibited_unless:multiple_teeth,null'],
            'buccal' => ['boolean', 'prohibited_unless:multiple_teeth,null'],
            'multiple_teeth' => ['boolean']
        ];
    }
    public function attributes()
    {
        return [
            'tooth_code' =>  __('Tooth code'),
            'tooth_name' =>  __('Tooth name'),
            'mesial' => __('Mesial'),
            'distal' =>  __('Distal'),
            'lingual' =>  __('Lingual'),
            'palatal' =>  __('Palatal'),
            'cervical' =>  __('Cervical'),
            'incisal' =>  __('Incisal'),
            'occlusal' =>  __('Occlusal'),
            'buccal' =>  __('Buccal'),
            'multiple_teeth' =>  __('Multiple teeth')
        ];
    }
}
