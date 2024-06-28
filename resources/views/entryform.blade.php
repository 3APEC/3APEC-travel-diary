<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ isset($entry) ? 'Edit Entry' : 'Create Entry' }} - Travel Diary</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-app-layout>
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">{{ isset($entry) ? 'Edit Entry' : 'Create New Entry' }}</h2>

                <form method="POST" action="{{ isset($entry) ? route('entries.update', ['entry' => $entry, 'destination' => $destination, 'id' => $entry->id]) : route('entries.store', ['destination' => $destination]) }}">
                    @csrf
                    @if (isset($entry))
                        @method('PUT')
                    @endif

                    <div class="mb-4">
                        <label for="caption" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Title:</label>
                        <input type="text" id="caption" name="caption" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-500" value="{{ $entry->caption ?? old('caption') }}">
                        @error('caption')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="text" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Text:</label>
                        <textarea id="text" name="text" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-500" rows="6">{{ $entry->text ?? old('text') }}</textarea>
                        @error('text')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
