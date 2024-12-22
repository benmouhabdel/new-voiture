<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Exécuter le seed de la base de données.
     *
     * @return void
     */
    public function run()
    {
        // Créer 50 voitures en utilisant la factory
        Car::factory()->count(50)->create();
    }
}
