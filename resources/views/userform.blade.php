<x-app-layout>
    <div class="container mx-auto px-4">
        <br>
        <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <form method="POST" action="{{ route('users.update', ['user' => $user]) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') ?? $user->name }}" required
                               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') ?? $user->email }}" required
                               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    </div>
                    <div class="mb-4">
                        <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
                        <select id="role_id" name="role_id" required
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @if (Auth::check())
                                @if (Auth::getUser()->role_id == 0)
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" @if ($role->id === old('role_id', $user->role_id)) selected @endif>{{ $role->name }}</option>
                                    @endforeach
                                @else
                                    @foreach ($roles->where('id', '>=', 2) as $role)
                                        <option value="{{ $role->id }}" @if ($role->id === old('role_id', $user->role_id)) selected @endif>{{ $role->name }}</option>
                                    @endforeach
                                @endif
                            @endif
                        </select>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <br>
    </div>
</x-app-layout>
