<!-- show.blade.php -->
@extends('layouts.newapp')

@section('title', 'Détails du Contact')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Détails du Contact</h1>
        
        <div class="overflow-hidden rounded-lg border border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
                <div class="space-y-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Nom</h3>
                        <p class="mt-1 text-lg text-gray-900">{{ $contact->nom }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Prénom</h3>
                        <p class="mt-1 text-lg text-gray-900">{{ $contact->prenom }}</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Email</h3>
                        <p class="mt-1 text-lg text-gray-900">{{ $contact->email }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Description</h3>
                        <p class="mt-1 text-lg text-gray-900">{{ $contact->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('contacts.index') }}" 
               class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors duration-200">
                Retour à la liste
            </a>
        </div>
    </div>
</div>
@endsection