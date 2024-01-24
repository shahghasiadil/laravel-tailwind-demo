<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.tickets') }}</title>
</head>
<style>
    .tickets-container {
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

    .tickets-header {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 15px;
    }

    .ticket-card {
        width: 100%;
        margin-bottom: 15px;
        padding: 15px;
        background-color: #fff; /* White background color for each ticket card */
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Slight box shadow for separation */

        /* Flex to arrange ticket information and actions horizontally */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .ticket-info {
        /* Style for ticket information */
    }

    .ticket-actions {
        /* Style for ticket actions (edit and delete) */
    }

    .action-icon {
        color: #007bff; /* Link color for actions */
        text-decoration: none;
        margin-left: 10px;
    }

    .action-icon:hover {
        text-decoration: underline;
    }

    .create-ticket-btn {
        margin-bottom: 15px;
    }

    .create-ticket-btn a {
        text-decoration: none;
        color: #fff;
        padding: 10px 15px;
        background-color: #28a745; /* Green color */
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .create-ticket-btn a:hover {
        background-color: #218838; /* Darker green color on hover */
    }

    .delete-ticket-btn {
        margin-left: 10px;
    }

    .delete-ticket-btn button {
        padding: 8px 12px;
        background-color: #dc3545; /* Red color */
        color: #fff;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-ticket-btn button:hover {
        background-color: #c82333; /* Darker red color on hover */
    }
</style>
<body>

@include('components.navbar')

<div class="tickets-container">
    <div class="tickets-header">
        <h1>Tickets</h1>
        <span class="create-ticket-btn">
            <a href="{{ route('tickets.create') }}">{{ __('messages.create_new_ticket') }}</a>
        </span>
    </div>
    @foreach($tickets as $ticket)
        <div class="ticket-card">
            <div class="ticket-info">
                <span>{{ __('messages.number') }}: {{ $ticket->number }}</span>
                <span>{{ __('messages.description') }}: {{ $ticket->description }}</span>
                <span>{{ __('messages.priority') }}: {{ __('messages.' . $ticket->priority) }}</span>
            </div>
            <div class="ticket-actions">
                <a href="{{ route('tickets.edit', $ticket->id) }}" class="action-icon" title="Edit">
                    {{ __('messages.edit') }}
                </a>
                <span class="delete-ticket-btn">
                    <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ticket?')">
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
