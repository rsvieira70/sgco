<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create
        ([
            'tenant_id' => 1,
            'name'  => 'Renato Soares Vieira',
            'email' => 'renatovieira70@icloud.com',
            'password' => Hash::make('41772223'),
        ]);
        User::create
        ([
            'tenant_id' => 2,
            'name'  => 'Renato Vieira',
            'email' => 'renatovieira71@icloud.com',
            'password' => Hash::make('41772223'),
        ]);

    }
}
