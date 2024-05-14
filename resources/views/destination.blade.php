@extends('layouts.app')

@section('title', $destination->name)

@section('content')
    <div>
        <h2>{{ $destination->name }}</h2>
        <a href="{{ route('entries.index', ['destination' => $destination]) }}">Entries</a>
    </div>

@endsection
