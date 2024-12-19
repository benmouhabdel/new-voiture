<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'national_id_photo',
        'email',
        'phone_number',
        'car_id',
        'reservation_date_start',
        'reservation_date_end'
    ];

    /**
     * Get the car associated with the reservation.
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}