<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;


class SpecialtiesTableSeeder extends Seeder
{
    public function run()
    {
        Specialty::create( ['description'  => 'Cirurgia e Traumatologia Buco-Maxilo-Faciais',]);
        Specialty::create( ['description'  => 'Dentística',]);
        Specialty::create( ['description'  => 'Disfunção Temporomandibular e Dor Orofacial',]);
        Specialty::create( ['description'  => 'Endodontia',]);
        Specialty::create( ['description'  => 'Estomatologia',]);
        Specialty::create( ['description'  => 'Radiologia Odontológica e Imaginologia',]);
        Specialty::create( ['description'  => 'Implantodontia',]);
        Specialty::create( ['description'  => 'Odontologia Legal',]);
        Specialty::create( ['description'  => 'Odontologia do Trabalho',]);
        Specialty::create( ['description'  => 'Odontologia para Pacientes com Necessidades Especiais',]);
        Specialty::create( ['description'  => 'Odontogeriatria',]);
        Specialty::create( ['description'  => 'Odontopediatria',]);
        Specialty::create( ['description'  => 'Ortodontia',]);
        Specialty::create( ['description'  => 'Ortopedia Funcional dos Maxilares',]);
        Specialty::create( ['description'  => 'Patologia Bucal',]);
        Specialty::create( ['description'  => 'Periodontia',]);
        Specialty::create( ['description'  => 'Prótese Buco-Maxilo-Facial',]);
        Specialty::create( ['description'  => 'Prótese Dentária',]);
        Specialty::create( ['description'  => 'Saúde Coletiva e da Família',]);
        Specialty::create( ['description'  => 'Clínica geral',]);
        Specialty::create( ['description'  => 'Odontologia estética',]);
        Specialty::create( ['description'  => 'Fisioterapia',]);
        Specialty::create( ['description'  => 'Fonoaudiologia',]);
        Specialty::create( ['description'  => 'Bichectomia',]);
        
    }
}

