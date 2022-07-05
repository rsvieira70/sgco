<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Council extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'short_name',
        'suspended'
    ];
    //relationships
    public function professionals()
    {
        return $this->belongsTo(professional::class);
    }

    //mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }
    public function setShortNameAttribute($value)
    {
        $this->attributes['short_name'] = strtoupper($value);
    }
}
