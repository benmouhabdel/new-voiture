<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'price_per_day',
        'is_available',
        'photo1',
        'photo2',
        'photo3',
        'photo4',
        'photo5',
        'photo6',
        'photo7',
        'photo8',
    ];
    

    // Relier à la table des réservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // Vérifier si une voiture est déjà réservée pour une date
    public function isAvailableOn($date): bool
    {
        return !Reservation::where('car_id', $this->id)
            ->where('reservation_date', $date)
            ->exists();
    }
    
}
