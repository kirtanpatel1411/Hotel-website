<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in first!'); window.location.href='login.php';</script>";
    exit;
}

$user_id = $_SESSION['user_id'];
$booking_id = $_POST['booking_id'];

// Update the booking status to "canceled"
$sql = "UPDATE booking SET status = 'canceled' WHERE id = '$booking_id' AND user_id = '$user_id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Booking canceled successfully.'); window.location.href='profile.php';</script>";
} else {
    echo "<script>alert('Failed to cancel booking.');</script>";
}
?>
