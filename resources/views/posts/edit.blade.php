@extends('layout')
@section('title','edit post')
@section('main')
<h1>Éditer le Post</h1>
<x-post-form :post="$post" action="{{ route('posts.update', $post->id) }}" :method=" 'PUT' " :categories="$categories"/>
@endsection   

<link href="{{ mix('css/pages/edit.css') }}" rel="stylesheet">
