
<x-app-layout>
    <div>
        @forelse ($destinations as $destination)
            <a href="{{ route('destinations.show', ['destination' => $destination]) }}">
                {{ $destination->name }}
            </a> <br />
        @empty
            <p>No destinations found</p>
        @endforelse
    </div>
</x-app-layout>