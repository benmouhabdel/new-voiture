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

                <div class="relative group">
                    <a href="{{ route('cars.index') }}" 
                       class="py-4 px-2 text-gray-500 hover:text-gray-900 {{ request()->routeIs('cars.*') ? 'border-b-2 border-blue-500' : '' }}">
                        Voitures
                    </a>
                    <div class="absolute hidden group-hover:block w-48 bg-white shadow-lg py-2 mt-4">
                        <a href="{{ route('cars.index') }}" 
                           class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Liste des voitures
                        </a>
                        <a href="{{ route('cars.create') }}" 
                           class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Ajouter une voiture
                        </a>
                    </div>
                </div>

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
