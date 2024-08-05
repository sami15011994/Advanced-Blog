<!DOCTYPE html>
<html lang="fr">
<head>
    <title>@yield('title', 'Liste des Posts')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <!-- header -->
    <header class="bg-gradient-to-r from-blue-800 to-blue-600 text-white shadow-md">
        <nav class="container mx-auto flex justify-between items-center p-6">
            <div class="logo">
                <a href="{{ route('posts.home') }}" class="text-3xl font-extrabold hover:text-gray-200 transition-colors">My Blog</a>
            </div>
            <div class="menu flex space-x-6">
                <a href="{{ route('posts.home') }}" class="text-lg hover:text-gray-200 transition-colors duration-300 ease-in-out hover:underline">Home</a>
                <a href="{{ route('categories.index') }}" class="text-lg hover:text-gray-200 transition-colors duration-300 ease-in-out hover:underline">Categories</a>
                <a href="{{ route('about') }}" class="text-lg hover:text-gray-200 transition-colors duration-300 ease-in-out hover:underline">About</a>
                <a href="{{ route('contact.show') }}" class="text-lg hover:text-gray-200 transition-colors duration-300 ease-in-out hover:underline">Contact</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-lg hover:text-gray-200 transition-colors duration-300 ease-in-out hover:underline">Articles</a>
                    <a href="{{ route('profile.index') }}" class="text-lg hover:text-gray-200 transition-colors duration-300 ease-in-out hover:underline">Mon Profile</a>
                @endauth
                <x-auth-links />
            </div>
        </nav>
    </header>

    <!-- main -->
    <main class="container mx-auto p-8">
        @yield('main')
    </main>

    <!-- footer -->
    <footer class="bg-gray-800 text-gray-400 py-6 mt-12">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Mon Entreprise. Tous droits réservés. | <a href="#" class="hover:text-white transition-colors">Politique de confidentialité</a></p>
        </div>
    </footer>
</body>
</html>
