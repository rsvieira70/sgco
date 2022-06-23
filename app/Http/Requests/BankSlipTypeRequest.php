<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankSlipTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' =>  ['required', 'string', 'min:3', 'max:50', "unique:bank_slip_types,description,{$this->id}"],
            'pay_commission' => ['nullable'],
            'issue_invoice' => ['nullable'],
            'used_financial_agreement' => ['nullable'],
            'pay_receipt' => ['nullable']
        ];
    }
    public function attributes()
    { {
            return [
                'description' =>  __('Description')
            ];
        }
    }
}
