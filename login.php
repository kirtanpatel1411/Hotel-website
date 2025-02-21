<?php
session_start();

include 'db.php';
include 'header.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
             // Redirect user to the previous page (if available), otherwise to homepage
             if (!empty($_GET['redirect'])) {
                $redirect_url = $_GET['redirect'];
            } else {
                $redirect_url = 'index.php';
            }
            echo "<script>alert('Login successful!'); window.location.href='$redirect_url';</script>";
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('User not found!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Centering the Login Form */
.main-content {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: calc(100vh - 100px); /* Adjust height dynamically */
    padding: 20px;
}

/* Login Form Container */
.container {
    width: 550px;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    border: 2px solid black;
}

h2 {
    color: #A66914;
    margin-bottom: 20px;
    font-size: 45px;
    border: 2px solid #8A5410;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    text-align: left;
    font-size: 25px;
    margin-top: 10px;
}

input {
    padding: 10px;
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

/* Ensure footer does not overlap */
.footer {
    margin-top: 30px;
}

    </style>
</head>
<body>

<div class="main-content">
    <div class="container">
        <h2>User Login</h2>
        <form action="login.php" method="POST">
            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>

            <div class="link">
                Don't have an account? <a href="register.php">Register</a>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
