<?php
include '../db.php';

$sql = "SELECT * FROM payments";
$result = $conn->query($sql);
?>
<?php include 'sidebar.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Manage Payments</title>
    <style>
        .main-content {
            margin-left: 270px;
            width: calc(100% - 270px);
            padding: 20px;
            background: #F8F9FA;
            min-height: 100vh;
        }


        h1 {
            color: #343A40;
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            table {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="main-content">
        <h1>All Payments</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Booking ID</th>
                <th>Payment ID</th>
                <th>Customer Name</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Status</th>

            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['booking_id']; ?></td>
                    <td><?php echo $row['payment_id']; ?></td>
                    <td><?php echo $row['customer_name']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    <td style="color:limegreen"><?php echo $row['payment_status']; ?></td>

                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>