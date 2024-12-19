@php
$isEdit = isset($reservation);
$route = $isEdit ? route('reservations.update', $reservation) : route('reservations.store');
@endphp

<form action="{{ $route }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Informations personnelles -->
        <div class="space-y-4">
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">Prénom</label>
                <input type="text" name="first_name" id="first_name" 
                    value="{{ old('first_name', $isEdit ? $reservation->first_name : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="last_name" id="last_name" 
                    value="{{ old('last_name', $isEdit ? $reservation->last_name : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" 
                    value="{{ old('email', $isEdit ? $reservation->email : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Téléphone</label>
                <input type="text" name="phone_number" id="phone_number" 
                    value="{{ old('phone_number', $isEdit ? $reservation->phone_number : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                <textarea name="address" id="address" rows="3" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('address', $isEdit ? $reservation->address : '') }}</textarea>
            </div>
        </div>

        <!-- Détails de la réservation -->
        <div class="space-y-4">
            <div>
                <label for="car_id" class="block text-sm font-medium text-gray-700">Voiture</label>
                <select name="car_id" id="car_id" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Sélectionnez une voiture</option>
                    @foreach($cars as $car)
                        <option value="{{ $car->id }}" 
                            {{ old('car_id', $isEdit ? $reservation->car_id : '') == $car->id ? 'selected' : '' }}>
                            {{ $car->name }} - {{ $car->model }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="reservation_date_start" class="block text-sm font-medium text-gray-700">Date de début</label>
                <input type="date" name="reservation_date_start" id="reservation_date_start" 
                    value="{{ old('reservation_date_start', $isEdit ? $reservation->reservation_date_start->format('Y-m-d') : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="reservation_date_end" class="block text-sm font-medium text-gray-700">Date de fin</label>
                <input type="date" name="reservation_date_end" id="reservation_date_end" 
                    value="{{ old('reservation_date_end', $isEdit ? $reservation->reservation_date_end->format('Y-m-d') : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="national_id_photo" class="block text-sm font-medium text-gray-700">Photo de la carte d'identité</label>
                <input type="file" name="national_id_photo" id="national_id_photo" 
                    class="mt-1 block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100">
                @if($isEdit && $reservation->national_id_photo)
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">Photo actuelle disponible</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="flex justify-end space-x-4">
        <a href="{{ route('reservations.index') }}" 
            class="bg-gray-200 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Annuler
        </a>
        <button type="submit" 
            class="bg-blue-500 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            {{ $isEdit ? 'Mettre à jour' : 'Créer' }} la réservation
        </button>
    </div>
</form>