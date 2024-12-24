<!-- index.blade.php -->
@extends('layouts.newapp')

@section('title', 'Liste des Contacts')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Liste des Contacts</h1>
            <a href="{{ route('contacts.create') }}" 
               class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">
                Ajouter un Contact
            </a>
        </div>

        <!-- Search Section -->
        <div class="mb-6 bg-gray-50 p-4 rounded-lg">
            <form method="GET" action="{{ route('contacts.index') }}">
                <div class="flex gap-3">
                    <input type="text" name="search" 
                           class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           placeholder="Rechercher un contact..." 
                           value="{{ request('search') }}">
                    <button type="submit" 
                            class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition-colors duration-200">
                        Rechercher
                    </button>
                </div>
            </form>
        </div>

        <!-- Contacts Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="?sort=nom&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}" 
                               class="flex items-center space-x-1 hover:text-blue-600">
                                <span>Nom</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                </svg>
                            </a>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="?sort=prenom&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}"
                               class="flex items-center space-x-1 hover:text-blue-600">
                                <span>Prénom</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                </svg>
                            </a>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($contacts as $contact)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $contact->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $contact->prenom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $contact->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <a href="{{ route('contacts.show', $contact) }}" 
                                   class="text-blue-600 hover:text-blue-800">Voir</a>
                                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contact ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">
                                Aucun contact trouvé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $contacts->links() }}
        </div>
    </div>
</div>
@endsection