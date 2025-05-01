<?php
session_start();
include 'db.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username     = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $city     = $_POST['city'];
    $address  = $_POST['address'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $user_type = $_POST['user_type'];

    $check_email = "SELECT * FROM registration WHERE email='$email'";
    $result = $conn->query($check_email);

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already exists!'); window.location.href='register.php';</script>";
    } else {
        $sql = "INSERT INTO registration (username, email, phone, city, address, password, user_type) 
                VALUES ('$username', '$email', '$phone', '$city', '$address', '$password', '$user_type')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration successful! Please login.'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error: Could not register. Try again.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .main-content {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }


        .container {
            width: 550px;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 2px solid black;
        }

        h2 {
            color: #A66914;
            font-size: 40px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            text-align: left;
            font-size: 20px;
        }

        input {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid black;
            width: 100%;
        }

        .radio-group {
            display: flex;
            justify-content: flex-start;
            gap: 30px;
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            font-size: 18px;
            cursor: pointer;
        }

        .radio-option input[type="radio"] {
            margin-right: 8px;
            transform: scale(1.2);
            cursor: pointer;
        }

        .row-group {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
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

        .link {
            margin-top: 15px;
            font-size: 14px;
        }

        .link a {
            color: #A66914;
            text-decoration: none;
            font-weight: bold;
        }

        .link a:hover {
            text-decoration: underline;
        }


        .footer {
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <div class="main-content">
        <div class="container">
            <h2>User Registration</h2>
            <form action="register.php" method="POST">

                <label>User Type:</label>
                <div class="radio-group">
                    <label class="radio-option">
                        <input type="radio" name="user_type" value="user" required checked>
                        <span>User</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="user_type" value="admin" required>
                        <span>Admin</span>
                    </label>
                </div>

                <label>UserName:</label>
                <input type="text" name="username" required>

                <label>Email:</label>
                <input type="email" name="email" required>

                <div class="row-group">
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" name="phone" required pattern="[0-9]{10}" title="Enter a valid 10-digit phone number">
                    </div>
                    <div class="form-group">
                        <label>City:</label>
                        <input type="text" name="city" required>
                    </div>
                </div>
                <label>Address:</label>
                <input type="text" name="address" required>

                <label>Password:</label>
                <input type="password" name="password" required>

                <button type="submit">Register</button>

                <div class="link">
                    Already have an account? <a href="login.php">Login</a>
                </div>
            </form>

        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>