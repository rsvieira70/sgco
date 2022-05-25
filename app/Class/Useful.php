<?php
namespace App\Class;
class Useful
{
    /**
     * Formata uma string segundo a máscara de CPF
     * caso o tamanho da string seja diferente de 11, a string será retornada sem formatação
     * @param string $cpf
     * @return string
     */
    public static function cpf($cpf)
    {
        if (!$cpf) {
            return '';
        }
        if (strlen($cpf) == 11) {
            return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9);
        }
        return $cpf;
    }
    /**------------
     * Formata uma string segundo a máscara de CNPJ
     * caso o tamanho da string seja diferente de 14, a string será retornada sem formatação
     * @param $cnpj
     * @return string
     */
    public static function cnpj($cnpj)
    {
        if (!$cnpj) {
            return '';
        }
        if (strlen($cnpj) == 14) {
            return substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12, 2);
        }
        return $cnpj;
    }
    /**
     * Formata uma string segundo a máscara de telefone
     * caso o tamanho da string seja diferente de 10 ou 11, a string será retornada sem formatação
     * @param string $fone
     * @return string
     */
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
   /**
     * Formata uma string segundo a máscara de CEP
     * caso o tamanho da string seja diferente de 10 ou 11, a string será retornada sem formatação
     * @param string $fone
     * @return string
     */
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