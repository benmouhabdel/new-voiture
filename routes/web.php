<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
 
use App\Http\Controllers\ContactController; 
 
use App\Models\Car;
use App\Models\CarPhoto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/b', function () {
    return view('browse', ["cars" => Car::with("photos")->get()]);
});
Route::get('/s/{car}', function (Car $car) {
    return view('show-car', compact('car'));
});

Route::middleware('auth')->group(function () {
// Routes pour les voitures (CRUD complet)
    Route::resource('cars', CarController::class);

// Routes pour les réservations (CRUD complet)
 
    Route::resource('reservations', ReservationController::class);
   
Route::resource('contacts', ContactController::class)->except(['edit', 'update']);
 

Route::resource('contacts', ContactController::class)->except(['edit', 'update']);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
