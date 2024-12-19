@extends('layouts.newapp')

@section('title', 'Liste des Voitures')

@section('content')
    <div class="bg-white shadow-md rounded-lg">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Liste des Voitures</h1>
                <a href="{{ route('cars.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Ajouter une voiture
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($cars as $car)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        @if($car->photo1)
                            <img src="{{ Storage::url($car->photo1) }}" alt="{{ $car->name }}" class="h-48 w-full object-cover">
                        @else
                            <div class="h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">Pas de photo</span>
                            </div>
                        @endif

                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{ $car->name }}</h3>
                            <p class="text-gray-600">{{ $car->model }}</p>
                            <p class="text-blue-600 font-bold mt-2">{{ $car->price_per_day }}€ / jour</p>

                            <div class="mt-4 flex justify-between items-center">
                                <span class="px-2 py-1 rounded text-sm {{ $car->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $car->is_available ? 'Disponible' : 'Non disponible' }}
                                </span>

                                <div class="space-x-2">
                                    <a href="{{ route('cars.edit', $car) }}" class="text-blue-600 hover:text-blue-800">
                                        Modifier
                                    </a>
                                    <a href="{{ route('cars.show', $car) }}" class="text-green-600 hover:text-green-800">
                                        Voir
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
                    </div>
                @endforeach
            </div>
            <div class="mt-3">

            {{$cars->links()}}

            </div>
        </div>
    </div>
@endsection
