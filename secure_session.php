<?php
// secure_session.php

if (session_status() === PHP_SESSION_NONE) {
    session_start([
        'cookie_lifetime' => 0,
        'cookie_secure' => false, // set true if using HTTPS
        'cookie_httponly' => true,
        'use_strict_mode' => true,
        'use_only_cookies' => true
    ]);
}

// Only check timeout if user is logged in
if (isset($_SESSION['admin_id']) || isset($_SESSION['student_id'])) {

    // Regenerate session ID once per login
    if (!isset($_SESSION['regenerated'])) {
        session_regenerate_id(true);
        $_SESSION['regenerated'] = true;
    }

    // Auto logout after inactivity
    $inactive = 900; // 15 minutes, adjust as needed
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $inactive) {
        // Clear session
        $_SESSION = [];
        session_unset();
        session_destroy();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        header("Location: intro.html?session=expired");
        exit();
    }

    $_SESSION['last_activity'] = time();
}
?>
