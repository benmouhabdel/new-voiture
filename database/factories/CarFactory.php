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
            'name' => $this->faker->word . ' ' . $this->faker->word,
            'marque' => $this->faker->randomElement(['Toyota', 'BMW', 'Mercedes', 'Audi', 'Renault', 'Peugeot', 'Volkswagen']),
            'model' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'price_per_day' => $this->faker->numberBetween(30, 200),
            'automatique' => $this->faker->boolean,
            'diesel' => $this->faker->boolean,
            'place' => $this->faker->numberBetween(2, 7),
        ];
    }
}
