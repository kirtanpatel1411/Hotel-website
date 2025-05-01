<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM registration WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {

            echo "<script>alert('Welcome Admin!'); window.location.href='dashboard.php';</script>";
        } else {
            echo "<script>alert('Invalid password');</script>";
        }
    } else {
        echo "<script>alert('No user found with this email');</script>";
    }
}
?>

<!-- HTML form -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
        }

        .heading {
            height: 100PX;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 400px;
            height: 300px;
            margin: 100px auto;
            background: white;
            padding: 20px;

            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid black;
        }

        h2 {
            font-size: 30px;
        }

        input,
        button {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #343A40;
        }

        button {
            background-color: #343A40;
            color: white;
            border: none;
        }

        button:hover {
            background-color: #343A40;
        }
    </style>
</head>

<body>
    <div class="heading">

        <h1>Admin Login</h1>
    </div>
    <div class="container">
        <h2 style="color:#343A40;">Login</h2>
        <form action="login.php" method="POST">
            <input type="name" name="username" required placeholder="Enter your username">
            <input type="password" name="password" required placeholder="Enter your password">
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
</body>

</html>