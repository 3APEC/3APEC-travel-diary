<x-app-layout>
    <div>
        <form method="POST" action="{{ route('entries.like', ['entry' => $entry, 'destination' => $destination]) }}">
            @csrf

            @method('PUT')

            <button type="submit">Like {{ $entry->likes()->count() }}</button>
        </form>

        <form method="POST" action="{{ route('entries.dislike', ['entry' => $entry, 'destination' => $destination]) }}">
            @csrf

            @method('PUT')

            <button type="submit">Dislike {{ $entry->dislikes()->count() }}</button>
        </form>

    </div>

    <h2>{{ $entry->caption }}</h2>
    <p>{{ $entry->text }}</p>

    @if (Auth::check())
        @if (Auth::getUser()->role_id <= 1 || Auth::getUser()->id === $entry->user_id)
            <a href="{{ route('entries.edit', ['destination' => $destination, 'entry' => $entry]) }}">Edit</a>
        @endif
    @endif
    
</x-app-layout>

