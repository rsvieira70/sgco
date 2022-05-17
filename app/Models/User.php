<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'tenant_id',
        'uuid',
        'name',
        'user_type',
        'department_id',
        'position_id',
        'registration_date',
        'user_note',
        'email',
        'password',
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
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

}
