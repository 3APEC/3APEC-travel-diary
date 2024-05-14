@extends('layouts.app')

@section('title', $entry->caption)

@section('content')
<h2>{{ $entry->caption }}</h2>
<p>{{ $entry->text }}</p>

@endsection
