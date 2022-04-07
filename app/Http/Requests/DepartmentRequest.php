<?php

namespace App\Http\Requests;

use App\Rules\TenantUnique;
use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
                new TenantUnique('departments', $this->id)
            ]
        ];
    }
    public function attributes()
    { {
            return [
                'description' => 'descrição do departamento'
            ];
        }
    }
}
