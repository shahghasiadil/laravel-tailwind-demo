<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    nav {
        background-color: #333;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    nav .tabs-container {
        display: flex;
        align-items: center;
    }

    nav a {
        color: #fff;
        text-decoration: none;
        padding: 10px;
        margin-right: 15px;
    }

    nav a:hover {
        background-color: #555;
    }

    .logout-btn {
        background-color: #dc3545;
        border: none;
        color: #fff;
        padding: 10px 15px;
        cursor: pointer;
    }

    .logout-btn:hover {
        background-color: #bd2130;
    }

    .dropdown {
        display: inline-block;
        position: relative;
        color: #ffffff;
        text-decoration: none;
        margin-right: 15px;
        padding: 10px 10px 5px;
    }

    .dropdown:hover {
        background-color: #555;
    }

    .dropdown-options {
        display: none;
        position: absolute;
        top: 100%;
        left: 0; /* Align the left edge of the dropdown with the left edge of the trigger */
        overflow: auto;
        white-space: nowrap;
    }

    .dropdown-options a {
        display: block;
        padding: 8px 12px;
        color: #ffffff;
        text-decoration: none;
        background-color: #333;
    }

    .dropdown-options a:hover {
        background-color: #555;
    }

    .dropdown:hover .dropdown-options {
        display: block;
    }


</style>
<nav>
    <div class="tabs-container">
        <div class="dropdown">
            <span>Users</span>
            <div class="dropdown-options">
                <a href={{ route('users.index') }}>See all</a>
                <a href="{{ route('users.create') }}">Add new</a>
            </div>
        </div>
        <div class="dropdown">
            <span>Categories</span>
            <div class="dropdown-options">
                <a href="{{ route('categories.index') }}">See all</a>
                <a href="{{ route('categories.create') }}">Add new</a>
            </div>
        </div>
        <div class="dropdown">
            <span>Departments</span>
            <div class="dropdown-options">
                <a href="{{ route('departments.index') }}">See all</a>
                <a href="#">Add new</a>
            </div>
        </div>
        <div class="dropdown">
            <span>Tickets</span>
            <div class="dropdown-options">
                <a href="#">See all</a>
                <a href="#">Add new</a>
            </div>
        </div>
    </div>
    <button class="logout-btn" onclick="location.href='#'">Logout</button>
</nav>
