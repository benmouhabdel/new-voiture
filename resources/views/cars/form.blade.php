@php
$isEdit = isset($car);
$route = $isEdit ? route('cars.update', $car) : route('cars.store');
@endphp

<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <form action="{{ $route }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if($isEdit) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom du véhicule</label>
                    <input type="text" name="name" id="name" 
                           value="{{ old('name', $isEdit ? $car->name : '') }}" 
                           class="mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="marque" class="block text-sm font-medium text-gray-700">Marque</label>
                    <input type="text" name="marque" id="marque"
                           value="{{ old('marque', $isEdit ? $car->marque : '') }}"
                           class="mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('marque')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="model" class="block text-sm font-medium text-gray-700">Modèle</label>
                    <input type="text" name="model" id="model"
                           value="{{ old('model', $isEdit ? $car->model : '') }}"
                           class="mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('model')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4"
                              class="mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $isEdit ? $car->description : '') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label for="price_per_day" class="block text-sm font-medium text-gray-700">Prix par jour (€)</label>
                    <input type="number" name="price_per_day" id="price_per_day" 
                           value="{{ old('price_per_day', $isEdit ? $car->price_per_day : '') }}"
                           class="mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('price_per_day')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="place" class="block text-sm font-medium text-gray-700">Nombre de places</label>
                    <input type="number" name="place" id="place" min="1"
                           value="{{ old('place', $isEdit ? $car->place : '') }}"
                           class="mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('place')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Type de transmission</label>
                    <div class="flex gap-4">
                        <div class="relative">
                            <input type="radio" name="automatique" id="manuelle" value="0" 
                                {{ old('automatique', $isEdit ? ($car->automatique ?? '0') : '0') === '0' ? 'checked' : '' }}
                                class="peer absolute opacity-0">
                            <label for="manuelle" 
                                class="flex items-center justify-center px-4 py-2 border-2 rounded-lg cursor-pointer
                                peer-checked:border-indigo-600 peer-checked:bg-indigo-50 peer-checked:text-indigo-600
                                border-gray-200 hover:bg-gray-50">
                                Manuelle
                            </label>
                        </div>
                        <div class="relative">
                            <input type="radio" name="automatique" id="automatique" value="1" 
                                {{ old('automatique', $isEdit ? ($car->automatique ?? '0') : '0') === '1' ? 'checked' : '' }}
                                class="peer absolute opacity-0">
                            <label for="automatique"
                                class="flex items-center justify-center px-4 py-2 border-2 rounded-lg cursor-pointer
                                peer-checked:border-indigo-600 peer-checked:bg-indigo-50 peer-checked:text-indigo-600
                                border-gray-200 hover:bg-gray-50">
                                Automatique
                            </label>
                        </div>
                    </div>
                    @error('automatique')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Type de carburant</label>
                    <div class="flex gap-4">
                        <div class="relative">
                            <input type="radio" name="diesel" id="essence" value="0"
                                {{ old('diesel', $isEdit ? ($car->diesel ?? '0') : '0') === '0' ? 'checked' : '' }}
                                class="peer absolute opacity-0">
                            <label for="essence"
                                class="flex items-center justify-center px-4 py-2 border-2 rounded-lg cursor-pointer
                                peer-checked:border-indigo-600 peer-checked:bg-indigo-50 peer-checked:text-indigo-600
                                border-gray-200 hover:bg-gray-50">
                                Essence
                            </label>
                        </div>
                        <div class="relative">
                            <input type="radio" name="diesel" id="diesel" value="1"
                                {{ old('diesel', $isEdit ? ($car->diesel ?? '0') : '0') === '1' ? 'checked' : '' }}
                                class="peer absolute opacity-0">
                            <label for="diesel"
                                class="flex items-center justify-center px-4 py-2 border-2 rounded-lg cursor-pointer
                                peer-checked:border-indigo-600 peer-checked:bg-indigo-50 peer-checked:text-indigo-600
                                border-gray-200 hover:bg-gray-50">
                                Diesel
                            </label>
                        </div>
                    </div>
                    @error('diesel')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="photos" class="block text-sm font-medium text-gray-700">Photos</label>
                    <input type="file" multiple name="photos[]" id="photos" accept="image/*"
                           class="mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 
                                  file:rounded-full file:border-0 file:text-sm file:font-semibold 
                                  file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    @error('photos')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                @if($isEdit && $car->photos->count() > 0)
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Photos existantes</label>
                        <div class="grid grid-cols-3 gap-2">
                            @foreach($car->photos as $photo)
                                <div class="relative group">
                                    <img src="{{ Storage::url($photo->photo_path) }}" alt="Photo véhicule"
                                         class="h-20 w-20 object-cover rounded">
                                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center 
                                                opacity-0 group-hover:opacity-100 transition-opacity">
                                        <input type="checkbox" name="delete_photos[]" value="{{ $photo->id }}"
                                               class="w-4 h-4 text-red-600 rounded">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <p class="text-sm text-gray-500">Cochez les photos à supprimer</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('cars.index') }}"
               class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">
                Annuler
            </a>
            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                {{ $isEdit ? 'Mettre à jour' : 'Créer' }}
            </button>
        </div>
    </form>
</div>