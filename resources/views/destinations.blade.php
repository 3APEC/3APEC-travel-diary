<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Travel Diary</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>
        <x-app-layout>
            <br>
            <div class="max-w-4xl mx-auto">
                @forelse ($destinations as $destination)
                <a href="{{ route('destinations.show', ['destination' => $destination]) }}" id="clickableSection" class="block bg-white shadow-md rounded-lg overflow-hidden transform transition-transform duration-300 hover:scale-105">
                    <section>
                        <header class="bg-gray-800 text-white py-4 px-6">
                            <h1 class="text-2xl font-bold">{{ $destination->name }}</h1>
                            <div id="overallRating" class="mt-2 text-lg">
                                Overall Rating: <span id="averageRating" class="text-yellow-500">4.5</span>
                            </div>
                        </header>
                        <div class="p-6">
                            <p class="text-gray-700 mb-4">
                                This is the content area of the section. Here, you can add paragraphs, images, and other elements.
                            </p>
                        </div>
                    </section>
                </a> <br />
                @empty
                <div class="red">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Error</span>
                        <span class="font-semibold mr-2 text-left flex-auto">No data found!</span>
                        <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
                    </div>
                </div>
                @endforelse
            </div>
        </x-app-layout>
    </body>
</html>