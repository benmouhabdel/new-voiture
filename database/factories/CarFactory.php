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
            'name' => $this->faker->word(),
            'marque' => $this->faker->randomElement(['Toyota', 'Ford', 'BMW', 'Mercedes']),
            'model' => $this->faker->randomElement(['Corolla', 'Focus', 'Series 3', 'C-Class']),
            'description' => $this->faker->sentence(),
            'price_per_day' => $this->faker->numberBetween(50, 300),
            'automatique' => $this->faker->randomElement(['automatique', 'manuelle']),
            'diesel' => $this->faker->randomElement(['diesel', 'essence']),
            'place' => $this->faker->numberBetween(2, 7),
        ];
    }
}
