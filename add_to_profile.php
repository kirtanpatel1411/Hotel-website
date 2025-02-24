<?php
session_start();
include 'db.php';


if (isset($_POST['booking_id']) && !empty($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];
} elseif (isset($_GET['booking_id']) && !empty($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];
} else {
    echo "<script>alert('Invalid Booking ID!'); window.location.href='index.php';</script>";
    exit();
}

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in to view your bookings!'); window.location.href='login.php';</script>";
    exit;
}

$user_id = $_SESSION['user_id'];


$sql = "UPDATE booking SET status = 'confirmed' WHERE id = '$booking_id' AND user_id = '$user_id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Booking added to your profile!');
    window.location.href='profile.php?booking_id=$booking_id';
</script>";
} else {
    echo "<script>alert('Failed to add booking.');</script>";
}
