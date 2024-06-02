<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile - Travel Diary</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-app-layout>
        <div class="max-w-4xl mx-auto mt-10">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Profile</h2>
                <div class="flex items-center mb-6">
                    <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-32 h-32 rounded-full mr-4">
                    <div>
                        <h3 class="text-xl font-bold">John Doe</h3>
                        <p class="text-gray-600">Travel Enthusiast</p>
                    </div>
                </div>
                <div class="mb-4">
                    <h4 class="text-lg font-bold">About Me</h4>
                    <p class="text-gray-700">
                        Hello! I'm John, a travel enthusiast who loves exploring new destinations and sharing my experiences with the world. I've visited over 30 countries and am always looking for new adventures.
                    </p>
                </div>
                <div class="mb-4">
                    <h4 class="text-lg font-bold">Contact Information</h4>
                    <p class="text-gray-700">Email: john.doe@example.com</p>
                    <p class="text-gray-700">Phone: (123) 456-7890</p>
                </div>
                <div class="mb-4">
                    <h4 class="text-lg font-bold">Recent Destinations</h4>
                    <ul class="list-disc list-inside text-gray-700">
                        <li>Paris, France</li>
                        <li>Tokyo, Japan</li>
                        <li>Sydney, Australia</li>
                        <li>New York, USA</li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h4 class="text-lg font-bold">Favorite Quotes</h4>
                    <blockquote class="text-gray-700 italic border-l-4 border-blue-500 pl-4">
                        "The world is a book and those who do not travel read only one page." - Saint Augustine
                    </blockquote>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
