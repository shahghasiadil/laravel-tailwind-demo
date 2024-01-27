{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.edit_user') }}</title>

</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    .create-user-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f8f9fa; /* Light background color */
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Light box shadow for depth */
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>
<body>

@include('components.navbar')

<div class="create-user-container">
    <h1>{{ __('messages.edit_user') }}</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">{{ __('messages.name') }}:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">{{ __('messages.email') }}:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">{{ __('messages.password') }}:</label>
            <input type="password" name="password" id="password">
            <small>{{ __('messages.leave_blank_to_keep_the_existing_password') }}</small>
        </div>

        <div class="form-group">
            <label for="dob">{{ __('messages.dob') }}</label>
            <input type="date" name="dob" id="dob" value="{{ $user->dob }}" required>
        </div>

        <div class="form-group">
            <label for="identification_number">{{ __('messages.identification_number') }}</label>
            <input type="text" name="identification_number" id="identification_number" value="{{ $user->identification_number }}" required>
        </div>

        <button type="submit">{{ __('messages.update') }}</button>
    </form>
</div>


</body>
</html> --}}

<x-app-layout>
    <x-slot name="title">
        {{ __('messages.edit_user') }}
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('messages.edit_user') }}
            </h2>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form action="{{ route('users.update', $user) }}" method="POST" class="max-w-sm mx-auto mt-6 space-y-6">
                @csrf
                @method('PUT')
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="dob" :value="__('messages.dob')" />

                    <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" required
                        autocomplete="dob" :value="old('dob', $user->dob)" />

                    <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="identification_number" :value="__('messages.identification_number')" />

                    <x-text-input id="identification_number" class="block mt-1 w-full" type="text"
                        name="identification_number" required autocomplete="identification_number" :value="old('identification_number', $user->identification_no)" />

                    <x-input-error :messages="$errors->get('identification_no')" class="mt-2" />
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('messages.update') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
