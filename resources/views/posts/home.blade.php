
@extends('layout')
<link href="{{ mix('css/pages/home.css') }}" rel="stylesheet">
@section('title','Home')


@section('main')
    <h1>Liste des Posts</h1>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif








    @if ($posts->isEmpty())
        <p>Aucun post disponible.</p>
    @else
    
    
                <div class="latest">
                   
                    @if($latestPost->image)
                    <img src="{{ $latestPost->image->path }}" alt="Latest Post Image" class="background-image">
                    @else 
                    <p>n'exsit pas de image </p>
                    @endif
                    <div class='overlay-text'>
                    <h2>{{ $latestPost->title }}</h2>
                    <!--<p>{{ $latestPost->content }}</p>-->
                    <p><strong>Author:</strong> {{ $latestPost->user->name }}</p>
                    <p><strong>Published on:</strong> {{ $latestPost->created_at }}</p>
                    </div>
                </div>
            <div class="posts">
            @foreach ($posts as $post)
                <div class='post-card'>
                    @if ($post->image)
                        <img src="{{ $post->image->path }}" alt="{{ $post->image->alt_text }}" class="post-image">
                    @else
                        <img src="https://via.placeholder.com/640x480.png/00ee22?text=No+Image" alt="No Image" class="post-image">
                    @endif
                    <div class="post-content">
                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->content }}</p>
                        <p><strong>Author:</strong> {{ $post->user->name }}</p>
                        <p><strong>Published on:</strong> {{ $post->created_at }}</p>
                    </div>
                </div>
            @endforeach
            </div>
    @endif
@endsection


    