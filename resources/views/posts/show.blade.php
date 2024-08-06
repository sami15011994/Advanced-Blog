@extends('layout')

@section('title', 'Détails du Post')

@section('main')
    <section class="post-details">
        <header class="post-header">
            <h1 class="post-title">Détails du Post</h1>
        </header>
        
        <article class="post-content">
            <h2 class="post-heading">{{ $post->title }}</h2>
            <p class="post-text">{{ $post->content }}</p>
            <div class="post-meta">
                <p><strong>Catégorie :</strong>
                
                <ul class="list-disc pl-5 mb-4">
                @foreach ($categories as $category)
                    <li class="text-gray-700">{{ $category->name }}</li>
                @endforeach
            </ul>
            </p>
                <p><strong>Auteur :</strong> {{ $post->user->name }}</p>
                <p><strong>Publié le :</strong> {{ $post->created_at }}</p>
            </div>
               <!--  

               <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce post ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                sss -->
                </article>
    

    <!-- Formulaire pour ajouter un commentaire -->
<form action="{{ route('comments.store', $post->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md mb-6">
    @csrf
    <div class="form-group mb-4">
        <label for="body" class="block text-gray-700 font-semibold mb-2">Ajouter un commentaire</label>
        <textarea id="body" name="content" class="form-control w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3" required></textarea>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Commenter</button>
</form>

<!-- Liste des commentaires -->
<div class="comments mt-6">
    @foreach($comments as $comment)
        <div class="comment bg-white p-4 rounded-lg shadow-sm mb-4">
            <p class="text-gray-800"><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
            @if(auth()->user() && auth()->user()->id === $comment->user_id)
                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Supprimer</button>
                </form>
            @endif
        </div>
    @endforeach
</div>



    </section>
@endsection



    <!-- Styles spécifiques à cette vue -->
    <link href="{{ mix('css/pages/show.css') }}" rel="stylesheet">

