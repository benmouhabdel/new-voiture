<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController; 
use App\Models\Car;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/b', function () {
    return view('browse', ["cars" => Car::all()]);
});
Route::get('/s/{car}', function (Car $car) {
    return view('show-car', compact('car'));
});


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
