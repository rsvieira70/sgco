<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nomesocial',
        'nomereduzido',
        'datanascimento',
        'cpf',
        'imagem',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'complemento',
        'estado',
        'cidade',
        'ibge',
        'facebook',
        'instagran',
        'twitter',
        'linkedin',
        'telefone',
        'celular',
        'whatsapp',
        'aceitacomunicacao',
        'observacao'
    ];
    //relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
