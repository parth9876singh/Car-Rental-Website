<?php
include_once 'includes/session.php';

// Check if user is logged in
if (!isLoggedIn()) {
    header("Location: /updatecar/login-signup/login.php");
    exit();
}

// Get current user
$currentUser = getCurrentUser();

// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed."]));
}

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["reserve"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $pickup = $_POST['pickup'];
    $date = $_POST['date'];
    $countperson = $_POST['countperson'];
    $address = $_POST['address'];
    $car_id = $_POST['car_id'];

    $sql = "INSERT INTO booking_detail (client_name, email, phone, pickup_location, date, person, address, car_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssisi", $name, $email, $mobile, $pickup, $date, $countperson, $address, $car_id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Your Booking is Confirm. Wait for confirmation Call"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
    }
    $stmt->close();
    $conn->close();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Car - Royal Cars</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    .alert {
        padding: 1rem;
        border-radius: 0.5rem;
        margin-top: 1rem;
    }

    .alert-success {
        background-color: #d1fae5;
        color: #065f46;
        border: 1px solid #34d399;
    }

    .alert-danger {
        background-color: #fee2e2;
        color: #b91c1c;
        border: 1px solid #f87171;
    }

    .glass-bg::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('./img/bg-banner.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        /* Creates parallax effect */
        z-index: -10;
        opacity: 0.7;
        /* filter: blur(4px); */
    }

    .glass-bg::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(22, 22, 21, 0.3);
        z-index: -5;
    }
    </style>
</head>

<body class="bg-white">
    <?php include 'header.php'; ?>
    <div class="w-full glass-bg relative h-[450px] flex flex-col justify-center items-center overflow-hidden">
        <h1 class="text-5xl font-bold uppercase text-white mb-6">Booking</h1>
        <div class="flex items-center text-white">
            <a href="index.php" class="uppercase font-medium text-white hover:text-gray-200 transition">Home</a>
            <span class="mx-3 text-gray-300">/</span>
            <span class="uppercase text-gray-300">About</span>
        </div>
    </div>

    <div class="w-full pb-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <form id="bookingForm" class="bg-white rounded-xl shadow-lg p-8 mt-8">
                <input type="hidden" name="reserve" value="1">
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Left Column - Client and Booking Details -->
                    <div class="w-full lg:w-2/3">
                        <!-- Client Details Section -->
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 section-heading pb-2">
                            Client Details
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label for="name" class="block text-gray-700 mb-2">Full Name</label>
                                <input type="text" id="name" name="name" required
                                    value="<?php echo htmlspecialchars($currentUser['name']); ?>"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 mb-2">Email Address</label>
                                <input type="email" id="email" name="email" required
                                    value="<?php echo htmlspecialchars($currentUser['email']); ?>"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
                            </div>
                            <div>
                                <label for="mobile" class="block text-gray-700 mb-2">Mobile Number</label>
                                <input type="tel" id="mobile" name="mobile" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
                            </div>
                            <div>
                                <label for="pickup" class="block text-gray-700 mb-2">Pickup Location</label>
                                <input type="text" id="pickup" name="pickup" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
                            </div>
                            <div>
                                <label for="car_id" class="block text-gray-700 mb-2">Car ID</label>
                                <select name="car_id" id="car_id" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500 bg-white text-gray-700">
                                    <option value="" selected disabled>Select Car ID</option>
                                    <option value="101">Car 101 - Scorpio N</option>
                                    <option value="102">Car 102 - Swift</option>
                                    <option value="103">Car 103 - Breeza</option>
                                    <option value="104">Car 104 - Creta</option>
                                    <option value="105">Car 105 - Bolero</option>
                                    <option value="106">Car 106 - Waganor</option>
                                    <option value="107">Car 107 - Royal Enfield</option>
                                    <option value="108">Car 108 - Innova</option>
                                </select>
                            </div>

                        </div>

                        <!-- Booking Details Section -->
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 section-heading pb-2">
                            Booking Details
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="date" class="block text-gray-700 mb-2">Date</label>
                                <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
                            </div>
                            <div>
                                <label for="countperson" class="block text-gray-700 mb-2">Number of Persons</label>
                                <input type="number" id="countperson" name="countperson" required min="1" max="8"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500">
                            </div>
                            <div class="md:col-span-2">
                                <label for="address" class="block text-gray-700 mb-2">Address</label>
                                <textarea id="address" name="address" rows="3" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="w-full lg:w-1/3">
                        <div class="bg-gradient-to-r from-red-600 to-red-700 p-6 rounded-xl">
                            <button type="submit"
                                class="w-full py-3 bg-white text-red-700 font-semibold rounded-full hover:bg-gray-100">
                                Reserve Now
                            </button>
                            <div id="message-container"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script>
    $(function() {
        $("#bookingForm").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: window.location.href,
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    let messageContainer = $("#message-container");
                    if (response.status === "success") {
                        messageContainer.html('<div class="alert alert-success">' + response
                            .message + '</div>');
                        $("#bookingForm")[0].reset();
                    } else {
                        messageContainer.html('<div class="alert alert-danger">' + response
                            .message + '</div>');
                    }
                },
                error: function() {
                    $("#message-container").html(
                        '<div class="alert alert-danger">Something went wrong!</div>');
                }
            });
        });
    });
    </script>
</body>

</html>