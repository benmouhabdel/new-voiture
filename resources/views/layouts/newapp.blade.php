<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location de Voitures - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen flex flex-col">
    <!-- Navigation améliorée -->
    <nav class="bg-white shadow-md fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo Section -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center space-x-2">
                        <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                            AutoLoc
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-600 hover:text-blue-600 px-3 py-2 transition-colors duration-200">
                        Accueil
                    </a>

                    <!-- Dropdown Voitures -->
                    <div class="relative group">
                        <button class="flex items-center text-gray-600 hover:text-blue-600 group-hover:text-blue-600 px-3 py-2 transition-colors duration-200">
                            <span>Voitures</span>
                            <svg class="ml-2 h-4 w-4 transition-transform duration-200 group-hover:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-0 translate-y-1">
                            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                <div class="relative bg-white p-2">
                                    <a href="{{ route('cars.index') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 rounded-md transition-colors duration-150">
                                        Liste des voitures
                                    </a>
                        
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dropdown Réservations -->
                    <div class="relative group">
                        <button class="flex items-center text-gray-600 hover:text-blue-600 group-hover:text-blue-600 px-3 py-2 transition-colors duration-200">
                            <span>Réservations</span>
                            <svg class="ml-2 h-4 w-4 transition-transform duration-200 group-hover:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-0 translate-y-1">
                            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                <div class="relative bg-white p-2">
                                    <a href="{{ route('reservations.index') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 rounded-md transition-colors duration-150">
                                        Liste des réservations
                                    </a>
                                    <a href="{{ route('reservations.create') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 rounded-md transition-colors duration-150">
                                        Nouvelle réservation
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Nouveau Dropdown Contacts -->
                    <div class="relative group">
                        <button class="flex items-center text-gray-600 hover:text-blue-600 group-hover:text-blue-600 px-3 py-2 transition-colors duration-200">
                            <span>Contacts</span>
                            <svg class="ml-2 h-4 w-4 transition-transform duration-200 group-hover:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-0 translate-y-1">
                            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                <div class="relative bg-white p-2">
                                    <a href="{{ route('contacts.index') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 rounded-md transition-colors duration-150">
                                        Liste des contacts
                                    </a>
        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-blue-600 hover:bg-gray-100 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="hidden mobile-menu md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition duration-150 ease-in-out">
                    Accueil
                </a>
                <a href="{{ route('cars.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition duration-150 ease-in-out">
                    Liste des voitures
                </a>
                <a href="{{ route('reservations.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition duration-150 ease-in-out">
                    Liste des réservations
                </a>
                <a href="{{ route('reservations.create') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition duration-150 ease-in-out">
                    Nouvelle réservation
                </a>
                <!-- Nouveaux liens pour Contacts dans le menu mobile -->
                <a href="{{ route('contacts.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition duration-150 ease-in-out">
                    Liste des contacts
                </a>
                <a href="{{ route('contacts.create') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition duration-150 ease-in-out">
                    Ajouter un contact
                </a>
            </div>
        </div>
    </nav>

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
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors duration-200">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.95,4.57a10,10,0,0,1-2.82.77,4.96,4.96,0,0,0,2.16-2.72,9.9,9.9,0,0,1-3.12,1.19,4.92,4.92,0,0,0-8.39,4.49A14,14,0,0,1,1.64,3.16,4.92,4.92,0,0,0,3.2,9.72,4.86,4.86,0,0,1,1,9.13v.06a4.93,4.93,0,0,0,3.95,4.83,4.86,4.86,0,0,1-2.22.08,4.93,4.93,0,0,0,4.6,3.42A9.87,9.87,0,0,1,0,19.54a13.94,13.94,0,0,0,7.55,2.21,13.89,13.89,0,0,0,13.95-14c0-.21,0-.42-.01-.63A10,10,0,0,0,24,4.59l-.05-.02Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-200">
                <p class="text-center text-gray-500 text-sm">
                    © {{ date('Y') }} AutoLoc. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>-->


