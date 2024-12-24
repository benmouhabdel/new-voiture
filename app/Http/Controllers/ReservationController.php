<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $query = Reservation::with('car')->latest();
        
        if ($request->date_start) {
            $query->where('reservation_date_start', '>=', $request->date_start);
        }
        
        if ($request->date_end) {
            $query->where('reservation_date_end', '<=', $request->date_end);
        }
        
        $reservations = $query->paginate(10);
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $cars = Car::all();
        return view('reservations.create', compact('cars'));
    }

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
            'national_id_photo' => 'nullable|image|max:2048',
        ]);

        $isCarAvailable = !Reservation::where('car_id', $request->car_id)
            ->where(function($query) use ($request) {
                $query->whereBetween('reservation_date_start', [$request->reservation_date_start, $request->reservation_date_end])
                    ->orWhereBetween('reservation_date_end', [$request->reservation_date_start, $request->reservation_date_end]);
            })
            ->exists();

        if (!$isCarAvailable) {
            return back()->withErrors(['car_id' => 'La voiture n\'est pas disponible pour ces dates.'])->withInput();
        }

        if ($request->hasFile('national_id_photo')) {
            $path = $request->file('national_id_photo')->store('national_ids', 'public');
            $validated['national_id_photo'] = $path;
        }

        $reservation = Reservation::create($validated);

        return redirect()->route('reservations.show', $reservation)
            ->with('success', 'Réservation créée avec succès.');
    }

    public function show(Reservation $reservation)
    {
        $reservation->load('car');
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $cars = Car::all();
        return view('reservations.edit', compact('reservation', 'cars'));
    }

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

        if ($request->hasFile('national_id_photo')) {
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

    public function destroy(Reservation $reservation)
    {
        if ($reservation->national_id_photo) {
            Storage::disk('public')->delete($reservation->national_id_photo);
        }

        $reservation->delete();

        return redirect()->route('reservations.index')
            ->with('success', 'Réservation supprimée avec succès.');
    }
}