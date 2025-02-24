
<?php
include '../db.php';

$sql = "SELECT * FROM payments";
$result = $conn->query($sql);
?>
<?php include 'sidebar.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Payments</title>
    <style>
 

/* Content Wrapper */
.main-content {
    margin-left: 270px; /* Prevents sidebar overlap */
    width: calc(100% - 270px);
    padding: 20px;
    background: #f4f6f9;
    min-height: 100vh;
}

/* Headings */
h1 {
    color: #A66914;
    text-align: center;
    text-decoration: underline;
    margin-bottom: 20px;
}

/* Table Styling */
table {
    width: 90%;
    margin: 0 auto;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
    font-size: 16px;
}

th {
    background: #A66914;
    color: white;
    font-size: 18px;
}

/* Update Button */
a {
    display: inline-block;
    padding: 6px 12px;
    background: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: 0.3s;
}

a:hover {
    background: #218838;
}

/* Responsive Design */
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
            <!-- <th>Action</th> -->
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
            <!-- <td><a href="update_payment.php?id=<?php echo $row['id']; ?>">Update</a></td> -->
        </tr>
        <?php } ?>
    </table>
    </div>
</body>
</html>
