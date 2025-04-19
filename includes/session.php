<?php
session_start();

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Function to require login for protected pages
function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: /updatecar/login-signup/login.php");
        exit();
    }
}

// Function to get current user data
function getCurrentUser() {
    if (isLoggedIn()) {
        return [
            'id' => $_SESSION['user_id'],
            'name' => $_SESSION['user_name'],
            'email' => $_SESSION['user_email']
        ];
    }
    return null;
}
?>
