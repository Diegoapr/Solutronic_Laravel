<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456789')
        ]);

        User::create([
            'name' => 'Operativo',
            'email' => 'operativo@operativo.com',
            'password' => Hash::make('123456789')
        ]);
        
        User::create([
            'name' => 'empleado',
            'email' => 'empleado@empleado.com',
            'password' => Hash::make('123456789')
        ]);
    }
}