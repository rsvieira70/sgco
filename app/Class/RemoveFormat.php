<?php

namespace App\Class;

class removeFormat
{
    public static function removeFormatValue($strNumber)
    {
        $strNumber = trim(str_replace("R$", '', $strNumber));
        $vetComma = explode(",", $strNumber);
        if (count($vetComma) == 1) {
            $accents = array(".");
            $result = str_replace($accents, "", $strNumber);
            return $result;
        } else if (count($vetComma) != 2) {
            return $strNumber;
        }
        $strNumber = $vetComma[0];
        $strDecimal = mb_substr($vetComma[1], 0, 2);
        $accents = array(".");
        $result = str_replace($accents, "", $strNumber);
        $result = $result . "." . $strDecimal;
        return $result;
    }
}
