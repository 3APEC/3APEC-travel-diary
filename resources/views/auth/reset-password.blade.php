<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password - Travel Diary</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-guest-layout>
        <div class="max-w-md mx-auto mt-10">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Reset Password</h2>
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Enter your email address and new password to reset your password.') }}
                </div>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input id="email" type="email" name="email" class="w-full px-3 py-2 border rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                        @error('email')
                            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input id="password" type="password" name="password" class="w-full px-3 py-2 border rounded-lg @error('password') border-red-500 @enderror" required autocomplete="new-password">
                        @error('password')
                            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="w-full px-3 py-2 border rounded-lg @error('password_confirmation') border-red-500 @enderror" required autocomplete="new-password">
                        @error('password_confirmation')
                            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-guest-layout>
</body>
</html>
