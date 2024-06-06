<x-app-layout>
    <h2>{{ $destination->name }}</h2>
    <a href="{{ route('entries.index', ['destination' => $destination]) }}">Entries</a>
</x-app-layout>