<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Invalid email address.';
    } elseif (strlen($password) < 6) {
        $message = 'Password must be at least 6 characters.';
    } elseif ($password !== $confirm) {
        $message = 'Passwords do not match.';
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare('UPDATE users SET password = ? WHERE email = ?');
        $stmt->bind_param('ss', $hashed, $email);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $message = 'Password updated successfully! <a href="login.php" class="text-red-600 hover:underline">Login</a>';
        } else {
            $message = 'Email not found.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../assets/styles.css">
    <link rel="stylesheet" href="../css/animation.css">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            min-height: 100vh;
        }
        .container {
            animation: fadeIn 1s;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        }
        h2 {
            animation: slideInTop 0.8s;
            color: #b91c1c;
        }
        label {
            font-weight: 600;
        }
        input[type="email"], input[type="password"] {
            background: #f9fafb;
        }
        .btn-hover {
            background: #b91c1c;
            color: #fff;
            font-weight: 600;
            border: none;
        }
        .btn-hover:hover {
            background: #991b1b;
        }
        .text-red-600 {
            color: #b91c1c;
        }
        .rounded-lg {
            border-radius: 0.75rem;
        }
        .shadow {
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>
<div class="container mx-auto max-w-md p-8 mt-10 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Reset Password</h2>
    <?php if ($message) echo '<div class="mb-4 text-center text-red-600">' . $message . '</div>'; ?>
    <form method="POST" class="space-y-4">
        <div>
            <label for="email" class="block text-gray-700 mb-1">Email</label>
            <input type="email" id="email" name="email" required class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
        </div>
        <div>
            <label for="password" class="block text-gray-700 mb-1">New Password</label>
            <input type="password" id="password" name="password" required minlength="6" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
        </div>
        <div>
            <label for="confirm_password" class="block text-gray-700 mb-1">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required minlength="6" class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
        </div>
        <div>
            <button type="submit" class="w-full py-3 px-4 rounded-lg btn-hover transition duration-300">Update Password</button>
        </div>
    </form>
    <div class="text-center mt-4"><a href="login.php" class="text-red-600 hover:underline">Back to Login</a></div>
</div>
</body>
</html>
