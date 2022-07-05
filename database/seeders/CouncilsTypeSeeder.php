<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Council;

class CouncilsTypeSeeder extends Seeder
{
    public function run()
    {
        Council::create(['name' => ucwords(strtolower('CONSELHO REGIONAL DE ENFERMAGEM								')), 'short_name' => strtoupper('COREN'),]);
        Council::create(['name' => ucwords(strtolower('CONSELHO REGIONAL DE BIOLOGIA								')), 'short_name' => strtoupper('CRBIO'),]);
        Council::create(['name' => ucwords(strtolower('CONSELHO REGIONAL DE BIOMEDICINA								')), 'short_name' => strtoupper('CRBM'),]);
        Council::create(['name' => ucwords(strtolower('CONSELHO REGIONAL DE EDUCACAO FISICA							')), 'short_name' => strtoupper('CREF'),]);
        Council::create(['name' => ucwords(strtolower('CONSELHO REGIONAL DE FISIOTERAPIA E TERAPIA OCUPACIONAL		')), 'short_name' => strtoupper('CREFITO'),]);
        Council::create(['name' => ucwords(strtolower('CONSELHO REGIONAL DE FONOAUDIOLOGIA							')), 'short_name' => strtoupper('CREFONO'),]);
        Council::create(['name' => ucwords(strtolower('CONSELHO REGIONAL DE ASSISTENCIA SOCIAL						')), 'short_name' => strtoupper('CRESS'),]);
        Council::create(['name' => ucwords(strtolower('CONSELHO REGIONAL DE FARMACIA								')), 'short_name' => strtoupper('CRF'),]);
        Council::create(['name' => ucwords(strtolower('CONSELHO REGIONAL DE MEDICINA								')), 'short_name' => strtoupper('CRM'),]);
        Council::create(['name' => ucwords(strtolower('CONSELHO REGIONAL DE MEDICINA VETERINARIA					')), 'short_name' => strtoupper('CRMV'),]);
        Council::create(['name' => ucwords(strtolower('CONSELHO REGIONAL DE NUTRICAO								')), 'short_name' => strtoupper('CRN'),]);
        Council::create(['name' => ucwords(strtolower('CONSELHO REGIONAL DE ODONTOLOGIA								')), 'short_name' => strtoupper('CRO'),]);
        Council::create(['name' => ucwords(strtolower('CONSELHO REGIONAL DE PSICOLOGIA								')), 'short_name' => strtoupper('CRP'),]);
        Council::create(['name' => ucwords(strtolower('CONSELHO REGIONAL DE TECNICOS EM RADIOLOGIA					')), 'short_name' => strtoupper('CRTR'),]);
        Council::create(['name' => ucwords(strtolower('OUTROS CONSELHOS												')), 'short_name' => strtoupper('OUTROS'),]);
    }
}
