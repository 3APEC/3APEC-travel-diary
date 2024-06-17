<!DOCTYPE html>
<html lang="en">
<head>
    <title>Entry Details - Travel Diary</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-app-layout>
        <div class="container mx-auto px-4 py-6">
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-3xl font-bold mb-4">{{ $entry->caption }}</h2>
                <p class="text-gray-700 mb-6">{{ $entry->text }}</p>

                <div class="flex space-x-4 mb-4">
                    <form method="POST" action="{{ route('entries.like', ['entry' => $entry, 'destination' => $destination]) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                            Like {{ $entry->likes()->count() }}
                        </button>
                        <p class="mt-2 text-sm">{{ $entry->isLiked() ? 'You liked this' : '' }}</p>
                    </form>

                    <form method="POST" action="{{ route('entries.dislike', ['entry' => $entry, 'destination' => $destination]) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                            Dislike {{ $entry->dislikes()->count() }}
                        </button>
                        <p class="mt-2 text-sm">{{ $entry->isDisliked() ? 'You disliked this' : '' }}</p>
                    </form>
                </div>

                @if (Auth::check())
                    @if (Auth::user()->role_id <= 1 || Auth::user()->id === $entry->user_id)
                        <div class="flex justify-end">
                            <a href="{{ route('entries.edit', ['destination' => $destination, 'entry' => $entry]) }}" class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                                Edit Entry
                            </a>
                        </div>
                    @endif
                @endif
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h3 class="text-2xl font-bold mb-4">Comments</h3>

                {{-- @foreach($entry->comments as $comment)
                    <div class="border-b border-gray-200 py-4">
                        <p class="text-gray-700"><strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}</p>
                        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                @endforeach --}}

                @if(Auth::check())
                    <form method="POST" action="{{ route('comments.store', ['entry' => $entry]) }}" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <textarea name="comment" class="w-full border border-gray-300 p-2 rounded-lg" rows="4" placeholder="Add a comment..."></textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                            Post Comment
                        </button>
                    </form>
                @else
                    <p class="mt-4 text-gray-500">You must be <a href="{{ route('login') }}" class="text-blue-500">logged in</a> to post a comment.</p>
                @endif
            </div>
        </div>
    </x-app-layout>
</body>
</html>
