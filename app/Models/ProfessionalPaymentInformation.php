<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalPaymentInformation extends Model
{
    use TenantTrait;
    use HasFactory;
    protected $fillable = [
        'professional_id',
        'maintenance_payment_type',
        'maintenance_payment_amount',
        'clinical_payment_type',
        'clinical_payment_amount',
        'fixed_value',
        'cut_off_day_for_payment',
        'day_for_payment',
        'pix_key_type',
        'pix_key',
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
}
