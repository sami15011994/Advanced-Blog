@extends('admin.layout')

@section('title', 'Détails du Post')

@section('main')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Détails du Post</h1>
    
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Contenu :</label>
            <p class="text-gray-900">{{ $post->content }}</p>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Catégories :</label>
            <ul class="list-disc pl-5">
                @foreach($post->categories as $category)
                    <li class="text-gray-900">{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="flex space-x-2">
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Modifier</a>
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Supprimer</button>
            </form>
            <a href="{{ route('admin.posts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Retour à la Liste</a>
        </div>
    </div>
</div>
@endsection
