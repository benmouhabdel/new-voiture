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
                <label for="marque" class="block text-sm font-medium text-gray-700">Marque</label>
                <input type="text" name="marque" id="marque"
                    value="{{ old('marque', $isEdit ? $car->marque : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="model" class="block text-sm font-medium text-gray-700">Modèle</label>
                <input type="text" name="model" id="model"
                    value="{{ old('model', $isEdit ? $car->model : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $isEdit ? $car->description : '') }}</textarea>
            </div>

            <div>
                <label for="price_per_day" class="block text-sm font-medium text-gray-700">Prix par jour (€)</label>
                <input type="number" name="price_per_day" id="price_per_day"
                    value="{{ old('price_per_day', $isEdit ? $car->price_per_day : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <label for="place" class="block text-sm font-medium text-gray-700">Nombre de places</label>
                <input type="number" name="place" id="place"
                    value="{{ old('place', $isEdit ? $car->place : '') }}"
                    min="1"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    <input type="checkbox" name="automatique" id="automatique" value="1"
                        {{ old('automatique', $isEdit && $car->automatique ? 'checked' : '') }}
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <label for="automatique" class="ml-2 block text-sm text-gray-700">Boîte automatique</label>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="diesel" id="diesel" value="1"
                        {{ old('diesel', $isEdit && $car->diesel ? 'checked' : '') }}
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <label for="diesel" class="ml-2 block text-sm text-gray-700">Moteur diesel</label>
                </div>
            </div>

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