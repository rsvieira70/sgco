<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class cpfoucnpj implements Rule
{
    public function passes($attribute, $value)
    {
        return (new cpf)->passes($attribute, $value) || (new cnpj)->passes($attribute, $value);
    }
    public function message()
    {
        return  __('Invalid social security number or employer identification number');
    }
}
