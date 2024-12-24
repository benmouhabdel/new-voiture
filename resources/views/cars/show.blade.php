{{-- show.blade.php --}}
@extends('layouts.newapp')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-lg shadow-lg">
        <div class="p-6">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">{{ $car->name }}</h1>
                <div class="flex gap-3">
                    <a href="{{ route('cars.edit', $car) }}"
                       class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        Modifier
                    </a>
                    <form action="{{ route('cars.destroy', $car) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700"
                                onclick="return confirm('Confirmer la suppression ?')">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-xl font-semibold mb-4">Galerie photos</h2>
                    <div class="grid grid-cols-2 gap-4">
                        @forelse($car->photos as $photo)
                            <div class="aspect-w-3 aspect-h-2">
                                <img src="{{ Storage::url($photo->photo_path) }}"
                                     alt="Photo {{ $car->name }}"
                                     class="w-full h-48 object-cover rounded-lg shadow-sm">
                            </div>
                        @empty
                        <div class="col-span-2 bg-gray-100 rounded-lg p-4 text-center text-gray-500">
                                Aucune photo disponible
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <h2 class="text-xl font-semibold mb-4">Caractéristiques</h2>
                        <dl class="grid grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm text-gray-500">Marque</dt>
                                <dd class="text-gray-900 font-medium">{{ $car->marque }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500">Modèle</dt>
                                <dd class="text-gray-900 font-medium">{{ $car->model }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500">Prix par jour</dt>
                                <dd class="text-indigo-600 font-bold">{{ $car->price_per_day }} DH</dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500">Places</dt>
                                <dd class="text-gray-900 font-medium">{{ $car->place }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500">Transmission</dt>
                                <dd class="text-gray-900 font-medium">{{ $car->automatique ? 'Automatique' : 'Manuelle' }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500">Carburant</dt>
                                <dd class="text-gray-900 font-medium">{{ $car->diesel ? 'Diesel' : 'Essence' }}</dd>
                            </div>
                        </dl>
                    </div>

                    @if($car->description)
                        <div>
                            <h2 class="text-xl font-semibold mb-2">Description</h2>
                            <p class="text-gray-700">{{ $car->description }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('cars.index') }}" 
                   class="text-indigo-600 hover:text-indigo-800 font-medium">
                    ← Retour à la liste
                </a>
            </div>
        </div>
    </div>
</div>
@endsection