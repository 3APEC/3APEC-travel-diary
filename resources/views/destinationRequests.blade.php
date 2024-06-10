<x-applayout>
    <div>
        @forelse($destinationRequests as $destinationRequest)
            <a href="{{ route('destinationRequests.show', ['destinationRequest' => $destinationRequest]) }}" id="clickableSection" class="block bg-white shadow-md rounded-lg overflow-hidden transform transition-transform duration-300 hover:scale-105">
                <section>
                    <header class="bg-gray-800 text-white py-4 px-6">
                        <h1 class="text-2xl font-bold">{{ $destinationRequest->title }}</h1>
                        <div id="overallRating" class="mt-2 text-lg">
                            Requested by: <span id="averageRating" class="text-yellow-500">{{ $destinationRequest->user->name }}</span>
                        </div>
                    </header>
                    <div class="p-6">
                        <p class="text-gray-700 mb-4">
                            {{ $destinationRequest->shortDescription }}
                        </p>
                    </div>
                </section>
            </a>
        @empty
            <p>No Request are open!</p>
        @endforelse
    </div>
</x-applayout>