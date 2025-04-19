<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Not authorized']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['booking_id'])) {
    $booking_id = intval($_POST['booking_id']);
    $user_email = $_SESSION['user_email'];

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

    // Ensure only the user's own booking can be cancelled
    $sql = "DELETE FROM booking_detail WHERE id = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('is', $booking_id, $user_email);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo json_encode(['status' => 'success', 'message' => 'Booking cancelled successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Booking not found or not authorized']);
    }
    $stmt->close();
    $conn->close();
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
