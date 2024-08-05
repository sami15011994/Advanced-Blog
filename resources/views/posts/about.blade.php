
@extends('layout')
<title>@yield('title', 'About')</title>
@section('main')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-gray-800 text-white p-6">
            <h1 class="text-3xl font-bold">À Propos de Nous</h1>
        </div>
        <div class="p-6">
            <p class="text-lg mb-4">
                Bienvenue sur notre page à propos ! Nous sommes une entreprise passionnée par la création de solutions innovantes et adaptées aux besoins de nos clients.
            </p>
            <p class="text-lg mb-4">
                Fondée en 2024, notre mission est de fournir des services de qualité en utilisant les dernières technologies et méthodes de développement. Nous croyons fermement que l'innovation et l'engagement envers l'excellence sont les clés du succès.
            </p>
            <p class="text-lg mb-4">
                Notre équipe est composée de professionnels expérimentés qui travaillent ensemble pour offrir des résultats exceptionnels. Nous sommes fiers de notre approche collaborative et de notre capacité à comprendre les besoins spécifiques de chaque client.
            </p>
            <p class="text-lg">
                Merci de visiter notre page ! N'hésitez pas à nous contacter pour toute question ou information supplémentaire.
            </p>
        </div>
    </div>
</div>
@endsection
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
