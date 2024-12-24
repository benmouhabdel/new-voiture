{{-- show.blade.php --}}
@extends('layouts.newapp')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-lg shadow-lg">
        <div class="p-6">
            {{-- Header section --}}
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">{{ $car->name }}</h1>
                <div class="flex gap-3">
                    <a href="{{ route('cars.edit', $car) }}"
                       class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        Modifier
                    </a>
                    <form action="{{ route('cars.destroy', $car) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700"
                                onclick="return confirm('Confirmer la suppression ?')">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- Custom Carousel Section --}}
                <div class="relative">
                    <h2 class="text-xl font-semibold mb-4">Galerie photos</h2>
                    @if($car->photos->isNotEmpty())
                        <div class="carousel-container relative group rounded-xl overflow-hidden">
                            <div class="carousel flex transition-transform duration-500">
                                @foreach($car->photos as $index => $photo)
                                    <div class="carousel-slide flex-none w-full">
                                        <img src="{{ Storage::url($photo->photo_path) }}" 
                                             class="w-full h-[400px] object-cover transition-transform duration-500 hover:scale-105"
                                             alt="Photo {{ $car->name }}">
                                    </div>
                                @endforeach
                            </div>
                            
                            {{-- Custom Navigation Buttons --}}
                            <button class="carousel-button prev absolute left-4 top-1/2 -translate-y-1/2 bg-white/30 backdrop-blur-sm hover:bg-white/50 w-10 h-10 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>
                            <button class="carousel-button next absolute right-4 top-1/2 -translate-y-1/2 bg-white/30 backdrop-blur-sm hover:bg-white/50 w-10 h-10 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                            
                            {{-- Custom Indicators --}}
                            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                                @foreach($car->photos as $index => $photo)
                                    <button type="button" 
                                            class="carousel-dot w-2 h-2 rounded-full transition-colors duration-300 {{ $index === 0 ? 'bg-white' : 'bg-white/50 hover:bg-white/75' }}"
                                            data-index="{{ $index }}">
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        {{-- Add Custom JavaScript for Carousel --}}
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const carousel = document.querySelector('.carousel');
                                const slides = document.querySelectorAll('.carousel-slide');
                                const dots = document.querySelectorAll('.carousel-dot');
                                const prevButton = document.querySelector('.carousel-button.prev');
                                const nextButton = document.querySelector('.carousel-button.next');
                                let currentIndex = 0;

                                function updateCarousel() {
                                    carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
                                    
                                    // Update dots
                                    dots.forEach((dot, index) => {
                                        dot.classList.toggle('bg-white', index === currentIndex);
                                        dot.classList.toggle('bg-white/50', index !== currentIndex);
                                    });
                                }

                                function nextSlide() {
                                    currentIndex = (currentIndex + 1) % slides.length;
                                    updateCarousel();
                                }

                                function prevSlide() {
                                    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                                    updateCarousel();
                                }

                                // Event listeners
                                prevButton?.addEventListener('click', prevSlide);
                                nextButton?.addEventListener('click', nextSlide);

                                dots.forEach((dot, index) => {
                                    dot.addEventListener('click', () => {
                                        currentIndex = index;
                                        updateCarousel();
                                    });
                                });

                                // Keyboard navigation
                                document.addEventListener('keydown', (e) => {
                                    if (e.key === 'ArrowLeft') {
                                        prevSlide();
                                    } else if (e.key === 'ArrowRight') {
                                        nextSlide();
                                    }
                                });
                            });
                        </script>
                    @else
                        <div class="bg-gray-100 rounded-lg p-8 text-center text-gray-500">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="mt-2 font-medium">Aucune photo disponible</p>
                        </div>
                    @endif
                </div>

                {{-- Car Details Section --}}
                <div class="space-y-6">
                    <div>
                        <h2 class="text-xl font-semibold mb-4">Caractéristiques</h2>
                        <dl class="grid grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm text-gray-500">Marque</dt>
                                <dd class="text-gray-900 font-medium">{{ $car->marque }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500">Modèle</dt>
                                <dd class="text-gray-900 font-medium">{{ $car->model }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500">Prix par jour</dt>
                                <dd class="text-indigo-600 font-bold">{{ $car->price_per_day }} DH</dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500">Places</dt>
                                <dd class="text-gray-900 font-medium">{{ $car->place }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500">Transmission</dt>
                                <dd class="text-gray-900 font-medium">{{ $car->automatique ? 'Automatique' : 'Manuelle' }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500">Carburant</dt>
                                <dd class="text-gray-900 font-medium">{{ $car->diesel ? 'Diesel' : 'Essence' }}</dd>
                            </div>
                        </dl>
                    </div>

                    @if($car->description)
                        <div>
                            <h2 class="text-xl font-semibold mb-2">Description</h2>
                            <p class="text-gray-700">{{ $car->description }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('cars.index') }}" 
                   class="text-indigo-600 hover:text-indigo-800 font-medium">
                    ← Retour à la liste
                </a>
            </div>
        </div>
    </div>
</div>
@endsection