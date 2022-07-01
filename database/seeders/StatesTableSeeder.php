<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    public function run()
    {
        State::create(['code' => 35, 'description' => ucwords(strtolower('São Paulo				')), 'initials' => strtoupper('SP'),]);
        State::create(['code' => 41, 'description' => ucwords(strtolower('Paraná				')), 'initials' => strtoupper('PR'),]);
        State::create(['code' => 42, 'description' => ucwords(strtolower('Santa Catarina		')), 'initials' => strtoupper('SC'),]);
        State::create(['code' => 43, 'description' => ucwords(strtolower('Rio Grande do Sul	 	')), 'initials' => strtoupper('RS'),]);
        State::create(['code' => 50, 'description' => ucwords(strtolower('Mato Grosso do Sul	')), 'initials' => strtoupper('MS'),]);
        State::create(['code' => 11, 'description' => ucwords(strtolower('Rondônia			 	')), 'initials' => strtoupper('RO'),]);
        State::create(['code' => 12, 'description' => ucwords(strtolower('Acre				 	')), 'initials' => strtoupper('AC'),]);
        State::create(['code' => 13, 'description' => ucwords(strtolower('Amazonas			 	')), 'initials' => strtoupper('AM'),]);
        State::create(['code' => 14, 'description' => ucwords(strtolower('Roraima				')), 'initials' => strtoupper('RR'),]);
        State::create(['code' => 15, 'description' => ucwords(strtolower('Pará				 	')), 'initials' => strtoupper('PA'),]);
        State::create(['code' => 16, 'description' => ucwords(strtolower('Amapá				 	')), 'initials' => strtoupper('AP'),]);
        State::create(['code' => 17, 'description' => ucwords(strtolower('Tocantins			 	')), 'initials' => strtoupper('TO'),]);
        State::create(['code' => 21, 'description' => ucwords(strtolower('Maranhão			 	')), 'initials' => strtoupper('MA'),]);
        State::create(['code' => 24, 'description' => ucwords(strtolower('Rio Grande do Norte	')), 'initials' => strtoupper('RN'),]);
        State::create(['code' => 25, 'description' => ucwords(strtolower('Paraíba				')), 'initials' => strtoupper('PB'),]);
        State::create(['code' => 26, 'description' => ucwords(strtolower('Pernambuco			')), 'initials' => strtoupper('PE'),]);
        State::create(['code' => 27, 'description' => ucwords(strtolower('Alagoas				')), 'initials' => strtoupper('AL'),]);
        State::create(['code' => 28, 'description' => ucwords(strtolower('Sergipe				')), 'initials' => strtoupper('SE'),]);
        State::create(['code' => 29, 'description' => ucwords(strtolower('Bahia				 	')), 'initials' => strtoupper('BA'),]);
        State::create(['code' => 31, 'description' => ucwords(strtolower('Minas Gerais		 	')), 'initials' => strtoupper('MG'),]);
        State::create(['code' => 33, 'description' => ucwords(strtolower('Rio de Janeiro		')), 'initials' => strtoupper('RJ'),]);
        State::create(['code' => 51, 'description' => ucwords(strtolower('Mato Grosso			')), 'initials' => strtoupper('MT'),]);
        State::create(['code' => 52, 'description' => ucwords(strtolower('Goiás				 	')), 'initials' => strtoupper('GO'),]);
        State::create(['code' => 53, 'description' => ucwords(strtolower('Distrito Federal	 	')), 'initials' => strtoupper('DF'),]);
        State::create(['code' => 22, 'description' => ucwords(strtolower('Piauí				 	')), 'initials' => strtoupper('PI'),]);
        State::create(['code' => 23, 'description' => ucwords(strtolower('Ceará				 	')), 'initials' => strtoupper('CE'),]);
        State::create(['code' => 32, 'description' => ucwords(strtolower('Espírito Santo		')), 'initials' => strtoupper('ES'),]);
    }
}
