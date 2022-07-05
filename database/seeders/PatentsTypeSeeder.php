<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patent;

class PatentsTypeSeeder extends Seeder
{
    public function run()
    {
        Patent::create(['name' => ucwords(strtolower('Doutor								')), 'short_name' => ucwords(strtolower('Dr. ')),]);
        Patent::create(['name' => ucwords(strtolower('Doutora								')), 'short_name' => ucwords(strtolower('Dra.')),]);
        Patent::create(['name' => ucwords(strtolower('Senhor								')), 'short_name' => ucwords(strtolower('Sr.')),]);
        Patent::create(['name' => ucwords(strtolower('Senhora								')), 'short_name' => ucwords(strtolower('Sra.')),]);
    }
}
