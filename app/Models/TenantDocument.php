<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantDocument extends Model
{
    use TenantTrait;
    use HasFactory;
    protected $fillable = [
        'description', 'document'
    ];
    //relationships
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    //mutators
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = ucfirst(strtolower($value));
    }
}
