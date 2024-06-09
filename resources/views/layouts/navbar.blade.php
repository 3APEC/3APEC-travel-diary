{{--
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
--}}

<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Icon when menu is closed -->
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Icon when menu is open -->
            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex flex-shrink-0 items-center">
            <img class="h-8 w-auto" src="https://image.similarpng.com/thumbnail/2021/08/Illustration-of-Travel-agency-logo-design-template-on-transparent-background-PNG.png" alt="Your Company">
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <x-navbar-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-navbar-link>
              <x-navbar-link href="{{ route('destinations.index') }}" :active="request()->routeIs('destinations.index')">Destinations</x-navbar-link>
            </div>
          </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          @if (Auth::check())
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <x-navbar-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="text-gray-300 hover:bg-gray-700 hover:text-white">Logout</x-navbar-link>
            </form>
            <x-navbar-link href="{{ route('profile.edit') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white">{{ Auth::getUser()->name }}</x-navbar-link>
            @if (Auth::getUser()->role_id === 0)
              <x-navbar-link href="{{ route('admin.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white">Admin</x-navbar-link>
            @endif
          @else
            <x-navbar-link href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white">Login</x-navbar-link>
            <x-navbar-link href="{{ route('users/register') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white">Register</x-navbar-link>
          @endif
        </div>
      </div>
    </div>
    <!-- Mobile menu, show/hide based on menu state -->
    <div class="sm:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2">
        <x-navbar-link href="{{ route('home') }}" :active="request()->routeIs('home')" class="block text-base">Home</x-navbar-link>
        <x-navbar-link href="{{ route('destinations.index') }}" :active="request()->routeIs('destinations.index')" class="block text-base">Destinations</x-navbar-link>
        @if (Auth::check())
          <x-navbar-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block text-base">Logout</x-navbar-link>
          <x-navbar-link href="{{ route('profile.edit') }}" class="block text-base">{{ Auth::getUser()->name }}</x-navbar-link>
          @if (Auth::getUser()->role_id === 0)
            <x-navbar-link href="{{ route('admin.index') }}" class="block text-base">Admin</x-navbar-link>
          @endif
        @else
          <x-navbar-link href="{{ route('login') }}" class="block text-base">Login</x-navbar-link>
          <x-navbar-link href="{{ route('users/register') }}" class="block text-base">Register</x-navbar-link>
        @endif
      </div>
    </div>
  </nav>
  