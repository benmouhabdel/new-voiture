<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('now', '+3 months');
        $endDate = $this->faker->dateTimeBetween(
            Carbon::instance($startDate)->addDays(1), 
            Carbon::instance($startDate)->addDays(14)
        );

        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'address' => $this->faker->address(),
            'national_id_photo' => $this->faker->imageUrl(), // Note: In production, use file upload
            'email' => $this->faker->email(),
            'phone_number' => $this->faker->phoneNumber(),
            'car_id' => Car::factory(), // Create a new car for each reservation
            'reservation_date_start' => $startDate,
            'reservation_date_end' => $endDate
        ];
    }
}