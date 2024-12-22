@extends('layouts.newapp')

@section('title', $car->name)

@section('content')
    <div class="bg-white shadow-md rounded-lg">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">{{ $car->name }}</h1>
                <div class="space-x-2">
                    <a href="{{ route('cars.edit', $car) }}"
                       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Modifier
                    </a>
                    <form action="{{ route('cars.destroy', $car) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette voiture ?')">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Photos du véhicule -->
                <div class="space-y-4">
                    <h2 class="text-lg font-semibold">Photos</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @forelse($car->photos as $photo)
                            <div>
                                <img src="{{ Storage::url($photo->photo_path) }}"
                                     alt="Photo véhicule"
                                     class="w-full h-32 object-cover rounded shadow">
                            </div>
                        @empty
                            <div class="col-span-3 text-center text-gray-500">
                                Aucune photo disponible
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Informations du véhicule -->
                <div class="space-y-4">
                    <h2 class="text-lg font-semibold">Caractéristiques</h2>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Marque</p>
                            <p class="font-medium">{{ $car->marque }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-600">Modèle</p>
                            <p class="font-medium">{{ $car->model }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-600">Prix par jour</p>
                            <p class="font-medium text-blue-600">{{ $car->price_per_day }}€</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-600">Nombre de places</p>
                            <p class="font-medium">{{ $car->place }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-600">Transmission</p>
                            <p class="font-medium">{{ $car->automatique ? 'Automatique' : 'Manuelle' }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-600">Carburant</p>
                            <p class="font-medium">{{ $car->diesel ? 'Diesel' : 'Essence' }}</p>
                        </div>
                    </div>

                    @if($car->description)
                        <div class="mt-4">
                            <p class="text-sm text-gray-600">Description</p>
                            <p class="mt-1">{{ $car->description }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-6 pt-6 border-t">
                <a href="{{ route('cars.index') }}" class="text-gray-600 hover:text-gray-900">
                    ← Retour à la liste
                </a>
            </div>
        </div>
    </div>
@endsection