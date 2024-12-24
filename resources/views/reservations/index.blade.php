@extends('layouts.newapp')

@section('title', 'Liste des Réservations')

@section('content')
    <div class="bg-white shadow-md rounded-lg">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Liste des Réservations</h1>
            </div>

            <form action="{{ route('reservations.index') }}" method="GET" class="mb-4">
                <div class="flex gap-4">
                    <div>
                        <label for="date_start" class="block text-sm font-medium text-gray-700">Date début</label>
                        <input type="date" name="date_start" id="date_start" 
                            value="{{ request('date_start') }}"
                            class="mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="date_end" class="block text-sm font-medium text-gray-700">Date fin</label>
                        <input type="date" name="date_end" id="date_end" 
                            value="{{ request('date_end') }}"
                            class="mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="bg-blue-500 px-4 py-2 text-white rounded-md hover:bg-blue-600">
                            Filtrer
                        </button>
                        @if(request('date_start') || request('date_end'))
                            <a href="{{ route('reservations.index') }}" class="ml-2 px-4 py-2 text-gray-600 hover:text-gray-800">
                                Réinitialiser
                            </a>
                        @endif
                    </div>
                </div>
            </form>

            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Voiture</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Période</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($reservations as $reservation)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $reservation->first_name }} {{ $reservation->last_name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $reservation->email }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $reservation->car->name ?? 'N/A' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        Du {{ (new \Carbon\Carbon($reservation->reservation_date_start))->format('d/m/Y') }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        Au {{ (new \Carbon\Carbon($reservation->reservation_date_end))->format('d/m/Y') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('reservations.show', $reservation) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                        Voir
                                    </a>
                                    <a href="{{ route('reservations.edit', $reservation) }}" class="text-green-600 hover:text-green-900 mr-3">
                                        Modifier
                                    </a>
                                    <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $reservations->links() }}
            </div>
        </div>
    </div>
@endsection