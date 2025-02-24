<?php
include '../db.php';
include 'sidebar.php';

$result = $conn->query("SELECT * FROM booking");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-orders </title>
    <style>
        body {
            font-family: Arial, sans-serif;

            margin: 0;
            padding: 0;
            display: flex;
        }


        .sidebar {
            width: 250px;
            position: fixed;
            height: 100%;
            background: #A66914;
        }


        .container {
            margin-left: 250px;
            padding: 30px;
            width: calc(100% - 260px);
            min-height: 100vh;

            text-align: center;
        }

        h2 {
            color: #A66914;
            text-align: center;
            font-size: 26px;
            margin-bottom: 20px;
        }

        .table-container {
            margin-top: 30px;
            overflow-x: auto;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }


        th {
            background-color: #A66914;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 16px;
            text-transform: uppercase;
        }


        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
            color: #333;
            text-align: center;
        }


        tr:nth-child(even) {
            background-color: #f9f9f9;
        }


        tr:hover {
            background-color: #f1f1f1;
            transition: 0.2s ease-in-out;
        }


        @media (max-width: 768px) {
            .container {
                margin-left: 0;
                width: 100%;
                padding: 20px;
            }

            table {
                width: 100%;
            }

            th,
            td {
                padding: 10px;
                font-size: 13px;
            }

            th {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">


        <h2>Booking Order</h2>
        <div class="table-container">
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Room_id</th>
                    <th>Room_name</th>
                    <th>Castomer_name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Check_in</th>
                    <th>Check_out</th>
                    <th>Adults</th>
                    <th>Children</th>
                    <th>Rooms</th>
                    <th>Total_price</th>
                    <th>status</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['room_id'] ?></td>
                        <td><?= $row['room_name'] ?></td>
                        <td><?= $row['customer_name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['check_in'] ?></td>
                        <td><?= $row['check_out'] ?></td>
                        <td><?= $row['adults'] ?></td>
                        <td><?= $row['children'] ?></td>
                        <td><?= $row['rooms'] ?></td>
                        <td><?= $row['total_price'] ?></td>
                        <td><?= $row['status'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</body>

</html>