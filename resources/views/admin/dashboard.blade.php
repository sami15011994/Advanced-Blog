@extends('admin.layout')
@section('title', 'Tableau de Bord - Admin')
@section('main')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tableau de Bord de l'Administrateur</h1>
    <p class="mb-6 text-gray-600">Bienvenue sur le tableau de bord administratif. Utilisez les boutons ci-dessous pour gérer les utilisateurs et les posts.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Gestion des Utilisateurs -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Gestion des Utilisateurs</h2>
            <p class="text-gray-700 mb-4">Gérez les utilisateurs de votre application, activez ou désactivez leurs comptes, et modifiez leurs informations.</p>
            <a href="{{ route('admin.users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Voir les Utilisateurs</a>
        </div>

        <!-- Gestion des Posts -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Gestion des Posts</h2>
            <p class="text-gray-700 mb-4">Gérez les posts publiés sur le site, éditez ou supprimez des posts, et voyez un aperçu des contenus.</p>
            <a href="{{ route('admin.posts.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Voir les Posts</a>
        </div>

        <!-- Autres Actions -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Autres Actions</h2>
            <p class="text-gray-700 mb-4">Accédez à d'autres fonctionnalités administratives ou consultez des rapports et statistiques.</p>
            <!-- Ajoutez d'autres liens ou actions si nécessaire -->
        </div>
    </div>
</div>
@endsection
