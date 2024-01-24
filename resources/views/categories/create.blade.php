<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.create_new_category') }}</title>

</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    .create-category-container {
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

<div class="create-category-container">
    <h1>{{ __('messages.create_new_category') }}</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">{{ __('messages.title') }}:</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div class="form-group">
            <label for="notifiable">{{ __('messages.notifiable') }}:</label>
            <select name="notifiable" id="notifiable" required>
                <option value="1">{{ __('messages.yes') }}</option>
                <option value="0">{{ __('messages.no') }}</option>
            </select>
        </div>

        <button type="submit">{{ __('messages.create') }}</button>
    </form>
</div>

</body>
</html>
