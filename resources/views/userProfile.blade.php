<x-applayout>
    <h1>{{ $user->name }}</h1>
    <div>
    <h2>Entries: {{ $user->entryCount() }}</h2>
    @forelse($user->entries as $entry)
        <a href="{{ route('entries.show', [$entry->destination,$entry->id]) }}">
            <div class="border p-4 my-4">
                <h2 class="text-xl font-bold">{{ $entry->caption }}</h2>
            </div>
        </a>
    @empty
        <p>No entries found</p>
    @endforelse
    </div>
</x-applayout>