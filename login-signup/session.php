<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Optional: Refresh user data from database if needed
$user_id = $_SESSION['user_id'];
?>