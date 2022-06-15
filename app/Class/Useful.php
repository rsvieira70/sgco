<?php
namespace App\Class;
class Useful
{
    public static function ssn($ssn)
    {
        if (!$ssn) {
            return '';
        }
        if (strlen($ssn) == 11) {
            return substr($ssn, 0, 3) . '.' . substr($ssn, 3, 3) . '.' . substr($ssn, 6, 3) . '-' . substr($ssn, 9);
        }
        return $ssn;
    }
    public static function ein($ein)
    {
        if (!$ein) {
            return '';
        }
        if (strlen($ein) == 14) {
            return substr($ein, 0, 2) . '.' . substr($ein, 2, 3) . '.' . substr($ein, 5, 3) . '/' . substr($ein, 8, 4) . '-' . substr($ein, 12, 2);
        }
        return $ein;
    }
    public static function phone($phone)
    {
        if (!$phone) {
            return '';
        }
        if (strlen($phone) == 10) {
            return '(' . substr($phone, 0, 2) . ')' . substr($phone, 2, 4) . '-' . substr($phone, 6);
        }
        if (strlen($phone) == 11) {
            return '(' . substr($phone, 0, 2) . ')' . substr($phone, 2, 5) . '-' . substr($phone, 7);
        }
        return $phone; 
    }
    public static function zip_code($zip_code)
    {
        if (!$zip_code) {
            return '';
        }
        if (strlen($zip_code) == 8) {
            return substr($zip_code, 0, 5) . '-' . substr($zip_code, 5, 3) ;
        }
        return $zip_code;
    }
}