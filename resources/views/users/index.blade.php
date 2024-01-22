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
        text-align: center;
    }

    .users-header {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 15px;
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

    .create-user-btn {
        margin-bottom: 15px;
    }

    .create-user-btn a {
        text-decoration: none;
        color: #fff;
        padding: 10px 15px;
        background-color: #28a745; /* Green color */
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .create-user-btn a:hover {
        background-color: #218838; /* Darker green color on hover */
    }

    .delete-user-btn {
        margin-left: 10px;
    }

    .delete-user-btn button {
        padding: 8px 12px;
        background-color: #dc3545; /* Red color */
        color: #fff;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-user-btn button:hover {
        background-color: #c82333; /* Darker red color on hover */
    }
</style>
<body>

@include('components.navbar')

<div class="users-container">
    <div class="users-header">
        <h1>Users</h1>
        <span class="create-user-btn">
            <a href="{{ route('users.create') }}">Create New User</a>
        </span>
    </div>
    @foreach($users as $user)
        <div class="user-card">
            <div class="user-info">
                <span>Name: {{ $user->name }}</span>
            </div>
            <div class="user-actions">
                <a href="{{ route('users.edit', $user->id) }}" class="action-icon" title="Edit">
                    Edit
                </a>
                <span class="delete-user-btn">
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-button" title="Delete">Delete</button>
                    </form>
                </span>
            </div>
        </div>
    @endforeach

</div>

</body>
</html>
