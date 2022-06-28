<?php

namespace App\Class;

class NumberFormat
{
    public static function insertNumberFormat($value)
    {
        if ($value) {
            $result = number_format($value, 2, ',', '.');
        } else {
            $result = $value;
        }
        return $result;
    }
}
