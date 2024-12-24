@extends('layouts.newapp')

@section('title', 'Détails du Contact')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Détails du Contact</h1>
            <div class="space-x-3">
            
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contact ?')">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
        
        <div class="overflow-hidden rounded-lg border border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Nom</h3>
                        <p class="mt-2 text-lg text-gray-900">{{ $contact->nom }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Prénom</h3>
                        <p class="mt-2 text-lg text-gray-900">{{ $contact->prenom }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Email</h3>
                        <p class="mt-2 text-lg text-gray-900">{{ $contact->email }}</p>
                    </div>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Message</h3>
                    <p class="mt-2 text-lg text-gray-900 whitespace-pre-wrap">{{ $contact->message }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-between items-center">
            <p class="text-sm text-gray-500">
                Créé le {{ $contact->created_at->format('d/m/Y H:i') }}
            </p>
            <a href="{{ route('contacts.index') }}" 
               class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors duration-200">
                Retour à la liste
            </a>
        </div>
    </div>
</div>
@endsection