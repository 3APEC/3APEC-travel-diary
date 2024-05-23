<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('destinations.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="name">Destination</label>
                    <input type="name" class="name" id="destination" name="name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>