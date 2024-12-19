<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the cars.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(1);
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new car.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created car in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price_per_day' => 'required|integer|min:0',
            'is_available' => 'required|boolean',
            'photo1' => 'nullable|image|max:2048',
            'photo2' => 'nullable|image|max:2048',
            'photo3' => 'nullable|image|max:2048',
            'photo4' => 'nullable|image|max:2048',
            'photo5' => 'nullable|image|max:2048',
            'photo6' => 'nullable|image|max:2048',
            'photo7' => 'nullable|image|max:2048',
            'photo8' => 'nullable|image|max:2048',
        ]);

        $car = Car::create($validatedData);

        return redirect()->route('cars.index')
                        ->with('success', 'Car created successfully.');
    }

    /**
     * Display the specified car.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified car.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified car in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price_per_day' => 'required|integer|min:0',
            'is_available' => 'required|boolean',
            'photo1' => 'nullable|image|max:2048',
            'photo2' => 'nullable|image|max:2048',
            'photo3' => 'nullable|image|max:2048',
            'photo4' => 'nullable|image|max:2048',
            'photo5' => 'nullable|image|max:2048',
            'photo6' => 'nullable|image|max:2048',
            'photo7' => 'nullable|image|max:2048',
            'photo8' => 'nullable|image|max:2048',
        ]);

        $car->update($validatedData);

        return redirect()->route('cars.index')
                        ->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified car from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index')
                        ->with('success', 'Car deleted successfully.');
    }
}
