<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
<<<<<<< HEAD
use App\Models\Car;
=======
use App\Http\Controllers\ContactController;
>>>>>>> 4f2892c9e969eb3e3989c8c97f21ca5b04b10877
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
<<<<<<< HEAD
});
Route::get('/b', function () {
    return view('browse');
});
Route::get('/s/{car}', function (Car $car) {
    return view('show-car', compact('car'));
});
=======
})->name('welcome');
>>>>>>> 4f2892c9e969eb3e3989c8c97f21ca5b04b10877


// Routes pour les voitures (CRUD complet)
Route::resource('cars', CarController::class);

// Routes pour les réservations (CRUD complet)
Route::resource('reservations', ReservationController::class);
Route::resource('contacts', ContactController::class)->except(['edit', 'update']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
