<?php

namespace App\Http\Requests;

use App\Rules\FullName;
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
            'social_reason' => ['required', 'max:50', new FullName() ],
            'fancy_name' => ['required', 'max:50' ],
            'administrative_responsible' => ['required', 'max:50', new FullName() ],
            'administrative_responsible_image' => ['nullable', 'image', 'max:1024'],
            'technical_responsible' => ['required', 'max:50', new FullName() ],
            'technical_responsible_inbde' => ['required', 'max:20', new FullName() ],
            'technical_responsible_inbde_state' => ['required', 'max:2', new FullName() ],
            'technical_responsible_image' => ['nullable', 'image', 'max:1024'],
            'zip_code' => ['required', 'max:09' ],
            'address' => ['required', 'string', 'max:70' ],
            'house_number' => ['required', 'string', 'max:10' ],
            'complement' => ['nullable', 'string', 'max:30' ],
            'neighborhood' => ['required', 'max:30' ],
            'city' => ['required', 'string', 'max:50' ],
            'state' => ['required', 'string', 'max:2' ],
            'dceu' => ['required', 'max:7' ],
            'website' => ['max:255', 'url',"unique:tenants,website,{$this->id}"],
            'email' => ['max:255', 'email',"unique:tenants,email,{$this->id}"],
            'telephone' => ['nullable', 'max:15' ],
            'cell_phone' => ['required', 'max:16' ],
            'whatsapp' => ['nullable', 'max:16' ],
            'telegram' => ['nullable', 'max:16' ],
            'facebook' => ['nullable', 'string', 'max:80' ],
            'instagram' => ['nullable', 'string', 'max:80' ],
            'twitter' => ['nullable', 'string', 'max:80' ],
            'linkedin' => ['nullable', 'string', 'max:80' ],
            'employer_identification_number' => ['required', 'max:20', new cpf() ],
            'state_registration' => ['required', 'max:20', new cpf() ],
            'municipal_registration' => ['required', 'max:20', new cpf() ],
            'opening_date' => ['required', 'date','before:today' ],
            'note' => ['nullable', 'string']

        ];
    }
    public function attributes()
    { {
            return [
                'social_reason' =>  __('social reason') ,
                'fancy_name' =>  __('fancy name') ,
                'administrative_responsible' => __('administrative responsible'),
                'administrative_responsible_image' => __('administrative responsible image'),
                'technical_responsible' => __('technical responsible'),
                'technical_responsible_inbde' => __('technical responsible inbde'),
                'technical_responsible_inbde_state' => __('technical responsible inbde state'),
                'technical responsible_image' => __('technical responsible image'),
                'zip_code' => __('Zip code'),
                'address' => __('Address'),
                'house_number' => __('Number'),
                'complement' => __('Complement'),
                'neighborhood' => __('Neighborhood'),
                'city' => __('City'),
                'state' => __('State'),
                'dceu' => __('DCEU'),
                'website' => __('website'),
                'email' => __('email'),
                'telephone' => __('Telephone'),
                'cell_phone' => __('Cell Phone'),
                'whatsapp' => __('Whatsapp'),
                'telegram' => __('Telegram'),
                'facebook' => __('Facebook'),
                'instagram' => __('Instagram'),
                'twitter' => __('Twitter'),
                'linkedin' =>  __('LinkedIn'),
                'employer_identification_number' => __('employer identification number'),
                'state_registration' => __('state registration'),
                'municipal_registration' => __('municipal registration'),
                'opening_date' => __('opening_date'),
                'note' => __('Note')

            ];
        }
    }
}
