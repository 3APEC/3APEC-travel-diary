<!DOCTYPE html>
<html>
    <head>
        <title>Entry Form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <form method="POST" action="{{ route('entries.store', ['destination' => $destination]) }}">
            @csrf
            <label for="caption">Title:</label><br>
            <input type="text" id="caption" name="caption"><br>
            @error('caption')
                <div>{{ $message }}</div><br />
            @enderror

            <label for="text">Text:</label><br>
            <textarea id="text" name="text"></textarea><br>
            @error('text')
                <div>{{ $message }}</div><br />
            @enderror
            <button type="submit" action="">Save</button>            
        </form>
    </body>


</html>