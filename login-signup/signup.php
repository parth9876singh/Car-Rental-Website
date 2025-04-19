<?php
session_start();

// If already logged in, redirect to home
if (isset($_SESSION['user_id'])) {
    header("Location: /updatecar/index.php");
    exit();
}

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize input data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Validate inputs
    if (empty($name) || empty($email) || empty($_POST['password'])) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit();
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email format']);
        exit();
    }
    
    // Check if email already exists
    $check_email = "SELECT email FROM users WHERE email='$email'";
    $result = $conn->query($check_email);
    
    if ($result->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email already exists']);
        exit();
    }
    
    // Insert new user
    $sql = "INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        // Start session and set variables
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        echo json_encode(['status' => 'success', 'redirect' => '/updatecar/index.php']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error creating account. Please try again.']);
    }
    
    $conn->close();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Royal Cars</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="max-w-md mx-auto my-10 bg-white p-8 rounded-xl shadow-lg">
    <h2 class="text-2xl font-bold text-center mb-6">Create Account</h2>
    <form id="signupForm" class="space-y-4">
        <div>
            <label for="name" class="block text-gray-700 mb-1">Full Name</label>
            <input type="text" id="name" name="name" required 
                   class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
        </div>
        <div>
            <label for="email" class="block text-gray-700 mb-1">Email</label>
            <input type="email" id="email" name="email" required 
                   class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
        </div>
        <div>
            <label for="phone" class="block text-gray-700 mb-1">Phone Number</label>
            <input type="tel" id="phone" name="phone" 
                   class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
        </div>
        <div>
            <label for="password" class="block text-gray-700 mb-1">Password</label>
            <input type="password" id="password" name="password" required 
                   class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
        </div>
        <div>
            <button type="submit" class="w-full bg-red-600 text-white py-3 px-4 rounded-lg hover:bg-red-700 transition duration-300">
                Sign Up
            </button>
        </div>
        <div class="text-center">
            <p class="text-gray-600">Already have an account? <a href="login.php" class="text-red-600 hover:underline">Login</a></p>
        </div>
    </form>
    <div id="signupMessage" class="mt-4 text-center"></div>
</div>

<script>
document.getElementById('signupForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const button = this.querySelector('button[type="submit"]');
    const messageDiv = document.getElementById('signupMessage');
    
    button.disabled = true;
    button.innerHTML = 'Creating Account...';
    messageDiv.innerHTML = '';
    
    fetch(window.location.href, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            messageDiv.innerHTML = '<p class="text-green-600">Account created successfully! Redirecting...</p>';
            window.location.href = data.redirect;
        } else {
            messageDiv.innerHTML = `<p class="text-red-600">${data.message}</p>`;
            button.disabled = false;
            button.innerHTML = 'Sign Up';
        }
    })
    .catch(error => {
        messageDiv.innerHTML = '<p class="text-red-600">An error occurred. Please try again.</p>';
        button.disabled = false;
        button.innerHTML = 'Sign Up';
    });
});
</script>
</body>
</html>