<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{
    /**
     * Display a listing of the reservations.
     */
    public function index()
    {
        $reservations = Reservation::with('car')->latest()->paginate(10);
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new reservation.
     */
    public function create()
    {
        $cars = Car::all();
//        $cars = Car::available()->get();
        return view('reservations.create', compact('cars'));
    }

    /**
     * Store a newly created reservation in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'required|string|max:20',
            'car_id' => 'required|exists:cars,id',
            'reservation_date_start' => 'required|date|after_or_equal:today',
            'reservation_date_end' => 'required|date|after:reservation_date_start',
            'national_id_photo' => 'nullable|image|max:2048', // Max 2MB
        ]);

        // Vérifier la disponibilité de la voiture pour les dates sélectionnées
        $isCarAvailable = !Reservation::where('car_id', $request->car_id)
            ->where(function($query) use ($request) {
                $query->whereBetween('reservation_date_start', [$request->reservation_date_start, $request->reservation_date_end])
                    ->orWhereBetween('reservation_date_end', [$request->reservation_date_start, $request->reservation_date_end]);
            })
            ->exists();

        if (!$isCarAvailable) {
            return back()->withErrors(['car_id' => 'La voiture n\'est pas disponible pour ces dates.'])->withInput();
        }

        // Gérer l'upload de la photo de la carte d'identité
        if ($request->hasFile('national_id_photo')) {
            $path = $request->file('national_id_photo')->store('national_ids', 'public');
            $validated['national_id_photo'] = $path;
        }

        $reservation = Reservation::create($validated);

        return redirect()->route('reservations.show', $reservation)
            ->with('success', 'Réservation créée avec succès.');
    }

    /**
     * Display the specified reservation.
     */
    public function show(Reservation $reservation)
    {
        $reservation->load('car');
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified reservation.
     */
    public function edit(Reservation $reservation)
    {
        $cars = Car::all();
//        $cars = Car::available()->get();
        return view('reservations.edit', compact('reservation', 'cars'));
    }

    /**
     * Update the specified reservation in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'required|string|max:20',
            'car_id' => 'required|exists:cars,id',
            'reservation_date_start' => 'required|date',
            'reservation_date_end' => 'required|date|after:reservation_date_start',
            'national_id_photo' => 'nullable|image|max:2048',
        ]);

        // Vérifier la disponibilité de la voiture pour les nouvelles dates
        if ($request->car_id != $reservation->car_id ||
            $request->reservation_date_start != $reservation->reservation_date_start->format('Y-m-d') ||
            $request->reservation_date_end != $reservation->reservation_date_end->format('Y-m-d')) {

            $isCarAvailable = !Reservation::where('car_id', $request->car_id)
                ->where('id', '!=', $reservation->id)
                ->where(function($query) use ($request) {
                    $query->whereBetween('reservation_date_start', [$request->reservation_date_start, $request->reservation_date_end])
                        ->orWhereBetween('reservation_date_end', [$request->reservation_date_start, $request->reservation_date_end]);
                })
                ->exists();

            if (!$isCarAvailable) {
                return back()->withErrors(['car_id' => 'La voiture n\'est pas disponible pour ces dates.'])->withInput();
            }
        }

        // Gérer l'upload de la nouvelle photo de carte d'identité
        if ($request->hasFile('national_id_photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($reservation->national_id_photo) {
                Storage::disk('public')->delete($reservation->national_id_photo);
            }
            $path = $request->file('national_id_photo')->store('national_ids', 'public');
            $validated['national_id_photo'] = $path;
        }

        $reservation->update($validated);

        return redirect()->route('reservations.show', $reservation)
            ->with('success', 'Réservation mise à jour avec succès.');
    }

    /**
     * Remove the specified reservation from storage.
     */
    public function destroy(Reservation $reservation)
    {
        // Supprimer la photo de la carte d'identité si elle existe
        if ($reservation->national_id_photo) {
            Storage::disk('public')->delete($reservation->national_id_photo);
        }

        $reservation->delete();

        return redirect()->route('reservations.index')
            ->with('success', 'Réservation supprimée avec succès.');
    }
}
