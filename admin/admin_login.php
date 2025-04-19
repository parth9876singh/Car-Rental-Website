<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Simple authentication (in production, use secure password hashing)
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-2xl font-bold text-center text-red-600 mb-6">Car Rental Admin</h1>
            
            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="username">Username</label>
                    <input type="text" id="username" name="username" 
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2" for="password">Password</label>
                    <input type="password" id="password" name="password" 
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>
                <button type="submit" 
                        class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition duration-200">
                    Login
                </button>
            </form>
        </div>
    </div>
</body>
</html>