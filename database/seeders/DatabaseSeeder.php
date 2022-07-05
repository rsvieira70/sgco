<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(TenantsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SpecialtiesTableSeeder::class);
        $this->call(BankSlipTypesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(TeethTableSeeder::class);
        $this->call(BanksTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CouncilsTypeSeeder::class);
        $this->call(PatentsTypeSeeder::class);
    }
}
