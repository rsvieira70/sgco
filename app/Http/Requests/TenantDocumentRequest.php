<?php

namespace App\Http\Requests;

use App\Rules\TenantUnique;
use Illuminate\Foundation\Http\FormRequest;

class TenantDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' =>  ['required', 'string', 'min:3', 'max:50', new TenantUnique('tenant_documents', $this->id)],
            'image' => ['required', 'max:1024', new TenantUnique('tenant_documents', $this->id)],
        ];
    }
    public function attributes()
    { {
            return [
                'description' =>  __('Description') ,
                'image' => __('Document'),
            ];
        }
    }
}
