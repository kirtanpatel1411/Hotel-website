<?php
session_start();

include 'db.php';
include 'header.php';

if (!isset($_GET['booking_id']) || empty($_GET['booking_id'])) {
    echo "<script>alert('Invalid Booking ID!'); window.location.href='index.php';</script>";
    exit;
}

$booking_id = $_GET['booking_id'];
$total_price = $_GET['total_price'];
$payment_status = "Completed"; // Default status

$payment_id = "PAY-" . rand(1000, 9999);


$sql = "SELECT * FROM booking WHERE id = '$booking_id'";
$result = $conn->query($sql);
$booking = $result->fetch_assoc();

if (!$booking) {
    echo "<script>alert('Booking not found!'); window.location.href='index.php';</script>";
    exit;
}

// Handle Payment Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];

    $sql = "INSERT INTO payments (booking_id,payment_id, customer_name, amount, payment_method, payment_status) 
            VALUES ('$booking_id','$payment_id', '$customer_name', '$amount', '$payment_method', '$payment_status')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Payment Successful! Payment ID: $payment_id');
        window.location.href='confirm_payment.php?booking_id=$booking_id&total_price=$total_price';
    </script>";
    } else {
        echo "<script>
        alert('Payment Failed: " . $conn->error . "');
        window.history.back();
    </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        .payment-container {
            max-width: 500px;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 50px auto;
        }

        .payment-container h2 {
            color: #A66914;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .box {
            margin-bottom: 15px;
            text-align: left;
        }

        .box p {
            font-size: 16px;
            font-weight: 500;
            color: #333;
            margin-bottom: 5px;
        }

        .input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 10px;
        }

        button {
            width: 100%;
            background: #A66914;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #8A5410;
        }

        /* Style for the Generate Bill button */
        .btn {
            background: #555;
            color: white;
            padding: 10px;
            border-radius: 5px;
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
        }

        .btn:hover {
            background: #333;
        }
    </style>
</head>

<body>

    <div class="payment-container">
        <h2>Payment Details</h2>
        <form action="" method="POST">
            <div class="box">
                <p>Booking ID:</p>
                <input type="text" class="input" name="booking_id" value="<?php echo htmlspecialchars($booking['id']); ?>" readonly>
            </div>
            <div class="box">
                <p>Customer Name:</p>
                <input type="text" class="input" name="customer_name" value="<?php echo htmlspecialchars($booking['customer_name']); ?>" readonly>
            </div>
            <div class="box">
                <p>Amount:</p>
                <input type="text" class="input" name="amount" value="<?php echo htmlspecialchars($total_price); ?>" readonly>
            </div>
            <label>Payment Method:</label>
            <select name="payment_method" required>
                <option value="Card">Card</option>
                <option value="UPI">UPI</option>
                <option value="Net Banking">Net Banking</option>
                <option value="Cash">Cash</option>
            </select>
            <button type="submit" name="pay_now">Pay Now</button>
        </form>


    </div>

    <?php
    include 'footer.php';
    ?>

</body>

</html>