<!-- TODO: Make a Proper Hompage -->
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>
        @include('layouts.navbar') 
        <div>
            <h1>Home</h1>
        </div>
    </body>

</html>