<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' =>  ['required', 'max:60' ],
            'user_type' => ['required'],
            'department_id' => ['required', 'min:1'],
            'position_id' => ['required', 'min:1'],
            'position_id' => ['required', 'min:1'],
            'registration_date' => ['required', 'date' ],
            'email' => ['required', 'max:255', 'email','unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'user_note' => ['nullable', 'string']
        ];
    }

    public function attributes()
    {
        {
            return[
                'name' => 'nome completo',
                'user_type' => 'tipo de usuário',
                'department_id' => 'departamento',
                'position_id' => 'cargo',
                'registration_date' => 'data de registro',
                'email' => 'e-mail',
                'password' => 'senha de acesso',
                'user_note' => 'observação'
            ];
        }
    }
}
