<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    public function run()
    {
        Position::create( ['description'  => 'ACD',]);
        Position::create( ['description'  => 'Administrador',]);
        Position::create( ['description'  => 'Analista de sistemas',]);
        Position::create( ['description'  => 'Auxiliar de caixa',]);
        Position::create( ['description'  => 'Auxiliar de dentista',]);
        Position::create( ['description'  => 'Auxiliar de departamento pessoal',]);
        Position::create( ['description'  => 'Auxiliar de Limpeza',]);
        Position::create( ['description'  => 'Auxiliar de marketing',]);
        Position::create( ['description'  => 'Auxiliar de serviços gerais',]);
        Position::create( ['description'  => 'Auxiliar financeiro',]);
        Position::create( ['description'  => 'Dentista',]);
        Position::create( ['description'  => 'Diretor',]);
        Position::create( ['description'  => 'Recepcionista',]);
        Position::create( ['description'  => 'Secretaria',]);
    }
}
