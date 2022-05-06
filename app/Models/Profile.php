<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class Profile extends Authenticatable
{
    use TenantTrait;
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'social_name',
        'nickname',
        'cpf',
        'birth',
        'image',
        'zip_code',
        'address',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'ibge',
        'telephone',
        'cell_phone',
        'whatsapp',
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

    protected $hidden = [
        'password',
        'remember_token',
    ];
    //mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
    //

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relationships
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    public function departments()
    {
        return $this->belongsTo(Department::class);
    }
    public function positions()
    {
        return $this->belongsTo(Position::class);
    }

}
