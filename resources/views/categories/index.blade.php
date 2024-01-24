<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.categories') }}</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- Additional head content -->
</head>
<style>
    .categories-container {
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

    .categories-header {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 15px;
    }

    .category-card {
        width: 100%;
        margin-bottom: 15px;
        padding: 15px;
        background-color: #fff; /* White background color for each category card */
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Slight box shadow for separation */

        /* Flex to arrange category information and actions horizontally */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .category-info {
        /* Style for category information */
    }

    .category-actions {
        /* Style for category actions (edit and delete) */
    }

    .action-icon {
        color: #007bff; /* Link color for actions */
        text-decoration: none;
        margin-left: 10px;
    }

    .action-icon:hover {
        text-decoration: underline;
    }

    .create-category-btn {
        margin-bottom: 15px;
    }

    .create-category-btn a {
        text-decoration: none;
        color: #fff;
        padding: 10px 15px;
        background-color: #28a745; /* Green color */
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .create-category-btn a:hover {
        background-color: #218838; /* Darker green color on hover */
    }

    .delete-category-btn {
        margin-left: 10px;
    }

    .delete-category-btn button {
        padding: 8px 12px;
        background-color: #dc3545; /* Red color */
        color: #fff;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-category-btn button:hover {
        background-color: #c82333; /* Darker red color on hover */
    }
</style>
<body>

@include('components.navbar')

<div class="categories-container">
    <div class="categories-header">
        <h1>{{ __('messages.categories') }}</h1>
        <span class="create-category-btn">
            <a href="{{ route('categories.create') }}">{{ __('messages.create_new_category') }}</a>
        </span>
    </div>
    @foreach($categories as $category)
        <div class="category-card">
            <div class="category-info">
                <span>{{ __('messages.title') }}: {{ $category->title }}</span>
                <!-- Add other category information as needed -->
            </div>
            <div class="category-actions">
                <a href="{{ route('categories.edit', $category->id) }}" class="action-icon" title="Edit">
                    {{ __('messages.edit') }}
                </a>
                <span class="delete-category-btn">
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-button" title="Delete">{{ __('messages.delete') }}</button>
                    </form>
                </span>
            </div>
        </div>
    @endforeach

</div>

</body>
</html>
