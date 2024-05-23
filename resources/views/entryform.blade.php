<x-app-layout>
        <form method="POST" action="{{ isset($entry) ? route('entries.update', ['entry' => $entry, 'destination' => $destination, 'id' => $entry->id]) : route('entries.store', ['destination' => $destination]) }}">
            @csrf

            @if (isset($entry))
                @method('PUT')
            @endif

            <label for="caption">Title:</label><br>
            <input type="text" id="caption" name="caption" value="{{ $entry->caption ?? old('caption') }}"><br>
            @error('caption')
                <div>{{ $message }}</div><br />
            @enderror

            <label for="text">Text:</label><br>
            <textarea id="text" name="text">{{ $entry->text ?? old('text') }}</textarea><br>
            @error('text')
                <div>{{ $message }}</div><br />
            @enderror
            <button type="submit" action="">Save</button>            
        </form>
    </body>


</x-app-layout>