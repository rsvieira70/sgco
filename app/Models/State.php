<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'initials',
        'description',
        'suspended'
    ];
    //relationships
    public function professionals()
    {
        return $this->belongsTo(professional::class, 'inbde_state_id');
    }
    //mutators
    public function setInitialsAttribute($value)
    {
        $this->attributes['initials'] = strtoupper($value);
    }
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = ucwords(strtolower($value));
    }
}
