<?php
namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run()
    {
        // Créer 10 voitures fictives
        Car::factory(10)->create();
    }
}
