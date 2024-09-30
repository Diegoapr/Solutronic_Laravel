<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('es_ES');
        $specificDate = Carbon::create(2022, 1, 1, 12, 0, 0);
        for ($i = 0; $i < 10; $i++) {
            $userId = rand(1, 3); // Genera un user_id aleatorio entre 1 y 3

            DB::table('clientes')->insert([
                'nombre' => $faker->name,
                'image' => 'y.jpg',
                'user_id' => $userId,
                'created_at' => $specificDate
            ]);
        }
    }
}
 