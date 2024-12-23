@extends('layouts.newapp')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-8 text-2xl font-bold text-gray-800">Créer un Contact</h1>
    <div class="max-w-2xl mx-auto">
        <form method="POST" action="{{ route('contacts.store') }}" class="space-y-6 bg-white p-8 shadow-md rounded-lg">
            @csrf
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="nom" id="nom" 
                    value="{{ old('nom') }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                    required>
                @error('nom') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                <input type="text" name="prenom" id="prenom" 
                    value="{{ old('prenom') }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                    required>
                @error('prenom') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" 
                    value="{{ old('email') }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                    required>
                @error('email') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea name="message" id="message" rows="5" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                    required>{{ old('message') }}</textarea>
                @error('message') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Enregistrer
                </button>
                <a href="{{ route('contacts.index') }}" class="text-gray-500 hover:text-gray-700 underline">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
