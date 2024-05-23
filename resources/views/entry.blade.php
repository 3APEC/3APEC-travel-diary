<x-app-layout>
    <h2>{{ $entry->caption }}</h2>
    <p>{{ $entry->text }}</p>

    @if (Auth::check())
        @if (Auth::getUser()->role_id === 1 || Auth::getUser()->id === $entry->user_id)
            <a href="{{ route('entries.edit', ['destination' => $destination, 'entry' => $entry]) }}">Edit</a>
        @endif
    @endif
    
</x-app-layout>

