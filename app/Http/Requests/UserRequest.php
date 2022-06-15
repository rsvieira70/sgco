<?php

namespace App\Http\Requests;

use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TenantUnique;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' =>  ['required', 'max:50', new FullName ],
            'user_type' => ['required'],
            'department_id' => [ 'required', 'min:1'],
            'position_id' => ['required', 'min:1'],
            'registration_date' => ['required', 'date' ],
            'email' => ['max:255', 'email',"unique:users,email,{$this->id}"],
            'password' => ['required', 'min:8', 'confirmed'],
            'user_note' => ['nullable', 'string'],
            'administrative_responsible' =>['nullable', new TenantUnique('users', $this->id)]
        ];
    }

    public function attributes()
    {
        {
            return[
                'name' => __('Name'),
                'user_type' => __('User type'),
                'department_id' => __('Department'),
                'position_id' => __('Position'),
                'registration_date' => __('Registration date'),
                'email' => __('Email'),
                'password' => __('Password'),
                'user_note' => __('Note'),
                'administrative_responsible' => __('Administrative responsible')
            ];
        }
    }
}
