<?php
session_start();
include 'db.php';
include 'header.php';

// // Fetch booking_id correctly from GET or POST
// if (isset($_POST['booking_id']) && !empty($_POST['booking_id'])) {
//     $booking_id = $_POST['booking_id']; // Use POST if sent via form submission
// } elseif (isset($_GET['booking_id']) && !empty($_GET['booking_id'])) {
//     $booking_id = $_GET['booking_id']; // Use GET if sent via URL
// } else {
//     echo "<script>alert('Invalid Booking ID!'); window.location.href='index.php';</script>";
//     exit();
// }
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first!'); window.location.href='login.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($query);
$user = $result->fetch_assoc();

$sql = "SELECT booking.*, rooms.name AS room_name FROM booking 
        JOIN rooms ON booking.room_id = rooms.id 
        WHERE booking.user_id = '$user_id' AND booking.status = 'confirmed'";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Update user details
    $update_query = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id='$user_id'";

    if ($conn->query($update_query) === TRUE) {
        $_SESSION['user_name'] = $name; // Update session name
        echo "<script>alert('Profile updated successfully!'); window.location.href='profile.php';</script>";
    } else {
        echo "<script>alert('Error updating profile!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            padding-top: 50px;
            margin: 0;
        }

        /* Profile Section - Positioned on Right */
        .profile-container {
            position: absolute;
            top: 101px;
            right: 0px;
            width: 300px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid black;
            text-align: center;
        }

        .profile-container h2 {
            color: #A66914;
            margin-bottom: 10px;
            font-size: 24px;
            border-bottom: 2px solid #A66914;
            padding-bottom: 5px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            text-align: left;
            font-size: 14px;
            font-weight: bold;
            margin-top: 10px;
        }

        input {
            padding: 8px;
            margin: 5px 0;
            border: 1px solid black;
            border-radius: 5px;
            width: 100%;
        }

        button {
            background: #A66914;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            font-size: 16px;
        }

        button:hover {
            background: #8A5410;
        }

        .logout-btn {
            margin-top: 20px;
        }

        .logout-btn a {
            display: inline-block;
            background: #d9534f;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .logout-btn a:hover {
            background: #c9302c;
        }

        /* Booking Table */
        .bookings-container {
            max-width: 800px;
            margin: 128px 150px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .bookings-container h2 {
            text-align: center;
            color: #A66914;
            margin-bottom: 20px;
            font-size: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 7px;
            text-align: center;
            font-size: 15px;
        }

        th {
            background-color: #A66914;
            color: white;
        }

        .status {
            font-weight: bold;
        }

        .pending {
            color: orange;
        }

        .confirmed {
            color: green;
        }

        .canceled {
            color: red;
        }

        /* Cancel Button */
        .btn-cancel {
            background-color: red;
            color: white;
            padding: 5px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin: auto;
        }

        .btn-cancel:hover {
            background-color: black;
        }

        /* Green Button for Generate Bill */
        .btn-bill {
            background-color: green;
            color: white;
            padding: 5px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin: auto;
        }

        .btn-bill:hover {
            background-color: darkgreen;
        }

        /* Flexbox for Button Alignment */
        /* td {
    display: flex;
    justify-content: center;
    gap: 10px; /* Spacing between buttons */
    </style>
</head>

<body>

    <!-- Profile Section (Right Side) -->
    <div class="profile-container">
        <h2>My Profile</h2>
        <form action="profile.php" method="POST">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required pattern="[0-9]{10}" title="Enter a valid 10-digit phone number">

            <button type="submit">Update Profile</button>
        </form>

        <div class="logout-btn">
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <!-- Booking Details Table -->
    <div class="bookings-container">
        <h2>My Bookings</h2>
        <table>
            <tr>
                <th>Room</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['room_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['check_in']); ?></td>
                    <td><?php echo htmlspecialchars($row['check_out']); ?></td>
                    <td>₹<?php echo number_format($row['total_price'], 2); ?></td>
                    <td class="status <?php echo strtolower($row['status']); ?>">
                        <?php echo ucfirst($row['status']); ?>
                    </td>
                    <td>

                        <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                            <!-- Cancel Button (Red) -->
                            <form action="cancel_booking.php" method="POST">
                                <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn-cancel">Cancel</button>
                            </form>

                            <!-- Generate Bill Button (Green) -->
                            <form action="bill.php" method="POST">
                                <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="total_price" value="<?php echo $row['total_price']; ?>">
                                <button type="submit" class="btn-bill">Receipt</button>
                            </form>
                        </div>
                    </td>




                </tr>
            <?php } ?>

        </table>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>