<?php
include 'sidebar.php';
include '../db.php';


$userQuery = "SELECT COUNT(*) as totalUsers FROM users";
$userResult = $conn->query($userQuery);
$userData = $userResult->fetch_assoc();
$totalUsers = $userData['totalUsers'];

$orderQuery = "SELECT COUNT(*) as totalOrders FROM booking";
$orderResult = $conn->query($orderQuery);
$orderData = $orderResult->fetch_assoc();
$totalOrders = $orderData['totalOrders'];

$roomQuery = "SELECT COUNT(*) as totalRooms FROM rooms";
$roomResult = $conn->query($roomQuery);
$roomData = $roomResult->fetch_assoc();
$totalRooms = $roomData['totalRooms'];

$feedbackQuery = "SELECT COUNT(*) as totalFeedback FROM feedback";
$feedbackResult = $conn->query($feedbackQuery);
$feedbackData = $feedbackResult->fetch_assoc();
$totalFeedback = $feedbackData['totalFeedback'];


$offerQuery = "SELECT COUNT(*) as totaloffer FROM offers";
$offerResult = $conn->query($offerQuery);
$offerData = $offerResult->fetch_assoc();
$totaloffer = $offerData['totaloffer'];

$paymentQuery = "SELECT SUM(amount) as totalPayments FROM payments WHERE payment_status = 'Completed'";
$paymentResult = $conn->query($paymentQuery);
$paymentData = $paymentResult->fetch_assoc();
$totalPayments = $paymentData['totalPayments'] ? $paymentData['totalPayments'] : 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        .main-content {
            margin-left: 250px;
            padding: 30px;
            min-height: 100vh;
            flex-grow: 1;
        }

        .main-content h1 {
            color: black;
            margin-bottom: 20px;
            font-size: 24px;
        }


        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background:rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            color: #343A40;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;

            display: block;

            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .card p {
            font-size: 28px;
            margin-bottom: 10px;
            color: black;
        }

        .logout {
            position: fixed;
            top: 10px;
            right: 10px;

            cursor: pointer;
            transition: background 0.3s;
        }
    </style>
</head>

<body>

    <div class="main-content">
        <h1>Welcome to Admin Dashboard</h1>
        <div class="stats-cards">
            <a href="manage_user.php" class="card">
                <h3><img src="../images/profile.png" style="height: 50px;" alt="user"></h3>
                <p><?php echo $totalUsers; ?></p>
            </a>
            <a href="manage_order.php" class="card">
                <h3><img src="../images/booking.png" style="height: 50px;" alt="order"></h3>
                <p><?php echo $totalOrders; ?></p>
            </a>
            <a href="add_room.php" class="card">
                <h3><img src="../images/hotel.png" style="height: 50px;" alt="room"></h3>
                <p><?php echo $totalRooms; ?></p>
            </a>
            <a href="show_feedback.php" class="card">
                <h3><img src="../images/feedback.png" style="height: 50px;" alt="feedback"></h3>
                <p><?php echo $totalFeedback; ?></p>
            </a>
            <a href="add_offer.php" class="card">
                <h3><img src="../images/offer.png" style="height: 50px;" alt="offer"></h3>
                <p><?php echo $totaloffer; ?></p>
            </a>
            <a href="show_payment.php" class="card">
                <h3><img src="../images/wallet.png" style="height: 50px;" alt="payment"></h3>
                <p style="color:seagreen">₹<?php echo number_format($totalPayments, 2); ?></p>
            </a>
        </div>
        <img src="../images/power.png" style="height: 50px;" onclick="logout()" class="logout"></img>
    </div>

    <script>
        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                sessionStorage.clear();
                window.location.href = 'login.php';
            }
        }
    </script>

</body>

</html>