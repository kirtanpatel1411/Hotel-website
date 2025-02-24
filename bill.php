<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first!'); window.location.href='login.php';</script>";
    exit();
}

if (!isset($_POST['booking_id']) || empty($_POST['booking_id']) || !isset($_POST['total_price'])) {
    echo "<script>alert('Invalid Booking Details!'); window.location.href='index.php';</script>";
    exit();
}

$booking_id = $_POST['booking_id'];
$total_price = $_POST['total_price'];
$user_id = $_SESSION['user_id'];

// Fetch user details
$user_sql = "SELECT * FROM users WHERE id = '$user_id'";
$user_result = $conn->query($user_sql);
$user = $user_result->fetch_assoc();

if (!$user) {
    echo "<script>alert('User not found!'); window.location.href='index.php';</script>";
    exit();
}

// Fetch booking details with payment method
$sql = "SELECT booking.*, payments.payment_method, payments.payment_id, rooms.name AS room_name 
        FROM booking 
        INNER JOIN payments ON booking.id = payments.booking_id 
        INNER JOIN rooms ON booking.room_id = rooms.id
        WHERE booking.id = '$booking_id' AND booking.user_id = '$user_id'";

$result = $conn->query($sql);

if (!$result || $result->num_rows == 0) {
    echo "<script>alert('Booking not found!'); window.location.href='index.php';</script>";
    exit();
}

$booking = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            padding: 15px;
        }

        .invoice-container {
            background-color: white;
            max-width: 700px;
            margin: auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 3px solid black;
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
        }

        .header img {
            max-width: 200px;
            display: flex;
            justify-content: flex-start;
        }

        .header h1 {
            font-size: 24px;
            color: #A66914;
        }

        .header p {
            font-size: 14px;
            color: #666;
        }

        .details-container div {
            display: flex;
            justify-content: space-between;
            padding: 7px 0;
            border-bottom: 1px solid #ddd;
        }

        .table-container {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table-container th,
        .table-container td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .table-container th {
            background-color: #A66914;
            color: white;
        }

        .total {
            text-align: right;
            font-size: 18px;
            margin-top: 10px;
        }

        .btn-print button {
            background-color: #A66914;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="header">
            <img src="./images/cy_logo_L.avif" alt="Hotel Logo">
            <h1>Hotel Booking Invoice</h1>
            <p>Courtyard, Earthspace, Hazira Road, Surat, Gujarat, India</p>
            <p><b>Email:</b> reservations@courtyardsurat.com | <b>Phone:</b> +91 9714022044</p>
            <hr>
        </div>

        <h2>Customer Details</h2>
        <div class="details-container">
            <div><strong>Name:</strong> <span><?= htmlspecialchars($user['name']); ?></span></div>
            <div><strong>Email:</strong> <span><?= htmlspecialchars($user['email']); ?></span></div>
            <div><strong>Phone:</strong> <span><?= htmlspecialchars($user['phone']); ?></span></div>
        </div>

        <h2>Booking Details</h2>
        <div class="details-container">
            <div><strong>Check-In:</strong> <span><?= htmlspecialchars($booking['check_in']); ?></span></div>
            <div><strong>Check-Out:</strong> <span><?= htmlspecialchars($booking['check_out']); ?></span></div>
            <div><strong>Room Name:</strong> <span><?= htmlspecialchars($booking['room_name']); ?></span></div>
        </div>

        <h2>Payment Details</h2>
        <div class="details-container">
            <div><strong>Payment ID:</strong> <span><?= htmlspecialchars($booking['payment_id']); ?></span></div>
            <div><strong>Payment Mode:</strong> <span><?= htmlspecialchars($booking['payment_method']); ?></span></div>
        </div>

        <table class="table-container">
            <tr>
                <th>Description</th>
                <th>Amount</th>
            </tr>
            <tr>
                <td>Room Charges</td>
                <td>₹<?= number_format($booking['total_price'], 2); ?></td>
            </tr>
            <tr>
                <td>Taxes (5%)</td>
                <td>₹<?= number_format($booking['total_price'] * 0.05, 2); ?></td>
            </tr>
            <tr>
                <td><strong>Total Amount</strong></td>
                <td><strong>₹<?= number_format($total_price, 2); ?></strong></td>
            </tr>
        </table>

        <p class="total"><strong>Grand Total: ₹<?= number_format($total_price, 2); ?></strong></p>

        <div class="btn-print">
            <button onclick="window.print()">Print Invoice</button>
        </div>
    </div>
</body>

</html>