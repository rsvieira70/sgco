<?php

namespace App\Rules;

use App\Class\RemoveFormat;
use Illuminate\Contracts\Validation\Rule;

class ValidatePercentage implements Rule
{
    private $percentage;

    public function passes($attribute, $value)
    {
        $percentage = app(removeFormat::class)->removeFormatValue($value);
        return $percentage >= 0 && $percentage <= 100;
    }

    public function message()
    {
        return __('The :attribute must be between 0 and 100');
    }
}
