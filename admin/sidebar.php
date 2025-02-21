<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        /* General Styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #A66914;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            color: #fff;
            font-size: 16px;
            cursor: pointer; /* Makes it look clickable */
            transition: background 0.3s;
        }

        .sidebar ul li:hover,
        .sidebar ul li.active {
            background-color: #8A5410;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul id="menu">
            <li onclick="window.location.href='dashboard.php'">Dashboard</li>
            <li onclick="window.location.href='add_gallery.php'">Manage Gallery</li>
            <li onclick="window.location.href='add_room.php'">Manage Rooms</li>
            <li onclick="window.location.href='manage_order.php'">Manage Orders</li>
            <li onclick="window.location.href='add_offer.php'">Manage Offer</li>
            <li onclick="window.location.href='manage_user.php'">Manage User</li>
            <li onclick="window.location.href='show_feedback.php'">Show Feedback</li>
            <li onclick="window.location.href='show_payment.php'">Show Payment</li>
        </ul>
    </div>

</body>

</html>
