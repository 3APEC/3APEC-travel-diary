<!-- resources/views/destinationrequest/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Destination Request - Travel Diary</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <x-app-layout>
        <div class="container mx-auto px-4 py-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
                    <strong class="font-bold">Success:</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
                <h1 class="text-3xl font-bold mb-6 text-center">Create a Destination Request</h1>
                <form action="{{ route('destinationrequest.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="destination_name" class="block text-sm font-medium text-gray-700">Destination Name:</label>
                        <input type="text" name="destination_name" id="destination_name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Your Name:</label>
                        <input type="text" name="name" id="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    
                    <div>
                        <label for="reason" class="block text-sm font-medium text-gray-700">Reason:</label>
                        <textarea name="reason" id="reason" required="" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" style="height: 192px;"></textarea>                    </div>
                    
                    <div>
                        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
