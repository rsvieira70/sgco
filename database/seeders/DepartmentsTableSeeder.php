<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    public function run()
    {
        Department::create( ['description'  => 'Administração',]);
        Department::create( ['description'  => 'Caixa',]);
        Department::create( ['description'  => 'Clinica',]);
        Department::create( ['description'  => 'Comercial',]);
        Department::create( ['description'  => 'Departamento pessoal',]);
        Department::create( ['description'  => 'Diretoria',]);
        Department::create( ['description'  => 'Financeiro',]);
        Department::create( ['description'  => 'Limpeza e conservação',]);
        Department::create( ['description'  => 'Marketing',]);
        Department::create( ['description'  => 'Recepção',]);
        Department::create( ['description'  => 'Secretaria',]);
        Department::create( ['description'  => 'Tecnologias da informação',]);
    }
}
