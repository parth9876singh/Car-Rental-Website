<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login-signup/login.php');
    exit();
}
$user_id = $_SESSION['user_id'];
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, client_name, email, phone, pickup_location, date, person, address, payment_method, car_id, status FROM booking_detail WHERE email = ? ORDER BY date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $user_email);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Previous Bookings | DriveEasy Rentals</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            600: '#dc2626',
                            700: '#b91c1c',
                            900: '#7f1d1d',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <a href="index.php" class="flex items-center">
                <i class="fas fa-car text-primary-600 text-2xl mr-2"></i>
                <span class="text-xl font-bold text-primary-700">Drive2U Rentals</span>
            </a>
            <div class="flex items-center space-x-4">
                <a href="index.php" class="text-gray-600 hover:text-primary-600 transition">
                    <i class="fas fa-home mr-1"></i> Home
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">My Bookings</h1>
                <p class="text-gray-500 mt-2">View and manage your rental history</p>
            </div>
            <a href="carDetailPage.php" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                <i class="fas fa-plus mr-2"></i> New Booking
            </a>
        </div>

        <!-- Bookings Table -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <?php if ($result->num_rows > 0): ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Details</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Car</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <!-- <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php while ($row = $result->fetch_assoc()): ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        <?php echo date('M j, Y', strtotime($row['date'])); ?>
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        <?php echo date('g:i A', strtotime($row['date'])); ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($row['client_name']); ?></div>
                                    <div class="text-sm text-gray-500">
                                        <i class="fas fa-map-marker-alt mr-1 text-primary-600"></i> <?php echo htmlspecialchars($row['pickup_location']); ?>
                                    </div>
                                    <div class="text-sm text-gray-500 mt-1">
                                        <i class="fas fa-users mr-1 text-primary-600"></i> <?php echo htmlspecialchars($row['person']); ?> persons
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-primary-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-car text-primary-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Car #<?php echo htmlspecialchars($row['car_id']); ?></div>
                                            <div class="text-sm text-gray-500">
                                                <i class="fas fa-credit-card mr-1"></i> <?php echo htmlspecialchars($row['payment_method']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if ($row['status'] === 'confirmed'): ?>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i> Confirmed
                                        </span>
                                    <?php else: ?>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-clock mr-1"></i> Pending
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <?php if ($row['status'] !== 'confirmed'): ?>
                                        <button class="cancel-booking-btn text-red-600 hover:text-red-900 transition mr-4" data-id="<?php echo $row['id']; ?>">
                                            <i class="fas fa-times-circle mr-1"></i> Cancel
                                        </button>
                                    <?php endif; ?>
                                    <!-- <button class="view-details-btn text-primary-600 hover:text-primary-900 transition" data-id="<?php echo $row['id']; ?>">
                                        <i class="fas fa-eye mr-1"></i> Details
                                    </button> -->
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-gray-100">
                        <i class="fas fa-calendar-alt text-gray-400"></i>
                    </div>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">No bookings found</h3>
                    <p class="mt-1 text-sm text-gray-500">You haven't made any bookings yet.</p>
                    <div class="mt-6">
                        <a href="index.php" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                            <i class="fas fa-car mr-2"></i> Rent a car now
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white mt-12 border-t border-gray-200">
        <div class="max-w-7xl mx-auto py-6 px-4 overflow-hidden sm:px-6 lg:px-8">
            <p class="text-center text-base text-gray-500">
                &copy; <?php echo date('Y'); ?> DriveEasy Rentals. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- Toast Notification (hidden by default) -->
    <div id="toast" class="fixed bottom-4 right-4 hidden">
        <div class="bg-green-500 text-white px-4 py-2 rounded-md shadow-lg flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            <span id="toast-message">Operation successful</span>
        </div>
    </div>

    <script>
    document.querySelectorAll('.cancel-booking-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            if (confirm('Are you sure you want to cancel this booking?')) {
                const bookingId = this.getAttribute('data-id');
                fetch('cancel_booking.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'booking_id=' + encodeURIComponent(bookingId)
                })
                .then(res => res.json())
                .then(data => {
                    showToast(data.message);
                    if (data.status === 'success') {
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                });
            }
        });
    });

    document.querySelectorAll('.view-details-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const bookingId = this.getAttribute('data-id');
            // You can implement a modal or redirect to a details page
            alert('Viewing details for booking ID: ' + bookingId);
        });
    });

    function showToast(message) {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toast-message');
        
        toastMessage.textContent = message;
        toast.classList.remove('hidden');
        
        setTimeout(() => {
            toast.classList.add('hidden');
        }, 3000);
    }
    </script>
</body>
</html>