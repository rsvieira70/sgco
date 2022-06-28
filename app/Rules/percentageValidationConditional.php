<?php

namespace App\Rules;

use App\Class\RemoveFormat;
use Illuminate\Contracts\Validation\Rule;

class percentageValidationConditional implements Rule
{
    private $column;
    public function __construct($column)
    {
        $this->column = $column;
    }

    public function passes($attribute, $value)
    {
        $percentage = app(removeFormat::class)->removeFormatValue($value);
        if ($this->column == false)
            return true;
        return $percentage >= 0.01 && $percentage <= 100;
    }

    public function message()
    {
        return __('The :attribute must be between 0,01% and 100,00%');
    }
}
