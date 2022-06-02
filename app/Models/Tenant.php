<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'social_reason',
        'fancy_name',
        'administrative_responsible ',
        'administrative_responsible_image',
        'technical_responsible',
        'technical_responsible_inbde',
        'technical_responsible_inbde_state',
        'technical_responsible_image',
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
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'employer_identification_number',
        'state_registration',
        'municipal_registration',
        'opening_date',
        'suspension_date'
    ];
    public static function boot(){
        parent::boot();
        self::creating(function($model){
            $model->uuid = Str::uuid();
        });
    }
    //relationships
    public function users() {
        return $this->hasMany(User::class);
    }
    public function profiles() {
        return $this->hasMany(Profile::class);
    }
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
