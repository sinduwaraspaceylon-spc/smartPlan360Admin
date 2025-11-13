<?php
// Start session safely
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Optionally prevent session hijacking
ini_set('session.cookie_httponly', 1);
ini_set('session.use_strict_mode', 1);
ini_set('session.cookie_secure', isset($_SERVER['HTTPS']));
?>
