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

// Check if users table exists
$tableCheck = $conn->query("SHOW TABLES LIKE 'users'");
if ($tableCheck->num_rows == 0) {
    // Create users table with proper structure
    $createTable = "CREATE TABLE users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        phone VARCHAR(20),
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($createTable) === TRUE) {
        echo "Users table created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
} else {
    // Check table structure
    $result = $conn->query("DESCRIBE users");
    $needsUpdate = false;
    $passwordColumnCorrect = false;
    
    while ($row = $result->fetch_assoc()) {
        if ($row['Field'] == 'password') {
            if ($row['Type'] != 'varchar(255)') {
                $needsUpdate = true;
            } else {
                $passwordColumnCorrect = true;
            }
        }
    }
    
    if (!$passwordColumnCorrect) {
        $needsUpdate = true;
    }
    
    if ($needsUpdate) {
        // Backup existing users
        $backupUsers = $conn->query("SELECT * FROM users");
        $users = [];
        while ($row = $backupUsers->fetch_assoc()) {
            $users[] = $row;
        }
        
        // Drop and recreate table
        $conn->query("DROP TABLE users");
        $createTable = "CREATE TABLE users (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            phone VARCHAR(20),
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        
        if ($conn->query($createTable) === TRUE) {
            echo "Users table structure updated successfully<br>";
            
            // Restore users with properly hashed passwords
            foreach ($users as $user) {
                // Only insert if we have all required fields
                if (!empty($user['name']) && !empty($user['email']) && !empty($user['password'])) {
                    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
                    // Re-hash the password if it's not already a valid hash
                    $password = (strlen($user['password']) < 60) ? password_hash($user['password'], PASSWORD_DEFAULT) : $user['password'];
                    $stmt->bind_param("ssss", $user['name'], $user['email'], $user['phone'], $password);
                    $stmt->execute();
                    $stmt->close();
                }
            }
            echo "User data restored with proper password hashing<br>";
        } else {
            echo "Error updating table: " . $conn->error . "<br>";
        }
    } else {
        echo "Users table structure is correct<br>";
    }
}

// Display current users for verification
echo "<br>Current users in database:<br>";
$users = $conn->query("SELECT id, email, LENGTH(password) as pass_length FROM users");
if ($users->num_rows > 0) {
    while ($user = $users->fetch_assoc()) {
        echo "ID: " . $user['id'] . ", Email: " . $user['email'] . ", Password Hash Length: " . $user['pass_length'] . "<br>";
    }
} else {
    echo "No users found in database<br>";
}

$conn->close();
?>
