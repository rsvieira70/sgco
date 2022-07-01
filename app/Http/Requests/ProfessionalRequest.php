<?php

namespace App\Http\Requests;

use App\Rules\cpf;
use App\Rules\FullName;
use App\Rules\TenantUnique;
use Illuminate\Foundation\Http\FormRequest;

class ProfessionalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'patent' => ['nullable', 'string'],
            'name' => ['required', 'max:50', new FullName()],
            'social_name' => ['required', 'max:50', new FullName()],
            'nickname' => ['required', 'max:30'],
            'birth' => ['required', 'date', 'before:today'],
            'inbde' => ['required', 'max:30'],
            'inbde_state_id' => ['required', 'min:1'],
            'social_security_number' => ['required', 'max:20', new cpf()],
            'image' => ['nullable', 'image', 'max:1024'],
            'zip_code' => ['required', 'max:09'],
            'address' => ['required', 'string', 'max:70'],
            'house_number' => ['required', 'string', 'max:10'],
            'complement' => ['nullable', 'string', 'max:30'],
            'neighborhood' => ['required', 'max:30'],
            'city' => ['required', 'string', 'max:50'],
            'state' => ['required', 'string', 'max:2'],
            'dceu' => ['required', 'max:7'],
            'telephone' => ['nullable', 'max:15'],
            'cell_phone' => ['required', 'max:16'],
            'whatsapp' => ['nullable', 'max:16'],
            'telegram' => ['nullable', 'max:16'],
            'facebook' => ['nullable', 'string', 'max:80'],
            'instagram' => ['nullable', 'string', 'max:80'],
            'twitter' => ['nullable', 'string', 'max:80'],
            'linkedin' => ['nullable', 'string', 'max:80'],
            'registration_date' => ['required', 'date'],
            'responsible_dentist' => ['nullable', new TenantUnique('professionals', $this->id)],
            'note' => ['nullable', 'string'],
            'email' => ['max:255', 'email', "unique:professionals,email,{$this->id}"]
        ];
    }
    public function attributes()
    {
        return [
            'patent' => __('Patent'),
            'social_name' => __('Social name'),
            'nickname' => __('Nick name'),
            'birth' => __('Birth'),
            'inbde' => __('INBDE'),
            'inbde_state_id' => __('INBDE state'),
            'social_security_number' => __('Social security number'),
            'image' => __('Photo'),
            'zip_code' => __('Zip code'),
            'address' => __('Address'),
            'house_number' => __('Number'),
            'complement' => __('Complement'),
            'neighborhood' => __('Neighborhood'),
            'city' => __('City'),
            'state' => __('State'),
            'dceu' => __('DCEU'),
            'telephone' => __('Telephone'),
            'cell_phone' => __('Cell Phone'),
            'whatsapp' => __('Whatsapp'),
            'telegram' => __('Telegram'),
            'facebook' => __('Facebook'),
            'instagram' => __('Instagram'),
            'twitter' => __('Twitter'),
            'linkedin' =>  __('LinkedIn'),
            'registration_date' => __('registration_date'),
            'responsible_dentist' => __('responsible_dentist'),
            'note' => __('Note'),
            'email' => __('email'),
        ];
    }
}
