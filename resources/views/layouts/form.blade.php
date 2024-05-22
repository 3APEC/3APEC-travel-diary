<!DOCTYPE html>
<html>
    <head>
        <title>Entry Form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <form method="POST" action=" {{ route('entries.store', ['destination' => $destination]) }}">
            @csrf
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title"><br>
            <label for="text">Text:</label><br>
            <textarea id="text" name="text"></textarea><br>
            <button type="submit" action="">Save</button>            
        </form>
    </body>
</html>