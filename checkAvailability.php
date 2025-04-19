<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo '<div class="alert alert-danger">Database connection failed.</div>';
    exit;
}

// Get pickup date and car_id from the request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pickup_date']) && isset($_POST['car_id'])) {
    $pickup_date = $_POST['pickup_date'];
    $car_id = $_POST['car_id'];

    // Validate MM/DD/YYYY format
    if (!preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/\d{4}$/", $pickup_date)) {
        echo '<div class="alert alert-danger">Invalid date format. Please use MM/DD/YYYY.</div>';
        exit;
    }

    // Convert MM/DD/YYYY to YYYY-MM-DD for MySQL
    $date_parts = explode('/', $pickup_date);
    $formatted_date = $date_parts[2] . '-' . $date_parts[0] . '-' . $date_parts[1];

    // Check if the selected date is in the past
    $today = date('Y-m-d');
    if ($formatted_date < $today) {
        echo '<div class="alert alert-danger">Cannot check availability for past dates. Please select a future date.</div>';
        exit;
    }

    // Check if the specific car is booked for the given date
    $sql = "SELECT COUNT(*) AS is_booked FROM car_rentals WHERE car_id = ? AND pickup_date = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $car_id, $formatted_date);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $is_booked = $row['is_booked'] > 0;
    $stmt->close();
    $conn->close();

    // Check availability logic for specific car
    if ($is_booked) {
        echo '<div class="alert alert-danger">Car ID ' . htmlspecialchars($car_id) . ' is not available on ' . htmlspecialchars($pickup_date) . '. Please check another car.</div>';
    } else {
        echo '<div class="alert alert-success">Car ID ' . htmlspecialchars($car_id) . ' is available on ' . htmlspecialchars($pickup_date) . '.</div>';
    }
} else {
    echo '<div class="alert alert-danger">Please provide both car ID and pickup date.</div>';
}
?>