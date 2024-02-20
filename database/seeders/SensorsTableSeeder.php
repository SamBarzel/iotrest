<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sensor;
use Faker\Factory as Faker;

class SensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i =0; $i < 20; $i++){
            Sensor::create([
                'name' =>$faker->unique()->name(),
                'type' =>$faker->randomElement(['Temp', 'Humedad', 'Presion']),
                'value' =>$faker->randomFloat(2, 0, 100),
                'date' =>$faker->dateTimeThisYear(),
                'user_id' => rand(1, 11)
            ]);
        }
    }
}
