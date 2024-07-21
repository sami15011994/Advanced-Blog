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
                <p><strong>Catégorie :</strong> {{ $post->category->name }}</p>
                <p><strong>Auteur :</strong> {{ $post->user->name }}</p>
                <p><strong>Publié le :</strong> {{ $post->created_at }}</p>
            </div>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce post ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                </article>
    </section>
@endsection



    <!-- Styles spécifiques à cette vue -->
    <link href="{{ mix('css/pages/show.css') }}" rel="stylesheet">

