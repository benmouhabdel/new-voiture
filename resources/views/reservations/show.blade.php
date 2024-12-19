@extends('layouts.app')

@section('title', 'Détails de la Réservation')

@section('content')
    <div class="bg-white shadow-md rounded-lg">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Détails de la Réservation</h1>
                <div class="space-x-2">
                    <a href="{{ route('reservations.edit', $reservation) }}" 
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Modifier
                    </a>
                    <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informations personnelles -->
                <div class="space-y-4">
                    <h2 class="text-xl font-semibold">Informations personnelles</h2>
                    
                    <div class="border-t pt-4">
                        <p class="text-sm text-gray-600">Nom complet</p>
                        <p class="font-medium">{{ $reservation->first_name }} {{ $reservation->last_name }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="font-medium">{{ $reservation->email ?? 'Non renseigné' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600">Téléphone</p>
                        <p class="font-medium">{{ $reservation->phone_number }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600">Adresse</p>
                        <p class="font-medium">{{ $reservation->address }}</p>
                    </div>
                </div>

                <!-- Détails de la réservation -->
                <div class="space-y-4">
                    <h2 class="text-xl font-semibold">Détails de la réservation</h2>
                    
                    <div class="border-t pt-4">
                        <p class="text-sm text-gray-600">Voiture réservée</p>
                        <p class="font-medium">{{ $reservation->car->name ?? 'N/A' }} - {{ $reservation->car->model ?? '' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600">Période de réservation</p>
                        <p class="font-medium">
                            Du {{ $reservation->reservation_date_start->format('d/m/Y') }}
                            au {{ $reservation->reservation_date_end->format('d/m/Y') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600">Durée</p>
                        <p class="font-medium">
                            {{ $reservation->reservation_date_start->diffInDays($reservation->reservation_date_end) }} jours
                        </p>
                    </div>

                    @if($reservation->national_id_photo)
                        <div>
                            <p class="text-sm text-gray-600">Carte d'identité</p>
                            <img src="{{ Storage::url($reservation->national_id_photo) }}" 
                                alt="Carte d'identité" 
                                class="mt-2 max-w-xs rounded shadow">
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-6 pt-6 border-t">
                <div class="flex justify-between items-center">
                    <a href="{{ route('reservations.index') }}" 
                        class="text-gray-600 hover:text-gray-900">
                        ← Retour à la liste
                    </a>
                    <p class="text-sm text-gray-500">
                        Créé le {{ $reservation->created_at->format('d/m/Y à H:i') }}
                        @if($reservation->updated_at->ne($reservation->created_at))
                            <br>
                            Dernière modification le {{ $reservation->updated_at->format('d/m/Y à H:i') }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection