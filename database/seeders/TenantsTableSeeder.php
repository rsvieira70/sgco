<?php

namespace Database\Seeders;

use illuminate\Support\Str;
use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    public function run()
    {
        Tenant::create
        ([
            'social_reason' => 'ORTORISO - SPM CLÍNICA ODONTOLÓGICA LTDA.',
            'fancy_name' => 'Ortoriso - Limeira',
            'administrative_responsibility' => 'Patricia Campos Freire',
            'responsible_dentist' => 'Patricia Campos Freire',
            'zip_code' => 13480050,
            'address' => 'Rua Alferes Franco',
            'house_number' => '601',
            'neighborhood' => 'Centro',
            'city' => 'Limeira',
            'state' => 'SP',
            'ibge' => 3526902,
            'website' => 'www.ortoriso.com.br',
            'email' => 'ortorisolimeira@sorriaortoriso.com.br',
            'telephone' => '1934426898',
            'cell_phone' => '19999999999',
            'whatsapp' => '19999999999',
            'cnpj' => '05575976000106',
            'state_registration' => 'Isento',
            'municipal_registration' => '104036',
            'opening_date' => '20050101',
        ]);
        Tenant::create
        ([
            'social_reason' => 'Ortoriso - Jundiaí',
            'fancy_name' => 'Ortoriso - Jundiaí',
            'administrative_responsibility' => 'Patricia  Dario Martineli',
            'responsible_dentist' => 'Patricia  Dario Martineli',
            'zip_code' => 13201080,
            'address' => 'Rua Petronilha Antunes',
            'house_number' => '517',
            'neighborhood' => 'Centro',
            'city' => 'Jundiaí',
            'state' => 'SP',
            'ibge' => 3525934,
            'website' => 'www.ortoriso.com.br',
            'email' => 'ortorisojundiai@sorriaortoriso.com.br',
            'telephone' => '1145860730',
            'cell_phone' => '1199231024',
            'whatsapp' => '11992310264',
            'cnpj' => '13649571000101',
            'state_registration' => 'Isento',
            'municipal_registration' => '104036',
            'opening_date' => '20050101',
        ]);
    }
}
