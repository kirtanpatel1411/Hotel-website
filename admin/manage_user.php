<?php
include '../db.php';
include 'sidebar.php';


$result = $conn->query("SELECT * FROM registration");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-left: 250px;
            padding: 30px;
            width: calc(100% - 260px);
            min-height: 100vh;

            text-align: center;
        }



        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #343A40;
            color: white;
            font-size: 18px;
        }


        h1 {
            color: #343A40;
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
                <th>UserName</th>
                <th>City</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Type</th>

            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['u_id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['user_type']; ?></td>

                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>