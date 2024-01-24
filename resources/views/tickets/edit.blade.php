<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.edit_ticket') }}</title>
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    .create-ticket-container {
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

<div class="create-ticket-container">
    <h1>{{ __('messages.edit_ticket') }}</h1>

    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="number">{{ __('messages.ticket_number') }}</label>
            <input type="number" name="number" id="number" required>
        </div>

        <div class="form-group">
            <label for="description">{{ __('messages.description') }}:</label>
            <input type="text" name="description" id="description" required>
        </div>

        <div class="form-group">
            <label for="priority">{{ __('messages.priority') }}:</label>
            <select name="priority" id="priority" required>
                <option value="low">{{ __('messages.low') }}</option>
                <option value="medium">{{ __('messages.medium') }}</option>
                <option value="high">{{ __('messages.high') }}</option>
            </select>
        </div>

        <div class="form-group">
            <label for="reported_by_phone">{{ __('messages.reported_by_phone') }}</label>
            <input type="number" name="reported_by_phone" id="reported_by_phone" required>
        </div>

        <div class="form-group">
            <label for="contact_phone">{{ __('messages.phone') }}</label>
            <input type="number" name="contact_phone" id="contact_phone" required>
        </div>

        <div class="form-group">
            <label for="reported_model_type">{{ __('messages.reported_model_type') }}</label>
            <input type="text" name="reported_model_type" id="reported_model_type" required>
        </div>

        <button type="submit">{{ __('messages.create') }}</button>
    </form>
</div>

</body>
</html>
