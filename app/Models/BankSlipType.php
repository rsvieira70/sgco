<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSlipType extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'pay_commission',
        'issue_invoice',
        'used_financial_agreement',
        'pay_receipt',
        'suspended'
    ];

    //mutators
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = ucfirst(strtolower($value));
    }
}
