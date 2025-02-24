<?php
session_start();

include 'db.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $visit_date = !empty($_POST['visit_date']) ? $_POST['visit_date'] : NULL;
    $rating = $_POST['rating'];
    $message = $_POST['message'];

    $sql = "INSERT INTO feedback (name, email, phone, visit_date, rating, message) 
            VALUES ('$name', '$email', '$phone', " . ($visit_date ? "'$visit_date'" : "NULL") . ", '$rating', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Thank you for your feedback!'); window.location.href='feedback.php';</script>";
    } else {
        echo "<script>alert('Error submitting feedback. Try again!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }


        .container {
            display: flex;
            justify-content: left;
            align-items: center;
            gap: 30px;
            padding: 30px;
            max-width: 80%;
            margin: auto;
            height: 100vh;
        }

        .left-content {
            flex: 1;
            text-align: center;
            padding: 20px;
        }

        .left-content h1 {
            color: #A66914;
            font-size: 32px;
        }

        .left-content p {
            font-size: 18px;
            line-height: 1.6;
            margin-top: 10px;
        }


        .feedback-form {
            width: 40%;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
            position: sticky;
            top: 20px;
        }

        h2 {
            color: #A66914;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }


        #rating span {
            font-size: 24px;
            cursor: pointer;
            color: gray;
        }

        #rating span:hover,
        #rating span:active {
            color: #A66914;
        }


        button {
            background: #A66914;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 15px;
            font-size: 16px;
        }

        button:hover {
            background: #8A5410;
        }


        @media (max-width: 900px) {
            .container {
                flex-direction: column;
                align-items: center;
                height: auto;
            }

            .feedback-form {
                width: 80%;
            }
        }


        @keyframes blinkAnimation {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.2;
            }
        }

        .blink {
            animation: blinkAnimation 0.3s ease-in-out;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="left-content">
            <h1>We Value Your Feedback!</h1>
            <p>At Courtyard Marriott Surat, we strive to provide an unforgettable experience for our guests. Your feedback helps us improve our services and create a more comfortable environment. Whether it's about our hospitality, rooms, dining, or overall experience, we would love to hear from you.</p>
            <p>Please take a moment to share your thoughts and rate your experience. We appreciate your time and look forward to welcoming you again soon!</p>
        </div>


        <form class="feedback-form" action="feedback.php" method="POST" onsubmit="return validateFeedback()">
            <h2>Give Your Feedback</h2>
            <label>Name:</label>
            <input type="text" name="name" id="name" required>

            <label>Email:</label>
            <input type="email" name="email" id="email" required>

            <label>Phone:</label>
            <input type="text" name="phone" id="phone" required pattern="[0-9]{10}" title="Enter a valid 10-digit phone number">

            <label>Visit Date (Optional):</label>
            <input type="date" name="visit_date" id="visit_date">

            <label>Rating:</label>
            <div id="rating">
                <span onclick="setRating(1)">⭐</span>
                <span onclick="setRating(2)">⭐</span>
                <span onclick="setRating(3)">⭐</span>
                <span onclick="setRating(4)">⭐</span>
                <span onclick="setRating(5)">⭐</span>
            </div>
            <input type="hidden" name="rating" id="rating-value">

            <label>Feedback:</label>
            <textarea name="message" id="message" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>