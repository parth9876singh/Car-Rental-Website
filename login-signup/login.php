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
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Validate inputs
    if (empty($email) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'Email and password are required']);
        exit();
    }
    
    // Get user from database using prepared statement
    $sql = "SELECT id, name, email, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        // Debug: Log password details
        error_log("Attempting login for email: " . $email);
        error_log("Input password length: " . strlen($password));
        error_log("Stored hash length: " . strlen($user['password']));
        
        // Verify password
        $passwordVerified = password_verify($password, $user['password']);
        error_log("Password verification result: " . ($passwordVerified ? "true" : "false"));
        error_log("Stored hash: " . $user['password']);
        
        if ($passwordVerified) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['name'];
            
            // Return success with redirect URL
            echo json_encode(['status' => 'success', 'redirect' => '/updatecar/index.php']);
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
            exit();
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No account found with this email']);
        exit();
    }
    
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Royal Cars</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .btn-hover {
            background-color: #dc2626;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-hover:hover {
            background-color: #b91c1c;
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="max-w-md mx-auto my-10 bg-white p-8 rounded-xl shadow-lg">
    <h2 class="text-2xl font-bold text-center mb-6">Login to Your Account</h2>
    <form id="loginForm" class="space-y-4">
        <div>
            <label for="loginEmail" class="block text-gray-700 mb-1">Email</label>
            <input type="email" id="loginEmail" name="email" required 
                   class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
        </div>
        <div>
            <label for="loginPassword" class="block text-gray-700 mb-1">Password</label>
            <input type="password" id="loginPassword" name="password" required 
                   class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-gray-700">Remember me</label>
            </div>
            <a href="#" id="showResetForm" class="text-sm text-red-600 hover:underline">Forgot password?</a>
        </div>
        <div>
            <button type="submit" class="w-full bg-red-600 text-white py-3 px-4 rounded-lg hover:bg-red-700 transition duration-300">
                Login
            </button>
        </div>
        <div class="text-center">
            <p class="text-gray-600">Don't have an account? <a href="signup.php" class="text-red-600 hover:underline">Sign up</a></p>
        </div>
    </form>
    <div id="loginMessage" class="mt-4 text-center"></div>

    <!-- Reset Password Form (hidden by default) -->
    <form id="resetForm" class="space-y-4 hidden">
        <div>
            <label for="resetEmail" class="block text-gray-700 mb-1">Email</label>
            <input type="email" id="resetEmail" name="email" required class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
        </div>
        <div>
            <label for="resetPassword" class="block text-gray-700 mb-1">New Password</label>
            <input type="password" id="resetPassword" name="password" required minlength="6" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
        </div>
        <div>
            <label for="resetConfirmPassword" class="block text-gray-700 mb-1">Confirm Password</label>
            <input type="password" id="resetConfirmPassword" name="confirm_password" required minlength="6" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
        </div>
        <div>
            <button type="submit" class="w-full py-3 px-4 rounded-lg btn-hover transition duration-300">Update Password</button>
        </div>
        <div class="text-center mt-4"><a href="#" id="backToLogin" class="text-red-600 hover:underline">Back to Login</a></div>
    </form>
</div>

<script>
// Toggle between login and reset forms
const loginForm = document.getElementById('loginForm');
const resetForm = document.getElementById('resetForm');
document.getElementById('showResetForm').addEventListener('click', function(e) {
    e.preventDefault();
    loginForm.classList.add('hidden');
    resetForm.classList.remove('hidden');
    document.getElementById('loginMessage').innerHTML = '';
});
document.getElementById('backToLogin').addEventListener('click', function(e) {
    e.preventDefault();
    resetForm.classList.add('hidden');
    loginForm.classList.remove('hidden');
    document.getElementById('loginMessage').innerHTML = '';
});

// Existing login AJAX remains unchanged
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const button = this.querySelector('button[type="submit"]');
    const messageDiv = document.getElementById('loginMessage');
    
    button.disabled = true;
    button.innerHTML = 'Logging In...';
    messageDiv.innerHTML = '';
    
    fetch(window.location.href, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            messageDiv.innerHTML = '<p class="text-green-600">Login successful! Redirecting...</p>';
            window.location.href = data.redirect;
        } else {
            messageDiv.innerHTML = `<p class="text-red-600">${data.message}</p>`;
            button.disabled = false;
            button.innerHTML = 'Login';
        }
    })
    .catch(error => {
        messageDiv.innerHTML = '<p class="text-red-600">An error occurred. Please try again.</p>';
        button.disabled = false;
        button.innerHTML = 'Login';
    });
});

// Reset password AJAX
resetForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(resetForm);
    const button = resetForm.querySelector('button[type="submit"]');
    const messageDiv = document.getElementById('loginMessage');
    button.disabled = true;
    button.innerHTML = 'Updating...';
    messageDiv.innerHTML = '';
    fetch('reset_password.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(html => {
        // Try to extract the message from the returned HTML
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;
        const msg = tempDiv.querySelector('.mb-4.text-center.text-red-600');
        if (msg) {
            messageDiv.innerHTML = msg.outerHTML;
        } else {
            messageDiv.innerHTML = '<p class="text-green-600">Password updated! <a href="#" id="backToLogin2" class="text-red-600 hover:underline">Back to Login</a></p>';
            // Optionally switch back to login form
        }
        button.disabled = false;
        button.innerHTML = 'Update Password';
    })
    .catch(error => {
        messageDiv.innerHTML = '<p class="text-red-600">An error occurred. Please try again.</p>';
        button.disabled = false;
        button.innerHTML = 'Update Password';
    });
});
// Allow going back to login from success message
// (delegated event in case of dynamic content)
document.addEventListener('click', function(e) {
    if (e.target && e.target.id === 'backToLogin2') {
        e.preventDefault();
        resetForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
        document.getElementById('loginMessage').innerHTML = '';
    }
});
</script>
</body>
</html>