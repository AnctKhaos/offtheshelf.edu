<?php
// protect_admin.php

include 'secure_session.php';
include 'db_connect.php';

// Prevent browser from caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");

// Allow only logged-in admins
if (!isset($_SESSION['admin_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: intro.html");
    exit();
}
?>
