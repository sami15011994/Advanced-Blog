@extends('layout')
<title>@yield('title', 'Daschbord Posts')</title>
@section('main')

<h1 class="text-blue-500 font-serif text-3xl font-semibold mb-4">My Daschbord</h1>

<div class="container mx-auto p-4">

 

        <!-- Bouton pour créer un nouveau post -->
    <div class="mb-4">
        <a href="{{ route('posts.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Créer un Post</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('images/blog.jpeg') }}" alt="{{ $post->title }}">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                    <p class="text-gray-700 mb-4">{{ Str::limit($post->content, 100) }}</p>
                    <div class="flex space-x-2">
                        <a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Éditer</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-blue-600">Supprimer</button>

                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<h2 class="text-gray-500 font-serif text-2xl mb-4">
Articles <strong>{{ $user->name }}</strong>
</h2>
@endsection

