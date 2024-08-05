@extends('admin.layout')
@section('title', 'Edit User - Admin')
@section('main')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Modifier l'utilisateur : <strong>{{ $user->name }}</strong></h1>
    
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Informations de l'utilisateur</h2>
            <p><strong>Nom :</strong> {{ $user->name }}</p>
            <p><strong>Email :</strong> {{ $user->email }}</p>

            <div class="mt-4">
                <label for="is_active" class="block text-sm font-medium text-gray-700">État du compte</label>
                <select id="is_active" name="is_active" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="1" {{ $user->is_active ? 'selected' : '' }}>Actif</option>
                    <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Désactivé</option>
                </select>
            </div>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Retour à la liste</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enregistrer les modifications</button>
        </div>
    </form>
</div>
@endsection
