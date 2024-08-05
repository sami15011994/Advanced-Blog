<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tableau de Bord')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="bg-gray-800 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-xl font-bold">Application</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('admin.dashboard') }}" class="hover:underline">Tableau de Bord</a></li>
                    <li><a href="{{ route('admin.users.index') }}" class="hover:underline">Utilisateurs</a></li>
                    <li><a href="{{ route('admin.posts.index') }}" class="hover:underline">Posts</a></li>
                    
                    <li><x-auth-links /></li>
                    <!-- Ajoutez d'autres liens si nécessaire -->
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('main')
    </main>

    <footer class="bg-gray-800 text-white p-4">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} Application. Tous droits réservés.
        </div>
    </footer>
</body>
</html>
