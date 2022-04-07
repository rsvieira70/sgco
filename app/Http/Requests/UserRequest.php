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
            'email' => ['required', 'max:255', 'email','unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed']
        ];
    }

    public function attributes()
    {
        {
            return[
                'name' => 'nome completo',
                'email' => 'e-mail',
                'password' => 'senha de acesso'
            ];
        }
    }
}
