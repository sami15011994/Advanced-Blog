@extends('layout')
@section('title','nouvelle post')
@section('main')
 <h1>Créer un Nouveau Post</h1>
    
    <x-post-form :post="null" :action="route('posts.store')" :method="'POST'" :categories="$categories" />
@endsection   

<link href="{{ mix('css/pages/create.css') }}" rel="stylesheet">

