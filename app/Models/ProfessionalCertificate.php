<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalCertificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'professional_id',
        'certificate',
        'certification_unit',
        'certification_date',
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
    public function setCertificateAttribute($value)
    {
        $this->attributes['certificate'] = ucfirst(strtolower($value));
    }
    public function setCertificateUnitAttribute($value)
    {
        $this->attributes['certificate_unit'] = ucfirst(strtolower($value));
    }
    public function setdocumentTypeAttribute($value)
    {
        $this->attributes['document_type'] = strtoupper($value);
    }
}
