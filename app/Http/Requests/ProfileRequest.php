<?php

namespace App\Http\Requests;

use App\Rules\cpf;
use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'max:50', new FullName() ],
            'social_name' => ['required', 'max:50', new FullName() ],
            'nickname' => ['required', 'max:30' ],
            'birth' => ['required', 'date','before:today' ],
            'social_security_number' => ['required', 'max:20', new cpf() ],
            'zip_code' => ['required', 'max:08' ],
            'address' => ['required', 'string', 'max:70' ],
            'number' => ['required', 'string', 'max:10' ],
            'complement' => ['nullable', 'string', 'max:30' ],
            'neighborhood' => ['required', 'max:30' ],
            'city' => ['required', 'string', 'max:50' ],
            'state' => ['required', 'string', 'max:2' ],
            'telephone' => ['nullable', 'max:10' ],
            'cell_phone' => ['required', 'max:11' ],
            'whatsapp' => ['nullable', 'max:11' ],
            'telegram' => ['nullable', 'max:11' ],
            'facebook' => ['required', 'string', 'max:80' ],
            'instagram' => ['required', 'string', 'max:80' ],
            'twitter' => ['required', 'string', 'max:80' ],
            'linkedin' => ['required', 'string', 'max:80' ],
            'email' => ['max:255', 'email',"unique:users,email,{$this->id}"],
            'password' => ['nullable', 'min:8', 'confirmed'],
            'profile_note' => ['nullable', 'string']
        ];
    }
    public function attributes()
    {
        {
            return[
                'name' => __('Name'),
                'social_name' => __('Social name'),
                'nickname' => __('Nick name'),
                'birth' => __('Birth'),
                'social_security_number' => __('Social security number'),
                'zip_code' => __('Zip code'),
                'address' => __('Address'),
                'number' => __('Number'),
                'complement' => __('Complement'),
                'neighborhood' => __('Neighborhood'),
                'city' => __('City'),
                'state' => __('State'),
                'telephone' => __('Telephone'),
                'cell_phone' => __('Cell Phone'),
                'whatsapp' => __('Whatsapp'),
                'telegram' => __('Telegram'),
                'facebook' => __('Facebook'),
                'instagram' => __('Instagram'),
                'twitter' => __('Twitter'),
                'linkedin' =>  __('LinkedIn'),
                'email' => __('Email'),
                'password' => __('Password'),
                'profile_note' => __('Note')
            ];
        }
    }

}
