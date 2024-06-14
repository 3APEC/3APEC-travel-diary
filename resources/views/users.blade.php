<x-app-layout>
    <div class="container mx-auto px-4">
        {{-- @if (Auth::check() && Auth::user()->role_id <= 1)
            <div class="flex justify-end my-4">
                <a href="{{ route('users.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                    Add a New User
                </a>
            </div>
        @endif --}}

        <br>
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($users as $user)
                <div class="block bg-white shadow-md rounded-lg overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                    <div class="p-4">
                        <h2 class="text-xl font-bold">{{ $user->name }}</h2>
                        <p class="text-gray-700">{{ $user->email }}</p>
                        <div class="flex justify-end mt-4 space-x-2">
                            <a href="{{ route('users.edit', ['user' => $user]) }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                                {{ __('Edit') }}
                            </a>
                            <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($users->isEmpty())
            <div class="col-span-full">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
                    <strong class="font-bold">Error:</strong>
                    <span class="block sm:inline">No users found!</span>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
