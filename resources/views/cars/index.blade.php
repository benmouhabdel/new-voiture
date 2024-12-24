@extends('layouts.newapp')

@section('title', 'Liste des Voitures')

@section('content')
    <div class="bg-white shadow-md rounded-lg">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Liste des Voitures</h1>
                <a href="{{route('cars.create')}}" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter Voiture</a>
            </div>

            <!-- Search and Filters Section -->
            <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                <form method="GET" action="{{ route('cars.index') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Search Bar -->
                        <div class="col-span-1 md:col-span-3">
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Rechercher</label>
                            <input type="text" name="search" id="search"
                                   value="{{ request('search') }}"
                                   placeholder="Rechercher par nom, modèle ou marque"
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Price Range -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Prix par jour</label>
                            <div class="flex space-x-2">
                                <input type="number" name="min_price"
                                       value="{{ request('min_price') }}"
                                       placeholder="Min €"
                                       class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <input type="number" name="max_price"
                                       value="{{ request('max_price') }}"
                                       placeholder="Max €"
                                       class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>

                        <!-- Transmission Type -->
                        <div>
                            <label for="automatique"
                                   class="block text-sm font-medium text-gray-700 mb-1">Transmission</label>
                            <select name="automatique" id="automatique"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Tous</option>
                                <option value="true" {{ request('automatique') === 'true' ? 'selected' : '' }}>
                                    Automatique
                                </option>
                                <option value="false" {{ request('automatique') === 'false' ? 'selected' : '' }}>
                                    Manuelle
                                </option>
                            </select>
                        </div>

                        <!-- Fuel Type -->
                        <div>
                            <label for="diesel" class="block text-sm font-medium text-gray-700 mb-1">Carburant</label>
                            <select name="diesel" id="diesel"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Tous</option>
                                <option value="true" {{ request('diesel') === 'true' ? 'selected' : '' }}>Diesel
                                </option>
                                <option value="false" {{ request('diesel') === 'false' ? 'selected' : '' }}>Essence
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                class=" text-gray-700 hover:text-white border border-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200   rounded hover:bg-black-600 px-3 py-2 text-xs font-medium text-center  ">
                            Appliquer les filtres
                        </button>


                    </div>
                </form>
            </div>

            <!-- Cars Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($cars as $car)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        @if($car->photos->first())
                            <img src="{{ Storage::url($car->photos->first()->photo_path) }}"
                                 alt="{{ $car->name }}"
                                 class="h-48 w-full object-cover">
                        @else
                            <div class="h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">Pas de photo</span>
                            </div>
                        @endif

                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{ $car->name }}</h3>
                            <p class="text-gray-600">{{ $car->marque }} {{ $car->model }}</p>
                            <p class="text-blue-600 font-bold mt-2">{{ $car->price_per_day }}€ / jour</p>

                            <div class="mt-2 flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-gray-100 text-gray-700 text-sm rounded-full">
                                    {{ $car->place }} places
                                </span>
                                <span class="px-2 py-1 bg-gray-100 text-gray-700 text-sm rounded-full">
                                    {{ $car->automatique ? 'Automatique' : 'Manuelle' }}
                                </span>
                                <span class="px-2 py-1 bg-gray-100 text-gray-700 text-sm rounded-full">
                                    {{ $car->diesel ? 'Diesel' : 'Essence' }}
                                </span>
                            </div>

                            <div class="mt-4 flex justify-end space-x-2">
                                <a href="{{ route('cars.show', $car) }}"
                                   class="text-blue-600 hover:text-blue-800">
                                    Voir
                                </a>
                                <a href="{{ route('cars.edit', $car) }}"
                                   class="text-green-600 hover:text-green-800">
                                    Modifier
                                </a>
                                <form action="{{ route('cars.destroy', $car) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:text-red-800"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette voiture ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $cars->links() }}
            </div>
        </div>
    </div>
@endsection
