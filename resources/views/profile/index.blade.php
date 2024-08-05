@extends('layout')
@section('title','Profile')
@section('main')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        <div class="flex items-center space-x-4">
            
            <div class="w-24 h-24 rounded-full bg-gray-200 overflow-hidden">
                <img src="{{ asset('images/avatar.jpeg') }}" alt="User Avatar" class="w-full h-full object-cover">
            </div>
            
            <div>
                <h1 class="text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
                <p class="text-gray-600">{{ $user->email }}</p>
                <p class="text-gray-500 mt-2">{{ $user->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-6 flex space-x-4">
            <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition duration-300">Edit Profile</a>
          
        </div>
    </div>
</div>
@endsection
