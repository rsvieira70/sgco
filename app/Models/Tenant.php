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
        'administrative_responsibility',
        'responsible_dentist',
        'image',
        'zip_code',
        'address',
        'house_number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'ibge',
        'website',
        'email',
        'telephone',
        'cell_phone',
        'whatsapp',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'cnpj',
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
