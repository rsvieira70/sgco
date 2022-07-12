<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionalDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'professional_id' => ['required', 'min:1'],
            'description' =>  ['required', 'string', 'min:3', 'max:50'],
            'document' => ['required', 'max:1024'],
            'document_type' =>  ['nullable'],
        ];
    }
    public function attributes()
    {
        return [
            'professional_id' => __('Professional'),
            'description' =>  __('Description'),
            'document' => __('Document'),
            'document_type' => __('Document type'),
        ];
    }
}
