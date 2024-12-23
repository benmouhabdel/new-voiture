<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Exécuter le seed de la base de données.
     *
     * @return void
     */
    public function run()
    {
        // Générer 50 contacts
        Contact::factory()->count(50)->create();
    }
}
