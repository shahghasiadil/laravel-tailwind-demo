<x-app-layout>
    <x-slot name="title">
        {{ __('messages.create_new_department') }}
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('messages.create_new_department') }}
            </h2>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form action="{{ route('departments.store') }}" method="POST" class="max-w-md mx-auto mt-6 space-y-6">
                @csrf
                <div>
                    <x-input-label for="title" :value="__('messages.title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')"
                        required autofocus autocomplete="title" />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>

                <div>
                    <x-input-label for="default_contact" :value="__('messages.default_contact')" />

                    <x-bladewind::select name="default_contact" placeholder="Select Contact" data="manual"
                        required="true">
                        <x-bladewind::select-item label="{{ __('messages.phone') }}" value="phone" />
                        <x-bladewind::select-item label="{{ __('messages.whatsapp') }}" value="whatsapp" />
                        <x-bladewind::select-item label="{{ __('messages.telegram') }}" value="telegram" />
                        <x-bladewind::select-item label="{{ __('messages.email') }}" value="email" />
                    </x-bladewind::select>
                    <x-input-error class="mt-2" :messages="$errors->get('default_contact')" />
                </div>

                <div>
                    <x-input-label for="phone" :value="__('messages.phone')" />
                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                        :value="old('phone')" required autofocus autocomplete="phone" id="phone" />
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>

                <div>
                    <x-input-label for="whatsapp" :value="__('messages.whatsapp')" />
                    <x-text-input id="whatsapp" name="whatsapp" type="text" class="mt-1 block w-full"
                        :value="old('whatsapp')" required autofocus autocomplete="whatsapp" id="whatsapp" />
                    <x-input-error class="mt-2" :messages="$errors->get('whatsapp')" />
                </div>

                <div>
                    <x-input-label for="telegram" :value="__('messages.telegram')" />
                    <x-text-input id="telegram" name="telegram" type="text" class="mt-1 block w-full"
                        :value="old('telegram')" required autofocus autocomplete="telegram" id="telegram" />
                    <x-input-error class="mt-2" :messages="$errors->get('telegram')" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('messages.email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        :value="old('email')" required autofocus autocomplete="email" id="email" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>

                {{-- <div>

                    <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                        class="inline-flex items-center px-4 w-full h-full justify-center py-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">{{ __('messages.categories') }}<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>

                    <!-- Dropdown menu -->
                    <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                        <div class="p-3">
                            <label for="input-group-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="input-group-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search category">
                            </div>
                        </div>
                        <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownSearchButton">
                            @foreach ($categories as $category)
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input type="checkbox" id="category_{{ $category->id }}"
                                            value="{{ $category->id }}" name="categories[]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="category_{{ $category->id }}"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $category->title }}</label>
                                    </div>
                                </li>
                            @endforeach


                        </ul>

                    </div>

                </div> --}}

                <div>
                    <x-bladewind::select name="categories" placeholder="category" data="manual" searchable="true"
                        required="true" multiple="true">
                        @foreach ($categories as $item)
                            <x-bladewind::select-item label="{{ $item->title }}" value="{{ $item->id }}" />
                        @endforeach
                    </x-bladewind::select>

                    <x-input-error :messages="$errors->get('categories')" />
                </div>
                <div class="flex items-center gap-4 mt-8">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
