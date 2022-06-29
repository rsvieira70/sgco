<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = [
        'bank_code',
        'name',
        'short_name',
        'suspended'
    ];

    //mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }
    public function setShortNameAttribute($value)
    {
        $this->attributes['short_name'] = ucwords(strtolower($value));
    }
}
