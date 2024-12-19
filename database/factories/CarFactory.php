<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company . ' Car', // Nom réaliste pour une voiture
            'model' => $this->faker->bothify('Model-###'), // Modèle généré aléatoirement
            'price_per_day' => $this->faker->numberBetween(50, 500), // Prix entre 50 et 500 €
            'is_available' => $this->faker->boolean(80), // 80% des voitures disponibles
            'photo1' => '/photos/car.jpg', // Exemple de chemin pour la première photo
            'photo2' => '/photos/car.jpg',
            'photo3' => '/photos/car.jpg',
            'photo4' => '/photos/car.jpg',
            'photo5' => '/photos/car.jpg',
            'photo6' => '/photos/car.jpg',
            'photo7' => '/photos/car.jpg',
            'photo8' => '/photos/car.jpg',
        ];
    }
}
