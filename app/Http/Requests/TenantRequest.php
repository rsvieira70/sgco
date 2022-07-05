<?php

namespace App\Http\Requests;

use App\Rules\FullName;
use App\Rules\cnpj;
use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'social_reason' => ['required', 'max:50', new FullName()],
            'fancy_name' => ['required', 'max:50'],
            'zip_code' => ['required', 'max:09'],
            'address' => ['required', 'string', 'max:70'],
            'house_number' => ['required', 'string', 'max:10'],
            'complement' => ['nullable', 'string', 'max:30'],
            'neighborhood' => ['required', 'max:30'],
            'city' => ['required', 'string', 'max:50'],
            'state' => ['required', 'string', 'max:2'],
            'dceu' => ['required', 'max:7'],
            'website' => ['max:255'],
            'email' => ['max:255', 'email', "unique:tenants,email,{$this->id}"],
            'telephone' => ['nullable', 'max:15'],
            'cell_phone' => ['required', 'max:16'],
            'whatsapp' => ['nullable', 'max:16'],
            'telegram' => ['nullable', 'max:16'],
            'facebook' => ['nullable', 'string', 'max:80'],
            'instagram' => ['nullable', 'string', 'max:80'],
            'twitter' => ['nullable', 'string', 'max:80'],
            'linkedin' => ['nullable', 'string', 'max:80'],
            'employer_identification_number' => ['required', 'max:20', new cnpj()],
            'state_registration' => ['required', 'max:20'],
            'municipal_registration' => ['required', 'max:20'],
            'opening_date' => ['required', 'date', 'before:today'],
            'note' => ['nullable', 'string']

        ];
    }
    public function attributes()
    {
        return [
            'social_reason' =>  __('social reason'),
            'fancy_name' =>  __('fancy name'),
            'zip_code' => __('Zip code'),
            'address' => __('Address'),
            'house_number' => __('Number'),
            'complement' => __('Complement'),
            'neighborhood' => __('Neighborhood'),
            'city' => __('City'),
            'state' => __('State'),
            'dceu' => __('DCEU'),
            'website' => __('website'),
            'email' => __('Email'),
            'telephone' => __('Telephone'),
            'cell_phone' => __('Cell Phone'),
            'whatsapp' => __('Whatsapp'),
            'telegram' => __('Telegram'),
            'facebook' => __('Facebook'),
            'instagram' => __('Instagram'),
            'twitter' => __('Twitter'),
            'linkedin' =>  __('LinkedIn'),
            'employer_identification_number' => __('Employer identification number'),
            'state_registration' => __('State registration'),
            'municipal_registration' => __('Municipal registration'),
            'opening_date' => __('Opening date'),
            'note' => __('Note')

        ];
    }
}
