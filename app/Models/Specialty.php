<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'suspended'
    ];
    //relationships
    public function professionals()
    {
        return $this->belongsTo(professional::class);
    }
    //mutators
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = ucfirst(strtolower($value));
    }
}
