<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'bank_code' =>  ['required', 'max:3', "unique:banks,bank_code,{$this->id}"],
            'name' =>  ['required', 'string', 'min:3', 'max:100', "unique:banks,name,{$this->id}"],
            'short_name' =>  ['required', 'string', 'min:3', 'max:50', "unique:banks,short_name,{$this->id}"]
        ];
    }
    public function attributes()
    {
        return [
            'bank_code' =>  __('Bank code'),
            'name' =>  __('Bank name'),
            'short_name' => __('Bank short name')
        ];
    }
}
