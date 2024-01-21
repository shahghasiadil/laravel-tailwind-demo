<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Project</title>
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

    </style>
</head>
<body>

<nav>
    <div class="tabs-container">
        <a href="#">Users</a>
        <a href="#">Categories</a>
        <a href="#">Departments</a>
        <a href="#">Tickets</a>
    </div>
    <button class="logout-btn" onclick="location.href='#'">Logout</button>
</nav>

    <h1>Dashboard</h1>

</body>
</html>
