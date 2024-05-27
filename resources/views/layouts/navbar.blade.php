<nav class="flex justify-start">
    <div class="flex-initial">
        <x-navbar-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-navbar-link>
    </div>
    <div class="flex-initial">
        <x-navbar-link href="{{ route('destinations.index') }}" :active="request()->routeIs('destinations.index')">Destinations</x-navbar-link>
    </div>
    <div>
        @if (Auth::check())
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-navbar-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</x-navbar-link>
            </form>
            <x-navbar-link href="{{ route('profile.edit') }}">{{ Auth::getUser()->name }}</x-navbar-link>

            @if (Auth::getUser()->role_id === 0)
                <div>
                    <x-navbar-link href="{{ route('admin.index') }}">Admin</x-navbar-link>
                </div>
            @endif
        @else
            <div>
                <x-navbar-link href="{{ route('login') }}">Login</x-navbar-link>
            </div>
            <div>
                <x-navbar-link href="{{ route('register') }}">Register</x-navbar-link>
            </div>
        @endif
    </div>

</nav>
