<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    /**
     * Les attributs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'marque',
        'model',
        'description',
        'price_per_day',
        'automatique',
        'diesel',
        'place',
    ];

    /**
     * Les attributs qui doivent être castés à des types natifs.
     *
     * @var array
     */
    protected $casts = [
        'automatique' => 'boolean',
        'diesel' => 'boolean',
        'price_per_day' => 'integer',
        'place' => 'integer',
    ];

    /**
     * Relation avec le modèle CarPhoto (photos associées à la voiture).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos(): HasMany
    {
        return $this->hasMany(CarPhoto::class);
    }

    /**
     * Relation avec le modèle Reservation (réservations associées à la voiture).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
