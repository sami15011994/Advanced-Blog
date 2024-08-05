

@extends('layout')
<title>@yield('title', 'Contact')</title>
@section('main')
<div id="main-container">
    <h1>Contactez-nous</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
        @csrf
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message :</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
</div>
@endsection
<link href="{{ mix('css/pages/contact.css') }}" rel="stylesheet">