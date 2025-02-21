<?php
session_start();

include 'db.php';
include 'header.php';

// Debugging: Ensure `booking_id` is received
if (!isset($_GET['booking_id']) || empty($_GET['booking_id'])) {
    echo "<script>alert('Invalid Booking ID!'); window.location.href='index.php';</script>";
    exit;
}

$booking_id = $_GET['booking_id'];
// $room_id = isset($_GET['room_id']) ? $_GET['room_id'] : '';

// Debugging: Check received values
// var_dump($booking_id, $room_id);

$sql = "SELECT * FROM booking WHERE id = '$booking_id'";
$result = $conn->query($sql);

if (!$result) {
    die("Database Query Failed: " . $conn->error);
}

$booking = $result->fetch_assoc();
if (!$booking) {
    echo "<script>alert('Booking not found!'); window.location.href='index.php';</script>";
    exit;
}

// $sql_room = "SELECT * FROM rooms WHERE id = '$room_id'";
// $result_room = $conn->query($sql_room);
// $room = $result_room->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Payment</title>
   <style>
   body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding-top: 80px;
}

.payment-container {
    max-width: 600px;
    background: #fff;
    padding: 25px;
    margin: 20px auto;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
   
}

.payment-container h1 {
    color: #A66914;
    font-size: 26px;
    text-align: center;
    margin-bottom: 20px;
    font-weight: 600;
}

.payment-details {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.payment-details p {
    font-size: 20px;
    color: #333;
    padding: 8px 0;
    border-bottom: 1px solid #e0e0e0;
    display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
}

.payment-details p strong {
    color: #A66914;
}

.total-amount {
    font-size: 18px;
    font-weight: bold;
    color: #A66914;
    margin-top: 15px;
}

.payment-btn {
    display: block;
    width: 100%;
    text-align: center;
    background: #A66914;
    color: white;
    padding: 12px;
    border-radius: 6px;
    font-size: 18px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    margin-top: 20px;
    transition: background 0.3s ease;
}

.payment-btn:hover {
    background: #8A5410;
}


   </style>
</head>
<body>
<section class="payment-container">
   <h1>Payment for Booking</h1>
   <div class="payment-details">
      <p><strong>Room Name:</strong> <?php echo htmlspecialchars($booking['room_name']); ?></p>
      <p><strong>Customer Name:</strong> <?php echo htmlspecialchars($booking['customer_name']); ?></p>
      <p><strong>Email:</strong> <?php echo htmlspecialchars($booking['email']); ?></p>
      <p><strong>Phone:</strong> <?php echo htmlspecialchars($booking['phone']); ?></p>
      <p><strong>Check-In Date:</strong> <?php echo htmlspecialchars($booking['check_in']); ?></p>
      <p><strong>Check-Out Date:</strong> <?php echo htmlspecialchars($booking['check_out']); ?></p>
      <p><strong>Adults:</strong> <?php echo htmlspecialchars($booking['adults']); ?></p>
      <p><strong>Children:</strong> <?php echo htmlspecialchars($booking['children']); ?></p>
      <p><strong>Rooms:</strong> <?php echo htmlspecialchars($booking['rooms']); ?></p>
      <p><strong>Room Charges:</strong> ₹<?php echo number_format($booking['total_price'], 2); ?></p>
      <p><strong>Taxes (5%):</strong> ₹<?php echo number_format($booking['total_price'] * 0.05, 2); ?></p>
      <p><strong>Status:</strong> <?php echo htmlspecialchars($booking['status']); ?></p>
      <p class="total-amount"><strong>Total Amount:</strong> ₹<?php echo number_format($booking['total_price'] * 1.05, 2); ?></p>
   </div>
   <form action="payment_success.php" method="GET">
    <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
    <input type="hidden" name="total_price" value="<?php echo $booking['total_price'] * 1.05; ?>">
    <button type="submit" class="payment-btn">Pay Now</button>
</form>

</section>

</body>
</html>

<?php include 'footer.php'; ?>
