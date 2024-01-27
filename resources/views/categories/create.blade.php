<x-app-layout>
    <x-slot name="title">
        {{ __('messages.create_new_category') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('messages.create_new_category') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-12">
                <form action="{{ route('categories.store') }}" method="POST" class="max-w-sm mx-auto mt-6 space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="title" :value="__('messages.title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                            :value="old('title')" required autofocus autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div>
                        <label for="notifiable"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                            your
                            {{ __('messages.notifiable') }}
                            <label for="notifiable" class="block mb-2 text-sm font-medium"></label>
                            <select name="notifiable" id="notifiable" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white ">
                                <option value="1">{{ __('messages.yes') }}</option>
                                <option value="0">{{ __('messages.no') }}</option>
                            </select>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
