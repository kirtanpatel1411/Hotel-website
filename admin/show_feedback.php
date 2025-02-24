<?php
include '../db.php';
include 'sidebar.php';

$sql = "SELECT * FROM feedback ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F8F9FA;
            margin: 0;
            padding: 0;
        }


        .container {
            margin-left: 200px;
            padding: 30px;
            width: calc(100% - 220px);
            min-height: 100vh;
            text-align: center;
        }


        h1 {
            color: #343A40;
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
            margin: 20px 0;
        }

        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }


        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background: #343A40;
            color: white;
            font-size: 18px;
            text-transform: uppercase;
        }


        tr:nth-child(even) {
            background: #F1F3F5;
        }

        tr:hover {
            background: #E9ECEF;
        }


        a {
            display: inline-block;
            padding: 8px 14px;
            background: #17A2B8;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s ease-in-out;
        }

        a:hover {
            background: #138496;
        }


        .delete-btn {
            background: #DC3545;
            padding: 8px 14px;
            border-radius: 6px;
        }

        .delete-btn:hover {
            background: #C82333;
        }


        @media screen and (max-width: 768px) {
            .container {
                margin-left: 0;
                width: 100%;
                padding: 20px;
            }

            table {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Customer Feedback</h1>

        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Visit Date</th>
                <th>Rating</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['visit_date'] ? $row['visit_date'] : 'N/A' ?></td>
                    <td><?= str_repeat("⭐", $row['rating']) ?></td>
                    <td><?= $row['message'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>