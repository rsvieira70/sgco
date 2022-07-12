<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionalCertificateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'professional_id' => ['required', 'min:1'],
            'certificate' =>  ['required', 'string', 'min:3'],
            'certificate_unit' =>  ['required', 'string', 'min:3'],
            'certification_date' => ['required', 'date', 'before:today'],
            'document' => ['required', 'max:1024'],
            'document_type' =>  ['nullable'],
        ];
    }
    public function attributes()
    {
        return [
            'professional_id' => __('Professional'),
            'certificate' =>  __('Certificate'),
            'certificate_unit' =>  __('Certificate unit'),
            'certificate_date' =>  __('Certificate date'),
            'document' => __('Document'),
            'document_type' => __('Document type'),
        ];
    }
}
