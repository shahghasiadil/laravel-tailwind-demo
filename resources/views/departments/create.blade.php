<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.create_new_department') }}</title>

</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    .create-department-container {
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

<div class="create-department-container">
    <h1>{{ __('messages.create_new_department') }}</h1>

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">{{ __('messages.title') }}:</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div class="form-group">
            <label for="default_contact">{{ __('messages.default_contact') }}:</label>
            <select name="default_contact" id="default_contact" required>
                <option value="phone">{{ __('messages.phone') }}</option>
                <option value="whatsapp">{{ __('messages.whatsapp') }}</option>
                <option value="telegram">{{ __('messages.telegram') }}</option>
                <option value="email">{{ __('messages.email') }}</option>
            </select>
        </div>

        <div class="form-group">
            <label for="phone">{{ __('messages.phone') }}:</label>
            <input type="text" name="phone" id="phone">
        </div>

        <div class="form-group">
            <label for="whatsapp">{{ __('messages.whatsapp') }}:</label>
            <input type="text" name="whatsapp" id="whatsapp">
        </div>

        <div class="form-group">
            <label for="telegram">{{ __('messages.telegram') }}:</label>
            <input type="text" name="telegram" id="telegram">
        </div>

        <div class="form-group">
            <label for="email">{{ __('messages.email') }}:</label>
            <input type="email" name="email" id="email">
        </div>

        <button type="submit">{{ __('messages.create') }}</button>
    </form>
</div>

</body>
</html>
