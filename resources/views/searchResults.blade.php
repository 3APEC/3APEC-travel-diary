<x-applayout>
    <div>
        @if($without[0] === false)
            <h3>Users</h3>
            <p>{{ $users->count() }}</p>
            <div>
                @forelse($users as $user)
                    <a href="{{ route('profile.show', $user->id) }}">
                        <div class="border p-4 my-4">
                            <p>{{ $user->name }}</p>
                            <p>Entries: {{ $user->entryCount() }}</p>
                        </div>
                    </div>
                @empty
                    <p>No entries found</p>
                @endforelse
            </div>
        @endif

        @if($without[2] === false)
        <h3>Entries</h3>
        <div>
            @forelse($entries as $entry)
                <a href="{{ route('entries.show', [$entry->destination,$entry->id]) }}">
                    <div class="border p-4 my-4">
                        <h2 class="text-xl font-bold">{{ $entry->caption }}</h2>
                    </div>
                </a>
            @empty
                <p>No entries found</p>
            @endforelse
        </div>
        @endif

        @if($without[1] === false)
            <h3>Destinations</h3>
            <div>
                @forelse($destinations as $destination)
                    <a href="{{ route('destinations.show', $destination->id) }}">
                        <div class="border p-4 my-4">
                            <h2 class="text-xl font-bold">{{ $destination->name }}</h2>
                        </div>
                    </a>
                @empty
                    <p>No destinations found</p>
                @endforelse
            </div>
        @endif
</div>
</x-applayout>