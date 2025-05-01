<?php
include 'header.php';
$booking_id = $_GET['booking_id'];
$total_price = $_GET['total_price'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Processing Payment</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
        }

        .loader-container {
            text-align: center;
        }

        .circle-loader {
            width: 100px;
            height: 100px;
            border: 5px solid #A66914;
            border-top: 5px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: auto;
        }

        .text {
            margin-top: 20px;
            font-size: 20px;
            color: #A66914;
            font-weight: bold;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .checkmark {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: none;
            border: 4px solid #28a745;
            position: relative;
            animation: pop 0.3s ease-out forwards;
        }

        .checkmark:after {
            content: '';
            position: absolute;
            left: 22px;
            top: 12px;
            width: 25px;
            height: 45px;
            border: solid black;
            border-width: 0 6px 6px 0;
            transform: rotate(45deg);
        }

        @keyframes pop {
            0% { transform: scale(0); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>

<div class="loader-container">
    <div class="circle-loader" id="loader"></div>
    <div class="checkmark" id="check"></div>
    <div class="text" id="text">Processing your payment...</div>
</div>

<script>
    setTimeout(() => {
        document.getElementById('loader').style.display = 'none';
        document.getElementById('check').style.display = 'block';
        document.getElementById('text').innerText = 'Payment Confirmed!';
    }, 2500);

    setTimeout(() => {
        window.location.href = "confirm_payment.php?booking_id=<?= $booking_id ?>&total_price=<?= $total_price ?>";
    }, 3000);
</script>

</body>
</html>
