@extends('layouts.app')

@section('title', $destination->name)

@section('content')
<div>
    @forelse ($entries as $entry)
        <a href="{{ route('entries.show', ['entry' => $entry,'destination' => $destination]) }}">
            <h3>{{ $entry->caption }}</h3>
        <br />
    @empty
        <p>No entries found</p>
    @endforelse
</div>
@endsection