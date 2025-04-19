<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all users
$sql = "SELECT id, email, password FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "User ID: " . $row['id'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Password Hash Length: " . strlen($row['password']) . "<br>";
        echo "Password Hash: " . $row['password'] . "<br><br>";
    }
} else {
    echo "No users found";
}

$conn->close();
?>
