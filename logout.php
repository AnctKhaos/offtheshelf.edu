<?php
include 'secure_session.php'; // starts session if not started

// Clear all session variables
$_SESSION = [];
session_unset();
session_destroy();

// Delete session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Prevent browser from caching pages (so back button won't show dashboard)
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

// Redirect to intro.html
header("Location: intro.html");
exit();
?>
