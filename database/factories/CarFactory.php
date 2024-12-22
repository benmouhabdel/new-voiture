<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company . ' Car',
            'model' => $this->faker->word . '-' . $this->faker->randomNumber(3),
            'price_per_day' => $this->faker->numberBetween(50, 500),
            'is_available' => $this->faker->boolean(80), // 80% de chance d'être disponible
        ];
    }
}
