@extends('admin.layout')
@section('title', 'Edite Post- Admin')
@section('main')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-6">Éditer le Post</h1>
    
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Titre</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" class="w-full p-3 border border-gray-300 rounded-lg" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-semibold mb-2">Contenu</label>
            <textarea id="content" name="content" rows="6" class="w-full p-3 border border-gray-300 rounded-lg" required>{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('admin.posts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Annuler</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Mettre à jour</button>
        </div>
    </form>
</div>
@endsection
