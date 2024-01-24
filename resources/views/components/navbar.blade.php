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

    .language-switch-dropdown {
        position: relative;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .language-options {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: #333;
        border: 1px solid #555;
        border-radius: 5px;
        padding: 5px 0;
        z-index: 1;
    }

    .language-options a {
        display: block;
        padding: 8px 12px;
        color: #ffffff;
        text-decoration: none;
    }

    .language-options a:hover {
        background-color: #555;
    }

    .language-switch-dropdown:hover .language-options {
        display: block;
    }

    .language-arrow {
        margin-left: 5px;
    }

</style>
<nav>
    <div class="tabs-container">
        <div class="dropdown">
            <span>{{ __('messages.users') }}</span>
            <div class="dropdown-options">
                <a href={{ route('users.index') }}>{{ __('messages.see_all') }}</a>
                <a href="{{ route('users.create') }}">{{ __('messages.add_new') }}</a>
            </div>
        </div>
        <div class="dropdown">
            <span>{{ __('messages.categories') }}</span>
            <div class="dropdown-options">
                <a href="{{ route('categories.index') }}">{{ __('messages.see_all') }}</a>
                <a href="{{ route('categories.create') }}">{{ __('messages.add_new') }}</a>
            </div>
        </div>
        <div class="dropdown">
            <span>{{ __('messages.departments') }}</span>
            <div class="dropdown-options">
                <a href="{{ route('departments.index') }}">{{ __('messages.see_all') }}</a>
                <a href="{{ route('departments.create') }}">{{ __('messages.add_new') }}</a>
            </div>
        </div>
        <div class="dropdown">
            <span>{{ __('messages.tickets') }}</span>
            <div class="dropdown-options">
                <a href="{{ route('tickets.index') }}">{{ __('messages.see_all') }}</a>
                <a href="{{ route('tickets.create') }}">{{ __('messages.add_new') }}</a>
            </div>
        </div>
    </div>

    <div class="language-switch-dropdown">
        <span>
            {{ app()->getLocale() }}
        </span>
        <span class="language-arrow">&#9660;</span>
        <div class="language-options">
            <a href="{{ route('setLocale', ['locale' => 'en']) }}">en</a>
            <a href="{{ route('setLocale', ['locale' => 'mne']) }}">mne</a>
            <!-- Add more languages as needed -->
        </div>
    </div>
    <button class="logout-btn" onclick="location.href='#'">{{ __('messages.logout') }}</button>
</nav>
