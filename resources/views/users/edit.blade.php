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
