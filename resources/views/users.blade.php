<x-app-layout>
    <div>
        @foreach ($users as $user)
            <div class="flex pb-2">
                <div class="flex-1">
                    <p>{{ $user->name }}</p>
                    <p>{{ $user->email }}</p>
                </div>
                <div class="flex-1">
                    <x-primary-button><a href="{{ route('users.edit', ['user' => $user]) }}">{{ __('Edit') }}</a></x-primary-button>
                    <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="">{{ __('Delete') }}</button>
                </div>
            </div>    
        @endforeach
    </div>
</x-app-layout>