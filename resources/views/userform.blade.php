<x-app-layout>
    <div>
        <form method="POST" action="{{ route('users.update', ['user' => $user]) }}">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') ?? $user->name }}" required />
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') ?? $user->email }}" required />
            </div>
            <div>
                <label for="role_id">Role</label>
                <select id="role_id" name="role_id" required>
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
        <button type="submit">Submit</button>
        </form>
    </div>
</x-app-layout>