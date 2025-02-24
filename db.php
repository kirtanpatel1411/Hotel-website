<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'hotel';
$conn = new mysqli($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
