<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\CarPhoto;

class CarPhotoSeeder extends Seeder
{
    public function run()
    {
        $cars = Car::all();

        foreach ($cars as $car) {
            CarPhoto::factory(8)->create(['car_id' => $car->id]);
        }
    }
}
