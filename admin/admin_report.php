<?php
session_start();
include '../db.php';
include './sidebar.php';

$from_date = $_POST['from_date'] ?? '';
$to_date = $_POST['to_date'] ?? '';
$results = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = "SELECT * FROM `order` WHERE check_out BETWEEN '$from_date' AND '$to_date'";
    $results = $conn->query($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 20px;
        }

        .container {
            width: 1100px;
            margin-left: 300px;
            background: white;
            padding: 20px;
            border: 2px solid #343A40;

        }

        h2 {
            color: #343A40;
            text-align: center;
        }

        form {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 20px;
        }

        input[type="date"],
        button {
            padding: 10px;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background: #343A40;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        .no-result {
            text-align: center;
            color: red;
        }

        .print-btn {
            background: #343A40;
            color: white;
            padding: 10px;
            border: none;
            margin-top: 10px;
            cursor: pointer;
        }

        .print-btn:hover {
            background: #8A5410;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Admin Report Generator</h2>

        <form method="POST">
            <input type="date" name="from_date" required value="<?= $from_date ?>">
            <input type="date" name="to_date" required value="<?= $to_date ?>">
            <button type="submit">Generate Report</button>
        </form>

        <?php if ($results && $results->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Booking ID</th>
                    <th>User</th>
                    <th>Room</th>
                    <th>Total Price</th>
                    <th>Date</th>
                    <th>Phone</th>
                </tr>
                <?php while ($row = $results->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['O_id'] ?></td>
                        <td><?= $row['customer_name'] ?></td>
                        <td><?= $row['room_type'] ?></td>
                        <td><?= $row['total_price'] ?></td>
                        <td><?= $row['check_out'] ?></td>
                        <td><?= $row['phone'] ?></td>

                    </tr>
                <?php endwhile; ?>
            </table>

            <button class="print-btn" onclick="window.print()">Print Report</button>
        <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <p class="no-result">No records found for the selected dates.</p>
        <?php endif; ?>
    </div>

</body>

</html>