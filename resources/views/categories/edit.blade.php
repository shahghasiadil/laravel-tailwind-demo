{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.edit_category') }}</title>

</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    .edit-category-container {
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

    input, select {
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

<div class="edit-category-container">
    <h1>Edit Category</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="title">{{ __('messages.title') }}:</label>
            <input type="text" name="title" id="title" value="{{ $category->title }}" required>
        </div>

        <div class="form-group">
            <label for="notifiable">{{ __('messages.notifiable') }}:</label>
            <select name="notifiable" id="notifiable" required>
                <option value="1" {{ $category->notifiable ? 'selected' : '' }}>{{ __('messages.yes') }}</option>
                <option value="0" {{ !$category->notifiable ? 'selected' : '' }}>{{ __('messages.no') }}</option>
            </select>
        </div>

        <button type="submit">{{ __('messages.update') }}</button>
    </form>
</div>

</body>
</html> --}}


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
                <form action="{{ route('categories.update', $category->id) }}" method="POST"
                    class="max-w-sm mx-auto mt-6 space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="title" :value="__('messages.title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                            :value="old('title', $category->title)" required autofocus autocomplete="title" />
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
                                <option value="1" @selected($category->notifiable == 1)>{{ __('messages.yes') }}</option>
                                <option value="0" @selected($category->notifiable == 0)>{{ __('messages.no') }}</option>
                            </select>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('messages.update') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
