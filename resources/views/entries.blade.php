<!DOCTYPE html>
<html lang="en">
<head>
    <title>Entries - Travel Diary</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-app-layout>
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Entries for {{ $destination->name }}</h1>
                <a href="{{ route('entries.create', ['destination' => $destination]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-colors duration-300">
                    Create a New Entry
                </a>
            </div>

            <div class="max-w-4xl mx-auto">
                @forelse ($entries as $entry)
                    <a href="{{ route('entries.show', ['destination' => $destination, 'entry' => $entry]) }}" class="block bg-white shadow-md rounded-lg overflow-hidden transform transition-transform duration-300 hover:scale-105 mb-4">
                        <div class="p-4">
                            <h3 class="text-xl font-bold">{{ $entry->caption }}</h3>
                            <p class="text-gray-700">{{ \Illuminate\Support\Str::limit($entry->text, 150) }}</p>
                            <div class="mt-2 flex justify-between items-center">
                                <div class="text-sm text-gray-500">
                                    <span>Created by: {{ $entry->user->name }}</span>
                                    <span class="ml-2">{{ $entry->created_at->format('F j, Y') }}</span>
                                </div>
                                <div class="flex items-center space-x-2 text-sm">
                                    <span class="text-green-500">Likes: {{ $entry->likes->count() }}</span>
                                    <span class="text-red-500">Dislikes: {{ $entry->dislikes->count() }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="alert alert-error bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error:</strong>
                        <span class="block sm:inline">No entries found!</span>
                    </div>
                @endforelse
            </div>
        </div>
    </x-app-layout>
</body>
</html>