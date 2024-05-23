
<x-app-layout>
    @forelse ($entries as $entry)
        <a href="{{ route('entries.show', ['destination' => $destination,'entry' => $entry]) }}">
            <h3>{{ $entry->caption }}</h3>
        <br />
    @empty
        <p>No entries found</p>
    @endforelse

    <a href="{{ route('entries.create', ['destination' => $destination]) }}">Create a new entry</a>
</x-app-layout>