<?php
$host = "127.0.0.1"; // or "localhost"
$user = "root";
$pass = ""; // leave empty unless you set a password
$db   = "user_portal";
$port = 3307; // change to your MySQL port (from phpMyAdmin or XAMPP)

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>