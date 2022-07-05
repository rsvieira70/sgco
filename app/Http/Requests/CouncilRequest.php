<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouncilRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' =>  ['required', 'string', 'min:3', 'max:100', "unique:councils,name,{$this->id}"],
            'short_name' =>  ['required', 'string', 'min:1', 'max:10', "unique:councils,short_name,{$this->id}"]
        ];
    }
    public function attributes()
    {
        return [
            'name' =>  __('Council name'),
            'short_name' => __('Council short name')
        ];
    }
}
