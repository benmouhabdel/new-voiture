<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\CarPhoto;
class CarSeeder extends Seeder
{
    public function run()
    {
        // Crée 10 voitures avec 8 photos associées pour chaque voiture
        Car::factory(10)->create()->each(function ($car) {
            $car->photos()->createMany(
                CarPhoto::factory(8)->make()->toArray()
            );
        });
    }
}
