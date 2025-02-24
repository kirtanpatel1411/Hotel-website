<?php
session_start();
include 'header.php';

include 'db.php';


if (!isset($_GET['booking_id']) || empty($_GET['booking_id'])) {
   echo "<script>alert('Invalid Booking ID!'); window.location.href='index.php';</script>";
   exit;
}

$booking_id = $_GET['booking_id'];
$total_price = $_GET['total_price'];


$sql = "SELECT booking.*, 
               rooms.name AS room_name,
               payments.payment_id, 
               payments.payment_method, 
               payments.payment_status, 
               payments.amount
        FROM booking 
        JOIN rooms ON booking.room_id = rooms.id 
        INNER JOIN payments ON booking.id = payments.booking_id 
        WHERE booking.id = '$booking_id'";

$result = $conn->query($sql);

if (!$result) {
   die("Database Query Failed: " . $conn->error);
}

$booking = $result->fetch_assoc();
if (!$booking) {
   echo "<script>alert('Booking not found!'); window.location.href='index.php';</script>";
   exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Payment</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         background-color: #f8f8f8;
         padding-top: 50px;
      }

      .payment-details {
         padding: 20px;
         text-align: left;
         background-color: #fff;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         max-width: 800px;
         margin: 0 auto;
         border-radius: 10px;
      }

      .heading h1 {
         color: #A66914;
         font-size: 30px;

         display: flex;
         justify-content: center;
         align-items: center;
      }

      .payment-details p {
         font-size: 20px;
         margin-bottom: 10px;
         margin-top: 10px;
         display: flex;
         justify-content: space-between;
         padding: 8px 0;
         border-bottom: 1px solid #ddd;
      }

      .btn {
         background-color: #A66914;
         color: white;
         padding: 10px 20px;
         border: none;
         cursor: pointer;
         font-size: 16px;
         border-radius: 5px;
         margin-top: 20px;
      }

      .btn:hover {
         background-color: #8A5410;
      }

      .btndiv {
         display: flex;
         justify-content: center;

      }
   </style>
</head>

<body>
   <section class="payment-details">
      <div class="heading">

         <h1>Payment for Booking</h1>
      </div>
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
      <p><strong>Total Amount:</strong> ₹<?php echo number_format($total_price); ?></p>
      <p><strong>Payment ID:</strong> <?php echo isset($booking['payment_id']) ? htmlspecialchars($booking['payment_id']) : 'Not Available'; ?></p>
      <p><strong>Payment Method:</strong> <?php echo isset($booking['payment_method']) ? htmlspecialchars($booking['payment_method']) : 'Not Paid'; ?></p>
      <p><strong>Payment Status:</strong> <?php echo isset($booking['payment_status']) ? htmlspecialchars($booking['payment_status']) : 'Pending'; ?></p>
      <p><strong>Paid Amount:</strong> ₹<?php echo number_format($total_price); ?></p>


      <form action="add_to_profile.php" method="POST">
         <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
         <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
         <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
         <div class="btndiv">

            <button type="submit" class="btn">Save</button>
         </div>
      </form>



   </section>
   <?php

   include 'footer.php';
   ?>
</body>

</html>