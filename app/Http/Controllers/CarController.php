<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::with('photos');

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('model', 'like', "%{$search}%");
            });
        }

        // Availability filter
        if ($request->filled('availability')) {
            $query->where('is_available', $request->availability === 'available');
        }

        // Price range filter
        if ($request->filled('min_price')) {
            $query->where('price_per_day', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price_per_day', '<=', $request->max_price);
        }

        $cars = $query->paginate(10)->withQueryString();
        
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price_per_day' => 'required|integer|min:0',
            'is_available' => 'required|boolean',
            'photos' => 'required|array',
            'photos.*' => 'image|max:2048'
        ]);

        $car = Car::create([
            'name' => $validatedData['name'],
            'model' => $validatedData['model'],
            'price_per_day' => $validatedData['price_per_day'],
            'is_available' => $validatedData['is_available'],
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('cars', 'public');
                $car->photos()->create([
                    'photo_path' => $path
                ]);
            }
        }

        return redirect()->route('cars.index')
                        ->with('success', 'Voiture créée avec succès.');
    }

    public function show(Car $car)
    {
        $car->load('photos', 'reservations');
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        $car->load('photos');
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price_per_day' => 'required|integer|min:0',
            'is_available' => 'required|boolean',
            'photos.*' => 'image|max:2048'
        ]);

        $car->update([
            'name' => $validatedData['name'],
            'model' => $validatedData['model'],
            'price_per_day' => $validatedData['price_per_day'],
            'is_available' => $validatedData['is_available'],
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('cars', 'public');
                $car->photos()->create([
                    'photo_path' => $path
                ]);
            }
        }

        return redirect()->route('cars.index')
                        ->with('success', 'Voiture mise à jour avec succès.');
    }

    public function destroy(Car $car)
    {
        // Supprimer les photos physiquement
        foreach ($car->photos as $photo) {
            Storage::disk('public')->delete($photo->photo_path);
        }
        
        $car->delete();

        return redirect()->route('cars.index')
                        ->with('success', 'Voiture supprimée avec succès.');
    }
}