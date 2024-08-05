@extends('admin.layout')
@section('title', 'Create Post - Admin')
@section('main')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Créer un Post (Admin)</h1>
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Titre</label>
            <input type="text" id="title" name="title" class="form-input mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700">Contenu</label>
            <textarea id="content" name="content" class="form-textarea mt-1 block w-full" rows="5" required></textarea>
        </div>
        <div class="mb-4">
            <label for="user_id" class="block text-gray-700">ID Utilisateur</label>
            <input type="text" id="user_id" name="user_id" class="form-input mt-1 block w-full" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Créer</button>
    </form>
</div>
@endsection
