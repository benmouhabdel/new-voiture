@php
$isEdit = isset($car);
$route = $isEdit ? route('cars.update', $car) : route('cars.store');
@endphp

<form action="{{ $route }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nom du véhicule</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name', $isEdit ? $car->name : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="model" class="block text-sm font-medium text-gray-700">Modèle</label>
                <input type="text" name="model" id="model"
                    value="{{ old('model', $isEdit ? $car->model : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="price_per_day" class="block text-sm font-medium text-gray-700">Prix par jour (€)</label>
                <input type="number" name="price_per_day" id="price_per_day"
                    value="{{ old('price_per_day', $isEdit ? $car->price_per_day : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="is_available" class="block text-sm font-medium text-gray-700">Disponibilité</label>
                <select name="is_available" id="is_available"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="1" {{ old('is_available', $isEdit ? $car->is_available : '') == 1 ? 'selected' : '' }}>
                        Disponible
                    </option>
                    <option value="0" {{ old('is_available', $isEdit ? $car->is_available : '') == 0 ? 'selected' : '' }}>
                        Non disponible
                    </option>
                </select>
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <label for="photos" class="block text-sm font-medium text-gray-700">
                    Photos du véhicule
                </label>
                <input type="file" multiple name="photos[]" id="photos"
                    class="mt-1 block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100">
            </div>
            @if($isEdit && $car->photos->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">
                    @foreach($car->photos as $photo)
                        <div class="relative">
                            <img src="{{ Storage::url($photo->photo_path) }}"
                                alt="Photo véhicule"
                                class="h-20 w-20 object-cover rounded">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="flex justify-end space-x-4">
        <a href="{{ route('cars.index') }}"
            class="bg-gray-200 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Annuler
        </a>
        <button type="submit"
            class="bg-blue-500 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            {{ $isEdit ? 'Mettre à jour' : 'Créer' }} la voiture
        </button>
    </div>
</form>