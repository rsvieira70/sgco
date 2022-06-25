<?php

namespace App\Models;

use App\Class\RemoveFormat;
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
        'orthodontic_appliance_installation_price',
        'orthodontic_appliance_maintenance_price',
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
    public function setOrthodonticBracketPriceAttribute($value)
    {
        $this->attributes['orthodontic_bracket_price'] = removeFormat::class::removeFormatValue($value);
    }
    public function setOrthodonticBandPriceAttribute($value)
    {
        $this->attributes['orthodontic_band_price'] = RemoveFormat::class::removeFormatValue($value);
    }
    public function setOrthodonticAppliancePriceAttribute($value)
    {
        $this->attributes['orthodontic_appliance_price'] = RemoveFormat::class::removeFormatValue($value);
    }
    public function setOrthodonticApplianceInstallationPriceAttribute($value)
    {
        $this->attributes['orthodontic_appliance_installation_price'] = RemoveFormat::class::removeFormatValue($value);
    }
    public function setOrthodonticApplianceMaintenancePriceAttribute($value)
    {
        $this->attributes['orthodontic_appliance_maintenance_price'] = RemoveFormat::class::removeFormatValue($value);
    }
}
