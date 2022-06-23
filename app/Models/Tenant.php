<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'social_reason',
        'fancy_name',
        'zip_code',
        'address',
        'house_number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'dceu',
        'website',
        'email',
        'telephone',
        'cell_phone',
        'whatsapp',
        'telegram',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'employer_identification_number',
        'state_registration',
        'municipal_registration',
        'opening_date',
        'suspension_date',
        'note'
    ];
    public static function boot(){
        parent::boot();
        self::creating(function($model){
            $model->uuid = Str::uuid();
        });
    }
    //mutators set
    public function setZipCodeAttribute($value)
    {
        $this->attributes['zip_code'] = preg_replace("/\D/","", $value);
    }
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = ucwords(strtolower($value));
    }
    public function setComplementAttribute($value)
    {
        $this->attributes['complement'] = ucwords(strtolower($value));
    }
    public function setNeighborhoodAttribute($value)
    {
        $this->attributes['neighborhood'] = ucwords(strtolower($value));
    }
    public function setCityAttribute($value)
    {
        $this->attributes['city'] = ucwords(strtolower($value));
    }
    public function setStateAttribute($value)
    {
        $this->attributes['state'] = strtoupper($value);
    }
    public function setWebSiteAttribute($value)
    {
        $this->attributes['website'] = strtolower($value);
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
    public function setTelephoneAttribute($value)
    {
        $this->attributes['telephone'] = ($value == null) ? null :  preg_replace("/\D/","", $value);
    }
    public function setCellPhoneAttribute($value)
    {
        $this->attributes['cell_phone'] = ($value == null) ? null :  preg_replace("/\D/","", $value);
    }
    public function setWhatsAppAttribute($value)
    {
        $this->attributes['whatsapp'] = ($value == null) ? null :  preg_replace("/\D/","", $value);
    }
    public function setTelegramAttribute($value)
    {
        $this->attributes['telegram'] = ($value == null) ? null :  preg_replace("/\D/","", $value);
    }
    public function setFacebookAttribute($value)
    {
        $this->attributes['facebook'] = strtolower($value);
    }
    public function setInstagramAttribute($value)
    {
        $this->attributes['instagram'] = strtolower($value);
    }
    public function setTwitterAttribute($value)
    {
        $this->attributes['twitter'] = strtolower($value);
    }
    public function setLinkedInAttribute($value)
    {
        $this->attributes['linkedin'] = strtolower($value);
    }
    public function setEmployerIdentificationNumberAttribute($value)
    {
        $this->attributes['employer_identification_number'] = preg_replace("/\D/","", $value);
    }
    public function setNoteAttribute($value)
    {
        $this->attributes['note'] = ucfirst($value);
    }
    //
    //relationships
    public function users() {
        return $this->hasMany(User::class);
    }
    public function profiles() {
        return $this->hasMany(Profile::class);
    }
    public function tenantDocuments() {
        return $this->hasMany(TenantDocument::class);
    }
}
