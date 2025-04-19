<?php
session_start();
// Optionally: Check if user is admin
// if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) { die('Not authorized'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['booking_id'])) {
    $booking_id = intval($_POST['booking_id']);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "car_rental_db";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
        exit();
    }
    $sql = "UPDATE booking_detail SET status = 'confirmed' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $booking_id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo json_encode(['status' => 'success', 'message' => 'Booking confirmed successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Booking not found or already confirmed']);
    }
    $stmt->close();
    $conn->close();
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
