<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoLoc - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<nav class="bg-white shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('welcome') }}" class="text-xl font-bold text-gray-800 hover:text-gray-900 py-4">
                AutoLoc
            </a>

            <!-- Menu principal -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('welcome') }}" 
                   class="py-4 px-2 text-gray-500 hover:text-gray-900 {{ request()->routeIs('welcome') ? 'border-b-2 border-blue-500' : '' }}">
                    Accueil
                </a>

<<<<<<< HEAD
    <!-- Main Content avec padding-top pour compenser la navbar fixed -->
    <main class="flex-grow pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-r-lg transform transition-all duration-300 hover:scale-101" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r-lg" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <ul class="list-disc list-inside text-sm text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Footer amélioré -->
    <!-- <footer class="bg-white shadow-inner mt-auto">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center md:text-left">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">À propos</h3>
                    <p class="text-gray-600 text-sm">
                        AutoLoc, votre partenaire de confiance pour la location de véhicules depuis 2024.
                    </p>
                </div>
                <div class="text-center">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact</h3>
                    <p class="text-gray-600 text-sm">
                        Email: contact@autoloc.fr<br>
                        Tél: +33 1 23 45 67 89
                    </p>
                </div>
                <div class="text-center md:text-right">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Suivez-nous</h3>
                    <div class="flex justify-center md:justify-end space-x-4">
                        <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors duration-200">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.77,7.46H14.5v-1.9c0-.9.6-1.1,1-1.1h3V.5L14.17.5C10.24.5,9.1,3.3,9.1,5.47V7.46H5.23v3.4H9.1V21.5h5.41V10.86h4.72l.58-3.4Z"/>
                            </svg>
=======
                <div class="relative group">
                    <a href="{{ route('cars.index') }}" 
                       class="py-4 px-2 text-gray-500 hover:text-gray-900 {{ request()->routeIs('cars.*') ? 'border-b-2 border-blue-500' : '' }}">
                        Voitures
                    </a>
                    <div class="absolute hidden group-hover:block w-48 bg-white shadow-lg py-2 mt-4">
                        <a href="{{ route('cars.index') }}" 
                           class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Liste des voitures
>>>>>>> 4f2892c9e969eb3e3989c8c97f21ca5b04b10877
                        </a>
                        <a href="{{ route('cars.create') }}" 
                           class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Ajouter une voiture
                        </a>
                    </div>
                </div>
<<<<<<< HEAD
            </div>
            <div class="mt-8 pt-8 border-t border-gray-200">
                <p class="text-center text-gray-500 text-sm">
                    © {{ date('Y') }} AutoLoc. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>-->


=======

                <div class="relative group">
                    <a href="{{ route('reservations.index') }}" 
                       class="py-4 px-2 text-gray-500 hover:text-gray-900 {{ request()->routeIs('reservations.*') ? 'border-b-2 border-blue-500' : '' }}">
                        Réservations
                    </a>
                    <div class="absolute hidden group-hover:block w-48 bg-white shadow-lg py-2 mt-4">
                        <a href="{{ route('reservations.index') }}" 
                           class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Liste des réservations
                        </a>
                        <a href="{{ route('reservations.create') }}" 
                           class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Nouvelle réservation
                        </a>
                    </div>
                </div>

                <!-- Bouton Contact -->
                <a href="{{ route('contacts.index') }}" 
                   class="py-2 px-4 text-white bg-blue-500 hover:bg-blue-600 rounded-lg">
                    Contact
                </a>
            </div>

            <!-- Bouton Menu Mobile -->
            <button class="md:hidden flex items-center mobile-menu-button focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Menu mobile -->
    <div class="hidden mobile-menu md:hidden">
        <a href="{{ route('welcome') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">Accueil</a>
        <a href="{{ route('cars.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">Voitures</a>
        <a href="{{ route('cars.create') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">Ajouter une voiture</a>
        <a href="{{ route('reservations.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">Réservations</a>
        <a href="{{ route('reservations.create') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">Nouvelle réservation</a>
        <a href="{{ route('contacts.index') }}" class="block py-2 px-4 text-sm bg-blue-500 text-white hover:bg-blue-600 rounded-lg text-center">Contact</a>
    </div>
</nav>

<main class="max-w-6xl mx-auto mt-6 px-4">
    @yield('content')
</main>

<footer class="bg-white shadow-lg mt-12">
    <div class="max-w-6xl mx-auto px-4 py-6 text-center text-gray-600">
        © {{ date('Y') }} AutoLoc. Tous droits réservés.
    </div>
</footer>

<script>
    // Menu mobile toggle
    document.querySelector('.mobile-menu-button').addEventListener('click', function() {
        document.querySelector('.mobile-menu').classList.toggle('hidden');
    });
</script>

</body>
</html>
>>>>>>> 4f2892c9e969eb3e3989c8c97f21ca5b04b10877
