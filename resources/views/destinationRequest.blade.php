<x-applayout>
    <div>
        <h1>{{ $destinationRequest->title }}</h1>
        <p>{{ $destinationRequest->shortDescription }}</p>
        <form action="{{ route('destinationRequests.approve', ['destinationRequest' => $destinationRequest]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">Approve</button>
        </form>
        <form action="{{ route('destinationRequests.reject', ['destinationRequest' => $destinationRequest]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">Reject</button>
        </form>
    </div>
</x-applayout>