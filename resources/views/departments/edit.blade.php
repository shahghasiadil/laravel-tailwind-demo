<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department</title>

</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    .edit-department-container {
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

<div class="edit-department-container">
    <h1>Edit Department</h1>

    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for update -->

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ $department->title }}" required>
        </div>

        <div class="form-group">
            <label for="default_contact">Default Contact:</label>
            <select name="default_contact" id="default_contact" required>
                <option value="phone" {{ $department->default_contact === 'phone' ? 'selected' : '' }}>Phone</option>
                <option value="whatsapp" {{ $department->default_contact === 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                <option value="telegram" {{ $department->default_contact === 'telegram' ? 'selected' : '' }}>Telegram</option>
                <option value="email" {{ $department->default_contact === 'email' ? 'selected' : '' }}>Email</option>
            </select>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" value="{{ $department->phone }}">
        </div>

        <div class="form-group">
            <label for="whatsapp">WhatsApp:</label>
            <input type="text" name="whatsapp" id="whatsapp" value="{{ $department->whatsapp }}">
        </div>

        <div class="form-group">
            <label for="telegram">Telegram:</label>
            <input type="text" name="telegram" id="telegram" value="{{ $department->telegram }}">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $department->email }}">
        </div>

        <button type="submit">Update Department</button>
    </form>
</div>

</body>
</html>
