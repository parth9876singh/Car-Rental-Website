<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_db";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Check if columns exist
    $result = $conn->query("DESCRIBE booking_detail");
    $columns = [];
    while ($row = $result->fetch_assoc()) {
        $columns[] = $row['Field'];
    }
    
    // Add user_id column if it doesn't exist
    if (!in_array('user_id', $columns)) {
        $conn->query("ALTER TABLE booking_detail ADD COLUMN user_id INT(11) AFTER id");
        echo "Added user_id column<br>";
    }
    
    // Add payment_method column if it doesn't exist
    if (!in_array('payment_method', $columns)) {
        $conn->query("ALTER TABLE booking_detail ADD COLUMN payment_method VARCHAR(50) AFTER address");
        echo "Added payment_method column<br>";
    }
    
    // Add status column if it doesn't exist
    if (!in_array('status', $columns)) {
        $conn->query("ALTER TABLE booking_detail ADD COLUMN status VARCHAR(20) DEFAULT 'pending' AFTER payment_method");
        echo "Added status column<br>";
    }
    
    echo "Table structure updated successfully!";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
