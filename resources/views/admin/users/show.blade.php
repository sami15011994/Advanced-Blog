@extends('admin.layout')
@section('title', 'Show User - Admin')
@section('main')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="flex items-center p-6 bg-gray-100">
            <!-- Avatar -->
            <div class="w-24 h-24 bg-gray-300 rounded-full overflow-hidden flex items-center justify-center">
                <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://via.placeholder.com/96' }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
            </div>
            <!-- User Info -->
            <div class="ml-6">
                <h1 class="text-3xl font-semibold text-gray-900">{{ $user->name }}</h1>
                <p class="text-lg text-gray-600">{{ $user->email }}</p>
                <p class="text-sm text-gray-500 mt-2">Membre depuis {{ $user->created_at->format('M d, Y') }}</p>
            </div>
        </div>
        <!-- Additional Information -->
        <div class="p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Posts de l'utilisateur</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($user->posts as $post)
                    <div class="bg-gray-50 shadow-md rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>
                        <p class="text-sm text-gray-600 mt-2">{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('post.show', $post->id) }}" class="text-blue-600 hover:text-blue-800 mt-2 block">Voir le post</a>
                    </div>
                @empty
                    <p class="text-gray-500">Aucun post trouvé pour cet utilisateur.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
