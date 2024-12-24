<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::with('photos');

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('model', 'like', "%{$search}%")
                  ->orWhere('marque', 'like', "%{$search}%");
            });
        }

        // Price range filter
        if ($request->filled('min_price')) {
            $query->where('price_per_day', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price_per_day', '<=', $request->max_price);
        }

        // Model filter
        if ($request->filled('model')) {
            $query->where('model', $request->model);
        }

        // Marque filter
        if ($request->filled('marque')) {
            $query->where('marque', $request->marque);
        }

        // Automatique filter
        if ($request->filled('automatique')) {
            $query->where('automatique', $request->automatique == 'true');
        }

        // Diesel filter
        if ($request->filled('diesel')) {
            $query->where('diesel', $request->diesel == 'true');
        }

        // Place filter
        if ($request->filled('place')) {
            $query->where('place', $request->place);
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
            'marque' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_day' => 'required|integer|min:0',
            'automatique' => 'required|boolean',
            'diesel' => ['required',
            Rule::in(['a', 'b','c'])
        ],
            'place' => 'required|integer|min:1',
            'photos' => 'required|array',
            'photos.*' => 'image|max:2048'
        ], [
             'diesel'=>"msg custom"
        ]);

        $car = Car::create([
            'name' => $validatedData['name'],
            'marque' => $validatedData['marque'],
            'model' => $validatedData['model'],
            'description' => $validatedData['description'] ?? null,
            'price_per_day' => $validatedData['price_per_day'],
            'automatique' => $validatedData['automatique'],
            'diesel' => $validatedData['diesel'],
            'place' => $validatedData['place'],
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
        $car->load('photos');
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
            'marque' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_day' => 'required|integer|min:0',
            'automatique' => 'required|boolean',
            'diesel' => 'required|boolean',
            'place' => 'required|integer|min:1',
            'photos.*' => 'image|max:2048'
        ]);

        $car->update([
            'name' => $validatedData['name'],
            'marque' => $validatedData['marque'],
            'model' => $validatedData['model'],
            'description' => $validatedData['description'] ?? null,
            'price_per_day' => $validatedData['price_per_day'],
            'automatique' => $validatedData['automatique'],
            'diesel' => $validatedData['diesel'],
            'place' => $validatedData['place'],
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
