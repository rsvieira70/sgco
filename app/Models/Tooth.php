<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tooth extends Model
{
    use HasFactory;
    protected $fillable = [
        'tooth_code',
        'tooth_name',
        'mesial',
        'distal',
        'lingual',
        'palatal',
        'cervical',
        'incisal',
        'occlusal',
        'buccal',
        'multiple_teeth',
        'suspended'
    ];

    //mutators
    public function setToothNameAttribute($value)
    {
        $this->attributes['tooth_name'] = ucfirst(strtolower($value));
    }
}
