
<div>
    @forelse ($entries as $entry)
        <a href="{{ route('entries.show', ['entry' => $entry,'destination' => $destination]) }}">
            <h3>{{ $entry->caption }}</h3>
        <br />
    @empty
        <p>No entries found</p>
    @endforelse

    <a href="{{ route('entries.create', ['destination' => $destination]) }}">Create a new entry</a>
</div>