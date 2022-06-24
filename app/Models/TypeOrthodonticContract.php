<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOrthodonticContract extends Model
{
    use HasFactory;
    use TenantTrait;

    protected $fillable = [
        'description',
        'receive_bracket',
        'amount_orthodontic_bracket',
        'orthodontic_bracket_price',
        'receive_band',
        'amount_orthodontic_band',
        'orthodontic_band_price',
        'orthodontic_appliance_price',
        'Orthodontic_appliance_installation_price',
        'Orthodontic_appliance_maintenance_price',
        'fixed_value_contract',
        'suspended',
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
