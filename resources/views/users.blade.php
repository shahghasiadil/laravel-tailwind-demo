<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- Additional head content -->
</head>
<style>
    .users-container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f8f9fa; /* Light background color */
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Light box shadow for depth */

        /* Center the container */
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .user-card {
        width: 100%;
        margin-bottom: 15px;
        padding: 15px;
        background-color: #fff; /* White background color for each user card */
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Slight box shadow for separation */

        /* Flex to arrange user information and actions horizontally */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .user-info {
        /* Style for user information */
    }

    .user-actions {
        /* Style for user actions (edit and delete) */
    }

    .action-icon {
        color: #007bff; /* Link color for actions */
        text-decoration: none;
        margin-left: 10px;
    }

    .action-icon:hover {
        text-decoration: underline;
    }
</style>
<body>

@include('components.navbar')

<div class="users-container">
    <h1>Users</h1>

    @foreach($users as $user)
        <div class="user-card">
            <div class="user-info">
                <span>Name: {{ $user->name }}</span>
            </div>
            <div class="user-actions">
                <a href="{{ route('users.edit', $user->id) }}" class="action-icon" title="Edit">
                    <!-- Add your edit icon here, e.g., Font Awesome or custom icon -->
                    Edit
                </a>
                <a href="{{ route('users.destroy', $user->id) }}" class="action-icon    " title="Delete" onclick="return confirm('Are you sure you want to delete this user?')">
                    <!-- Add your delete icon here, e.g., Font Awesome or custom icon -->
                    Delete
                </a>

            </div>
        </div>
    @endforeach

</div>

</body>
</html>
