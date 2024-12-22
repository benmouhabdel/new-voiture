<?php

namespace Database\Factories;

use App\Models\CarPhoto;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarPhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CarPhoto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'car_id' => Car::factory(), // Crée une voiture si elle n'existe pas
            'photo_path' => $this->faker->image(
                storage_path('app/public/cars'), // Dossier pour stocker les images
                640, 
                480, 
                'transport', 
                false // Retourne uniquement le nom du fichier
            ),
        ];
    }
}
