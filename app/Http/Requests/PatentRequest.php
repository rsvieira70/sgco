<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' =>  ['required', 'string', 'min:3', 'max:100', "unique:patents,name,{$this->id}"],
            'short_name' =>  ['required', 'string', 'min:1', 'max:10', "unique:patents,short_name,{$this->id}"]
        ];
    }
    public function attributes()
    {
        return [
            'name' =>  __('Patent name'),
            'short_name' => __('Patent short name')
        ];
    }
}
