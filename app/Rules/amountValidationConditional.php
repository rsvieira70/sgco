<?php

namespace App\Rules;

use App\Class\RemoveFormat;
use Illuminate\Contracts\Validation\Rule;

class amountValidationConditional implements Rule
{
    private $column;
    public function __construct($column)
    {
        $this->column = $column;
    }

    public function passes($attribute, $value)
    {
        $amount = app(removeFormat::class)->removeFormatValue($value);
        if ($this->column == false )
            return true;
        return $amount >= 1;
    }

    public function message()
    {
        return __('The :attribute must be non-zero');
    }
}
