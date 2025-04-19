<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete_sql = "DELETE FROM car_rentals WHERE id=$id";
    mysqli_query($conn, $delete_sql);
}

// Handle add/update
if (isset($_POST['save'])) {
    $pickup_date = $_POST['pickup_date'];
    $pickup_time = $_POST['pickup_time'];
    $car_id = $_POST['car_id'];

    if ($_POST['id'] == '') {
        $sql = "INSERT INTO car_rentals (pickup_date, pickup_time, car_id) VALUES ('$pickup_date', '$pickup_time', '$car_id')";
    } else {
        $id = $_POST['id'];
        $sql = "UPDATE car_rentals SET pickup_date='$pickup_date', pickup_time='$pickup_time', car_id='$car_id' WHERE id=$id";
    }
    mysqli_query($conn, $sql);
}

// Fetch all records
$result = mysqli_query($conn, "SELECT * FROM car_rentals");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#f59e0b',
                        danger: '#ef4444',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Sidebar Navigation -->
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
        <div class="ml-64">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center px-8 py-4">
                    <h2 class="text-2xl font-semibold text-gray-800">Booking Management</h2>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="User" class="w-8 h-8 rounded-full mr-2">
                            <span class="text-gray-700">Admin</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <main class="p-8">
                <!-- Form Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                    <div class="p-6 bg-gradient-to-r from-blue-600 to-blue-700">
                        <h3 class="text-xl font-semibold text-white"><?= isset($_POST['id']) ? 'Update Booking' : 'Create New Booking' ?></h3>
                    </div>
                    <form method="POST" action="" class="p-6">
                        <input type="hidden" name="id" id="id">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Booking Date</label>
                                <div class="relative">
                                    <i class="fas fa-calendar absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="date" name="pickup_date" id="pickup_date" class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                </div>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Pickup Time</label>
                                <div class="relative">
                                    <i class="fas fa-clock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="time" name="pickup_time" id="pickup_time" class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                </div>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Car ID</label>
                                <div class="relative">
                                    <i class="fas fa-car absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="number" name="car_id" id="car_id" class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" name="save" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition duration-200 flex items-center">
                                <i class="fas fa-save mr-2"></i> Save Booking
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Bookings Table -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-6 bg-gradient-to-r from-blue-600 to-blue-700">
                        <h3 class="text-xl font-semibold text-white">Current Bookings</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Time</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Car ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $row['id'] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $row['pickup_date'] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $row['pickup_time'] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $row['car_id'] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <button onclick="editRental(<?= $row['id'] ?>, '<?= $row['pickup_date'] ?>', '<?= $row['pickup_time'] ?>', <?= $row['car_id'] ?>)" 
                                                class="text-yellow-600 hover:text-yellow-900 mr-4 transition duration-200">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <a href="?delete=<?= $row['id'] ?>" 
                                           class="text-red-600 hover:text-red-900 transition duration-200"
                                           onclick="return confirm('Are you sure you want to delete this booking?')">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function editRental(id, pickup_date, pickup_time, car_id) {
            document.getElementById('id').value = id;
            document.getElementById('pickup_date').value = pickup_date;
            document.getElementById('pickup_time').value = pickup_time;
            document.getElementById('car_id').value = car_id;
            window.scrollTo({ top: 0, behavior: 'smooth' });
            
            // Add animation to form card
            const formCard = document.querySelector('.bg-white.rounded-xl');
            formCard.classList.add('animate-pulse');
            setTimeout(() => {
                formCard.classList.remove('animate-pulse');
            }, 1000);
        }
    </script>
</body>
</html>