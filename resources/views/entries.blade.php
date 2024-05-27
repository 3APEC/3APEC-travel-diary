
<x-app-layout>
    @forelse ($entries as $entry)
        <a href="{{ route('entries.show', ['destination' => $destination,'entry' => $entry]) }}">
            <h3>{{ $entry->caption }}</h3>
        <br />
    @empty
    <div class="red">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Error</span>
            <span class="font-semibold mr-2 text-left flex-auto">No data found!</span>
            <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
        </div>
    </div>
    @endforelse

    <a href="{{ route('entries.create', ['destination' => $destination]) }}">Create a new entry</a>
</x-app-layout>