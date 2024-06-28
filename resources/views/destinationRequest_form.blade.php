<x-applayout>
    <div>
        <h1>Destination Request Form</h1>
        <form action="{{ route('destinationRequests.store') }}" method="POST">
            @csrf
            <div>
                <label for="destination">Destination</label>
                <input type="text" name="title" id="destination" required>
            </div>
            <div>
                <label for="shortDescription">Description</label>
                <textarea name="shortDescription" id="shortDescription" required></textarea>
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</x-applayout>