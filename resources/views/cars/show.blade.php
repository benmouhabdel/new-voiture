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
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @for ($i = 1; $i <= 8; $i++)
                            @if($car->{"photo$i"})
                                <div>
                                    <img src="{{ Storage::url($car->{"photo$i"}) }}"
                                         alt="Photo {{ $i }}"
                                         class="w-full h-32 object-cover rounded shadow">
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>

                <!-- Informations du véhicule -->
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-gray-600">Modèle</p>
                        <p class="font-medium">{{ $car->model }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600">Prix par jour</p>
                        <p class="font-medium text-blue-600">{{ $car->price_per_day }}€</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600">Statut</p>
                        <p class="inline-flex px-2 py-1 rounded text-sm {{ $car->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $car->is_available ? 'Disponible' : 'Non disponible' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600">Réservations en cours</p>
                        @if($car->reservations->count() > 0)
                            <ul class="mt-2 space-y-2">
                                @foreach($car->reservations as $reservation)
                                    <li class="bg-gray-50 p-2 rounded">
                                        {{ $reservation->first_name }} {{ $reservation->last_name }}
                                        <br>
                                        <span class="text-sm text-gray-600">
                                            Du {{    (new \Carbon\Carbon($reservation->reservation_date_start))->format('Y-m-d')}}

                                            au {{  (new \Carbon\Carbon( $reservation->reservation_date_end))->format('Y-m-d')}}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">Aucune réservation en cours</p>
                        @endif
                    </div>
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
