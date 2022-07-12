<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalDocument extends Model
{
    use TenantTrait;
    use HasFactory;
    protected $fillable = [
        'professional_id',
        'description',
        'document',
        'document_type'
    ];
    //relationships
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }
    //mutators
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = ucfirst(strtolower($value));
    }
    public function setdocumentTypeAttribute($value)
    {
        $this->attributes['document_type'] = strtoupper($value);
    }
}
