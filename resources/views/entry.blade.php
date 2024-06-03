<x-app-layout>
    <h2>{{ $entry->caption }}</h2>
    <p>{{ $entry->text }}</p>


    <a href="{{ route('entries.edit', ['destination' => $destination, 'entry' => $entry]) }}">Edit</a>
</x-app-layout>

