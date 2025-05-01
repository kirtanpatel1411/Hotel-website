<?php
session_start();
include 'header.php';

include 'db.php';

$booking_id = $_GET['booking_id'];


$sql = "SELECT * FROM payments WHERE booking_id = '$booking_id' ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
$payment = $result->fetch_assoc();

if (!$payment) {
   echo "<script>alert('No payment found!'); window.location.href='index.php';</script>";
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
      <div style="max-width:600px;margin:50px auto;padding:30px;border:1px solid #ccc;border-radius:10px;">
         <h2 style="color:#A66914;">Payment Confirmation</h2>
         <p><strong>Payment ID:</strong> <?php echo $payment['payment_id']; ?></p>
         <p><strong>Booking ID:</strong> <?php echo $payment['booking_id']; ?></p>
         <p><strong>Customer Name:</strong> <?php echo $payment['customer_name']; ?></p>
         <p><strong>Amount Paid:</strong> ₹<?php echo $payment['amount']; ?></p>
         <p><strong>Payment Method:</strong> <?php echo $payment['payment_method']; ?></p>
         <p><strong>Status:</strong> ✅ <?php echo $payment['payment_status']; ?></p>
         <a href="profile.php" style="display:inline-block;margin-top:20px;background:#A66914;color:#fff;padding:10px 20px;border-radius:5px;text-decoration:none;">Back to Profile</a>
      </div>





   </section>
   <?php

   include 'footer.php';
   ?>
</body>

</html>