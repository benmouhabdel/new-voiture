{{-- index.blade.php --}}
@extends('layouts.newapp')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6">
 
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Véhicules disponibles</h1>
                <a href="{{ route('cars.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    Ajouter un véhicule
                </a>
 
  <!--<div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Liste des Voitures</h1>
                <a href="{{route('cars.create')}}" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter Voiture</a>
          --> </div>

            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <form method="GET" action="{{ route('cars.index') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="col-span-full">
                            <input type="text" name="search" placeholder="Rechercher..."
                                   value="{{ request('search') }}"
                                   class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-gray-700">Prix par jour</label>
                            <div class="flex gap-2">
                                <input type="number" name="min_price" placeholder="Min €"
                                       value="{{ request('min_price') }}"
                                       class="w-1/2 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                <input type="number" name="max_price" placeholder="Max €"
                                       value="{{ request('max_price') }}"
                                       class="w-1/2 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700">Transmission</label>
                            <select name="automatique"
                                    class="mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Tous</option>
                                <option value="1" {{ request('automatique') === '1' ? 'selected' : '' }}>Automatique</option>
                                <option value="0" {{ request('automatique') === '0' ? 'selected' : '' }}>Manuelle</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700">Carburant</label>
                            <select name="diesel"
                                    class="mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Tous</option>
                                <option value="1" {{ request('diesel') === '1' ? 'selected' : '' }}>Diesel</option>
                                <option value="0" {{ request('diesel') === '0' ? 'selected' : '' }}>Essence</option>
                            </select>
                        </div>

                        <div class="col-span-full flex justify-end">
                            <button type="submit"
                                    class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-900">
                                Filtrer
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($cars as $car)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                        <div class="aspect-w-16 aspect-h-9">
                            @if($car->photos->first())
                                <img src="{{ Storage::url($car->photos->first()->photo_path) }}"
                                     alt="{{ $car->name }}"
                                     class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400">Pas de photo</span>
                                </div>
                            @endif
                        </div>

                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $car->name }}</h3>
                            <p class="text-gray-600">{{ $car->marque }} {{ $car->model }}</p>
                            <p class="text-lg font-bold text-indigo-600 mt-2">{{ $car->price_per_day }}€ /jour</p>

                            <div class="mt-2 flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-sm rounded-full">
                                    {{ $car->place }} places
                                </span>
                                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-sm rounded-full">
                                    {{ $car->automatique }}
                                </span>
                                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-sm rounded-full">
                                    {{ $car->diesel }}
                                </span>
                            </div>

                            <div class="mt-4 flex justify-end space-x-3">
                                <a href="{{ route('cars.show', $car) }}" 
                                   class="text-indigo-600 hover:text-indigo-800">Voir</a>
                                <a href="{{ route('cars.edit', $car) }}" 
                                   class="text-green-600 hover:text-green-800">Modifier</a>
                                <form action="{{ route('cars.destroy', $car) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800"
                                            onclick="return confirm('Confirmer la suppression ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full p-4 text-center text-gray-500">
                        Aucun véhicule trouvé
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $cars->links() }}
            </div>
        </div>
    </div>
</div>
@endsection