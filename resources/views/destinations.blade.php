
<x-app-layout>
    <div>
        @if (Auth::check())
            @if (Auth::getUser()->role_id == 1)
                <a href="{{ route('destinations.create') }}">Add a new destination</a> <br />
            @endif
        @endif

        @forelse ($destinations as $destination)
            <a href="{{ route('destinations.show', ['destination' => $destination]) }}">
                {{ $destination->name }}
            </a> <br />
        @empty
            <p>No destinations found</p>
        @endforelse
    </div>
</x-app-layout>
