<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
</head>
<style>
    .departments-container {
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

    .departments-header {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 15px;
    }

    .department-card {
        width: 100%;
        margin-bottom: 15px;
        padding: 15px;
        background-color: #fff; /* White background color for each department card */
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Slight box shadow for separation */

        /* Flex to arrange department information and actions horizontally */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .department-info {
        /* Style for department information */
    }

    .department-actions {
        /* Style for department actions (edit and delete) */
    }

    .action-icon {
        color: #007bff; /* Link color for actions */
        text-decoration: none;
        margin-left: 10px;
    }

    .action-icon:hover {
        text-decoration: underline;
    }

    .create-department-btn {
        margin-bottom: 15px;
    }

    .create-department-btn a {
        text-decoration: none;
        color: #fff;
        padding: 10px 15px;
        background-color: #28a745; /* Green color */
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .create-department-btn a:hover {
        background-color: #218838; /* Darker green color on hover */
    }

    .delete-department-btn {
        margin-left: 10px;
    }

    .delete-department-btn button {
        padding: 8px 12px;
        background-color: #dc3545; /* Red color */
        color: #fff;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-department-btn button:hover {
        background-color: #c82333; /* Darker red color on hover */
    }
</style>
<body>

@include('components.navbar')

<div class="departments-container">
    <div class="departments-header">
        <h1>Departments</h1>
        <span class="create-department-btn">
            <a href="{{ route('departments.create') }}">Create New Department</a>
        </span>
    </div>
    @foreach($departments as $department)
        <div class="department-card">
            <div class="department-info">
                <span>Title: {{ $department->title }}</span>
            </div>
            <div class="department-actions">
                <a href="{{ route('departments.edit', $department->id) }}" class="action-icon" title="Edit">
                    Edit
                </a>
                <span class="delete-department-btn">
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this department?')">
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
