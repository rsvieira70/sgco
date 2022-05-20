<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class Profile extends Model
{
    protected $table = 'users';
    use TenantTrait;

    protected $fillable = [
        'name',
        'social_name',
        'nickname',
        'social_security_number',
        'birth',
        'image',
        'zip_code',
        'address',
        'house_number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'ibge',
        'telephone',
        'cell_phone',
        'whatsapp',
        'telegram',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'profile_note',
        ];

    public static function boot(){
        parent::boot();
        self::creating(function($model){
            $model->uuid = Str::uuid();
        });
    }

    //mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }
    public function setSocialNameAttribute($value)
    {
        $this->attributes['social_name'] = ucwords(strtolower($value));
    }
    public function setNickNameAttribute($value)
    {
        $this->attributes['nickname'] = ucwords(strtolower($value));
    }
    
    public function setSocialSecurityNumberAttribute($value)
    {
        $this->attributes['social_security_number'] = preg_replace("/\D/","", $value);
    }
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
    public function setTelephoneAttribute($value)
    {
        $this->attributes['telephone'] = preg_replace("/\D/","", $value);
    }
    public function setCellPhoneAttribute($value)
    {
        $this->attributes['cell_phone'] = preg_replace("/\D/","", $value);
    }
    public function setWhatsAppAttribute($value)
    {
        $this->attributes['whatsapp'] = preg_replace("/\D/","", $value);
    }
    public function setTelegramAttribute($value)
    {
        $this->attributes['telegram'] = preg_replace("/\D/","", $value);
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
    public function setLinkedInlAttribute($value)
    {
        $this->attributes['linkedin'] = strtolower($value);
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
    //

    //relationships
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

}
