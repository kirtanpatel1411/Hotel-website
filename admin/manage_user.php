<?php
include '../db.php';
include 'sidebar.php';

// Fetch all rooms
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Users</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .container {
    margin-left: 250px; /* Adjust to match sidebar width */
    padding: 30px;
    width: calc(100% - 260px); /* Responsive width */
    min-height: 100vh;
    /* max-width: 500px; */
    /* background: #fff; */
    /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
    /* border-radius: 10px; */
    text-align: center;
}
    

        /* Table Styling */
        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #A66914;
            color: white;
            font-size: 18px;
        }

        /* Heading Styling */
        h1 {
            color: #A66914;
            text-align: center;
            text-decoration: underline;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">

        <h1>Existing Users</h1>
        <table>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Created_at</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    </body>
</html>
