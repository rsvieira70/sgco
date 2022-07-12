<?php

namespace App\Class;

class ImageExtension
{
    public static function imageextesion($value)
    {
        switch ($value) {
            case 'PDF';
                $result = 'fa-solid fa-file-pdf';
                break;

            case 'DOC';
            case 'DOCX';
                $result = 'fa-solid fa-file-word';
                break;

            case 'XLSX';
            case 'XLS';
                $result = 'fa-solid fa-file-excel';
                break;
            case 'CSV';
                $result = 'fa-solid fa-file-csv';
                break;

            case 'PPT';
                $result = 'fa-solid fa-file-powerpoint';
                break;

            case 'BMP';
            case 'GIF';
            case 'JPG';
            case 'JPEG';
            case 'PNG';
                $result = 'fa-solid fa-file-image';
                break;

            case 'ZIP';
                $result = 'fa-solid fa-file-zipper';
                break;

            case 'MP3';
            case 'WAV';
                $result = 'fa-solid fa-file-audio';
                break;

            case 'AVI';
            case 'MOV';
                $result = 'fa-solid fa-file-video';
                break;
        }




        return $result;
    }
}
