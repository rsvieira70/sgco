<?php

namespace App\Rules;

use App\Class\RemoveFormat;
use Illuminate\Contracts\Validation\Rule;

class valueValidationConditional implements Rule
{
    private $column;
    public function __construct($column)
    {
        $this->column = $column;
    }

    public function passes($attribute, $value)
    {
        $amount = app(removeFormat::class)->removeFormatValue($value);
        if ($this->column == true)
            return true;
        return $amount >= 0.01;
    }

    public function message()
    {
        return __('The :attribute must be non-zero');
    }
}
