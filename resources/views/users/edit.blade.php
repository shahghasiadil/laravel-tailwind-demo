<!DOCTYPE html>
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
</html>
