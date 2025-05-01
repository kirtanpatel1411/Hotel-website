<?php
session_start();
include 'db.php';
include 'header.php';


if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first!'); window.location.href='login.php';</script>";
    exit();
}






$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM `registration` WHERE u_id='$user_id'";
$result = $conn->query($query);
$user = $result->fetch_assoc();


$sql1 = "SELECT * FROM `order` WHERE u_id='$user_id'";

$result1 = $conn->query($sql1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];


    $update_query = "UPDATE `registration` SET name='$name', city='$city', address='$address', email='$email', phone='$phone' WHERE u_id='$user_id'";

    if ($conn->query($update_query) === TRUE) {

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


        .profile-container {
            position: absolute;
            top: 101px;
            right: 10px;
            width: 600px;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .profile-container h2 {
            color: #A66914;
            margin-bottom: 10px;
            font-size: 34px;
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
            border: 1PX solid #8A5410;
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

        .maincontainer {
            height: 900px;
            display: flex;
            justify-content: left;
            align-items: flex-start;
        }

        .bookings-container {
            width: 900px;
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
    </style>
</head>

<body>


    <div class="profile-container">
        <h2>My Profile</h2>
        <form action="profile.php" method="POST">
            <label>User Name:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            <label>City:</label>
            <input type="text" name="city" value="<?php echo htmlspecialchars($user['city']); ?>" required>
            <label>Address:</label>
            <input type="text" name="address" value="<?php echo htmlspecialchars($user['address']); ?>" required>

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
    <div class="maincontainer">


        <div class="bookings-container">
            <h2>My Bookings</h2>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Room</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Total Price</th>

                    <th>Action</th>
                </tr>

                <?php while ($row1 = $result1->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row1['customer_name']); ?></td>
                        <td><?php echo htmlspecialchars($row1['room_type']); ?></td>
                        <td><?php echo htmlspecialchars($row1['check_in']); ?></td>
                        <td><?php echo htmlspecialchars($row1['check_out']); ?></td>
                        <td>₹<?php echo number_format($row1['total_price'] * 1.05, 2); ?></td>

                        </td>
                        <td>

                            <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">

                                <form action="cancel_booking.php" method="POST">
                                    <input type="hidden" name="booking_id" value="<?php echo $row1['O_id']; ?>">
                                    <button type="submit" class="btn-cancel">Cancel</button>
                                </form>


                                <form action="bill.php" method="POST">
                                    <input type="hidden" name="booking_id" value="<?php echo $row1['O_id']; ?>">
                                    <input type="hidden" name="total_price" value="<?php echo $row1['total_price']; ?>">
                                    <button type="submit" class="btn-bill">Receipt</button>
                                </form>
                            </div>
                        </td>




                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>