@if (Auth::check())
   
    
    @if (request()->is('admin/*'))
        
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="hover:underline">
                Logout
            </button>
        </form>
    @else
    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit" class="text-lg hover:text-gray-200 transition-colors duration-300 ease-in-out hover:underline">Logout</button>
    </form>
    @endif
@else
    <!-- Utilisateur non connecté -->
    <a href="{{ route('login') }}" class="text-lg hover:text-gray-200 transition-colors duration-300 ease-in-out hover:underline">Login</a>
    <a href="{{ route('register') }}" class="text-lg hover:text-gray-200 transition-colors duration-300 ease-in-out hover:underline">Register</a>
@endif
