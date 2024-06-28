<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
</head>
<body>
    <form action="/posts" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
        
        <label for="content">Content:</label>
        <textarea id="content" name="content"></textarea>
        
        <button type="submit">Submit</button>
    </form>

    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
