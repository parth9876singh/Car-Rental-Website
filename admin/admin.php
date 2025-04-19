<?php
session_start();

// Database Connection
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

// Authentication Check
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

// Handle Delete Action
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $stmt = $conn->prepare("DELETE FROM booking_detail WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    // Redirect to refresh the page
    header("Location: admin.php");
    exit();
}

// Fetch all bookings
$result = $conn->query("SELECT * FROM booking_detail ORDER BY date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Car Rental</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Sidebar -->
        <div class="bg-red-700 text-white w-64 fixed h-full">
            <div class="p-4 border-b border-red-800">
                <h1 class="text-2xl font-bold">Car Rental Admin</h1>
            </div>
            <nav class="p-4">
                <ul>
                    <li class="mb-2">
                        <a href="admin.php" class="block py-2 px-4 hover:bg-red-800 rounded-md">
                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="booking.php" class="block py-2 px-4 hover:bg-red-800 rounded-md">
                            <i class="fas fa-calendar-check mr-2"></i> Bookings
                        </a>
                    </li>
                    <li class="mt-8">
                        <a href="logout.php" class="block py-2 px-4 hover:bg-red-800 rounded-md">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="ml-64 p-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Booking Management</h2>
                    <div class="relative">
                        <input type="text" placeholder="Search bookings..." class="pl-10 pr-4 py-2 border rounded-lg">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>

                <!-- Bookings Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="py-3 px-4 text-left">ID</th>
                                <th class="py-3 px-4 text-left">Customer</th>
                                <th class="py-3 px-4 text-left">Contact</th>
                                <th class="py-3 px-4 text-left">Pickup</th>
                                <th class="py-3 px-4 text-left">Date</th>
                                <th class="py-3 px-4 text-left">Persons</th>
                                <th class="py-3 px-4 text-left">Address</th>
                                <th class="py-3 px-4 text-left">Car ID</th>
                                <th class="py-3 px-4 text-left">Status</th>
                                <th class="py-3 px-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="py-4 px-4"><?= htmlspecialchars($row['id']) ?></td>
                                <td class="py-4 px-4">
                                    <div class="font-medium"><?= htmlspecialchars($row['client_name']) ?></div>
                                    <div class="text-sm text-gray-500"><?= htmlspecialchars($row['email']) ?></div>
                                </td>
                                <td class="py-4 px-4"><?= htmlspecialchars($row['phone']) ?></td>
                                <td class="py-4 px-4"><?= htmlspecialchars($row['pickup_location']) ?></td>
                                <td class="py-4 px-4"><?= date('M j, Y', strtotime($row['date'])) ?></td>
                                <td class="py-4 px-4"><?= htmlspecialchars($row['person']) ?></td>
                                <td class="py-4 px-4"><?= htmlspecialchars($row['address']) ?></td>
                                <td class="py-4 px-4"><?= htmlspecialchars($row['car_id']) ?></td>
                                <td class="py-4 px-4 status-cell" data-id="<?= $row['id'] ?>">
                                    <?= isset($row['status']) ? htmlspecialchars($row['status']) : '' ?>
                                </td>
                                <td class="py-4 px-4">
                                    <?php if (!isset($row['status']) || $row['status'] !== 'confirmed'): ?>
                                        <button class="confirm-booking-btn bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded transition duration-200" data-id="<?= $row['id'] ?>">Confirm</button>
                                    <?php else: ?>
                                        <span class="text-green-700 font-semibold">Booking Confirmed</span>
                                    <?php endif; ?>
                                    <form method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                        <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    <div class="bg-red-50 p-6 rounded-lg border border-red-100">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-red-600">Total Bookings</p>
                                <p class="text-2xl font-bold text-gray-800 mt-1">
                                    <?php 
                                        $count = $conn->query("SELECT COUNT(*) as total FROM booking_detail")->fetch_assoc()['total'];
                                        echo $count;
                                    ?>
                                </p>
                            </div>
                            <div class="bg-red-100 p-3 rounded-full">
                                <i class="fas fa-calendar text-red-600"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-blue-600">Today's Bookings</p>
                                <p class="text-2xl font-bold text-gray-800 mt-1">
                                    <?php 
                                        $count = $conn->query("SELECT COUNT(*) as total FROM booking_detail WHERE DATE(date) = CURDATE()")->fetch_assoc()['total'];
                                        echo $count;
                                    ?>
                                </p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i class="fas fa-clock text-blue-600"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-yellow-50 p-6 rounded-lg border border-yellow-100">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-yellow-600">This Month</p>
                                <p class="text-2xl font-bold text-gray-800 mt-1">
                                    <?php 
                                        $count = $conn->query("SELECT COUNT(*) as total FROM booking_detail WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())")->fetch_assoc()['total'];
                                        echo $count;
                                    ?>
                                </p>
                            </div>
                            <div class="bg-yellow-100 p-3 rounded-full">
                                <i class="fas fa-calendar-alt text-yellow-600"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
document.querySelectorAll('.confirm-booking-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        if (confirm('Confirm this booking?')) {
            const bookingId = this.getAttribute('data-id');
            fetch('confirm_booking.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'booking_id=' + encodeURIComponent(bookingId)
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message);
                if (data.status === 'success') {
                    // Update status cell and button
                    const row = btn.closest('tr');
                    row.querySelector('.status-cell').innerHTML = 'confirmed';
                    btn.remove();
                    const td = document.createElement('span');
                    td.className = 'text-green-700 font-semibold';
                    td.innerText = 'Booking Confirmed';
                    row.querySelector('td:last-child').prepend(td);
                }
            });
        }
    });
});
</script>
</html>
<?php $conn->close(); ?>