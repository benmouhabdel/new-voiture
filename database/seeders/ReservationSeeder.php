<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        // Créer 5 réservations fictives
        Reservation::factory(5)->create();
    }
}
