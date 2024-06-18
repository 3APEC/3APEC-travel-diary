<!DOCTYPE html>
<html lang="en">
<head>
    <title>Destinations - Travel Diary</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-app-layout>
        <div class="container mx-auto px-4">
            @if (Auth::check() && Auth::user()->role_id <= 1)
                <div class="flex justify-end my-4">
                    <a href="{{ route('destinations.create') }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                        Add a New Destination
                    </a>
                </div>
            @endif

            <br>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <!-- Add New Destination Request Button -->
                @if (Auth::check() && Auth::user()->role_id > 1)
                    <a href="{{ route('destinationrequest.create') }}" class="block bg-gray-500 text-white font-bold py-12 px-4 rounded-lg shadow-md transform transition-transform duration-300 hover:scale-105 hover:shadow-xl flex justify-center items-center text-3xl">
                        +
                    </a>
                @endif

                @forelse ($destinations as $destination)
                    <a href="{{ route('entries.index', ['destination' => $destination]) }}" class="block bg-white shadow-md rounded-lg overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                        <div class="relative">
                            <img src="https://via.placeholder.com/300" alt="{{ $destination->name }}" class="w-full h-48 object-cover">
                            <div class="absolute bottom-0 left-0 w-full bg-black bg-opacity-50 text-white py-2 px-4">
                                <h2 class="text-xl font-bold">{{ $destination->name }}</h2>
                                <p class="mt-1">Entries: <span class="text-yellow-400">{{ $destination->entries->count() }}</span></p>
                            </div>
                        </div>
                        <div class="p-4">
                            <p class="text-gray-700">
                                Discover the experiences shared by travelers about this destination.
                            </p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full">
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
                            <strong class="font-bold">Error:</strong>
                            <span class="block sm:inline">No destinations found!</span>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        <br>
    </x-app-layout>
</body>
</html>
