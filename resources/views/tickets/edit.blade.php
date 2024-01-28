<x-app-layout>
    <x-slot name="title">
        {{ __('messages.edit_ticket') }}
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('messages.edit_ticket') }}
            </h2>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            <form action="{{ route('tickets.update', $ticket) }}" method="POST" class="max-w-md mx-auto space-y-6">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <x-input-label for="number" :value="__('messages.ticket_number')" />
                    <x-text-input id="number" name="number" type="number" class="mt-1 block w-full" required
                        :value="old('number', $ticket->number)" />
                    <x-input-error :messages="$errors->get('number')" />
                </div>

                <div class="form-group mb-4">
                    <x-input-label for="description" :value="__('messages.description')" />
                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                        :value="old('description', $ticket->description)" required />
                    <x-input-error :messages="$errors->get('description')" />
                </div>

                <div class="form-group mb-4">
                    <x-input-label for="priority" :value="__('messages.priority')" />

                    <x-bladewind::select name="priority" placeholder="Select Priority" data="manual" required="true"
                        selected_value="{{ $ticket->priority }}">
                        <x-bladewind::select-item label="{{ __('messages.low') }}" value="low" />
                        <x-bladewind::select-item label="{{ __('messages.medium') }}" value="medium" />
                        <x-bladewind::select-item label="{{ __('messages.high') }}" value="high" />
                    </x-bladewind::select>


                </div>

                <div class="form-group mb-4">
                    <x-input-label for="reported_by_phone" :value="__('messages.reported_by_phone')" />
                    <x-text-input id="reported_by_phone" name="reported_by_phone" type="number"
                        class="mt-1 block w-full" required :value="old('reported_by_phone', $ticket->reported_by_phone)" />
                    <x-input-error :messages="$errors->get('reported_by_phone')" />
                </div>

                <div class="form-group mb-4">
                    <x-input-label for="contact_phone" :value="__('messages.phone')" />
                    <x-text-input id="contact_phone" name="contact_phone" type="number" class="mt-1 block w-full"
                        required :value="old('contact_phone', $ticket->contact_phone)" />
                    <x-input-error :messages="$errors->get('contact_phone')" />
                </div>

                <div class="form-group mb-4">
                    <x-input-label for="reported_model_type" :value="__('messages.reported_model_type')" />
                    <x-text-input id="reported_model_type" name="reported_model_type" type="text"
                        class="mt-1 block w-full" required :value="old('reported_model_type', $ticket->reported_model_type)" />
                    <x-input-error :messages="$errors->get('reported_model_type')" />
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

                <x-primary-button>{{ __('messages.update') }}</x-primary-button>
            </form>

        </div>
    </div>


</x-app-layout>
