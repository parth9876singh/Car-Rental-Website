<?php
session_start();
// Optionally: Check if user is admin
// if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) { die('Not authorized'); }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, client_name, email, phone, pickup_location, date, person, address, payment_method, car_id, status FROM booking_detail ORDER BY date DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - All Bookings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="max-w-6xl mx-auto my-12 bg-white p-8 rounded-xl shadow-lg">
    <h2 class="text-2xl font-bold text-center mb-8 text-blue-700">All Bookings (Admin)</h2>
    <?php if ($result->num_rows > 0): ?>
        <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Client Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pickup Location</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Persons</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Address</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payment</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Car ID</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700"><?php echo htmlspecialchars($row['date']); ?></td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700"><?php echo htmlspecialchars($row['client_name']); ?></td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700"><?php echo htmlspecialchars($row['email']); ?></td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700"><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700"><?php echo htmlspecialchars($row['pickup_location']); ?></td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700"><?php echo htmlspecialchars($row['person']); ?></td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700"><?php echo htmlspecialchars($row['address']); ?></td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700"><?php echo htmlspecialchars($row['payment_method']); ?></td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700"><?php echo htmlspecialchars($row['car_id']); ?></td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700 status-cell" data-id="<?php echo $row['id']; ?>">
                        <?php echo htmlspecialchars($row['status']); ?>
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap">
                        <?php if ($row['status'] !== 'confirmed'): ?>
                            <button class="confirm-booking-btn bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded transition duration-200" data-id="<?php echo $row['id']; ?>">Confirm</button>
                        <?php else: ?>
                            <span class="text-green-700 font-semibold">Confirmed</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-600">No bookings found.</p>
    <?php endif; ?>
    <div class="mt-8 text-center">
        <a href="index.php" class="text-blue-600 hover:underline">Back to Home</a>
    </div>
</div>
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
                    td.innerText = 'Confirmed';
                    row.querySelector('td:last-child').appendChild(td);
                }
            });
        }
    });
});
</script>
</body>
</html>
