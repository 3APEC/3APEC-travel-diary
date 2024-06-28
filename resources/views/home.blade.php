<!-- TODO: Make a Proper Hompage -->
<!DOCTYPE html>
<html>
    <head>
        <title>Home - Travel Diary</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>
        @include('layouts.navbar') 
        @include('layouts.searchview') 
    </body>
</html>