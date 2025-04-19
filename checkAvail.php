<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Car Availability</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
    <style>
        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
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
    </style>
</head>
<body>
    <!-- Check Availability Section -->
    <div class="w-full lg:w-1/3">
        <div class="sticky top-8">
            <div class="p-6 rounded-[30px] bg-gradient-to-br from-blue-500 to-blue-500 shadow-lg">
                <h3 class="text-white text-center text-2xl font-bold mb-6">Check Availability</h3>
                <div id="message-container" class="mb-4"></div>
                <form id="availabilityForm">
                    <!-- Car ID selection field -->
                    <div class="mb-6">
                        <select name="car_id" id="car_id" required
                            class="w-full p-4 border-0 rounded-lg focus:ring-2 focus:ring-white focus:ring-opacity-50 bg-white bg-opacity-90 text-gray-600">
                            <option value="" selected disabled>Select Car ID</option>
                            <option value="101">Car 101 -Scorpio N </option>
                            <option value="102">Car 102 -Swift</option>
                            <option value="103">Car 103 -Breeza</option>
                            <option value="104">Car 104 -Creta </option>
                            <option value="104">Car 105 -Bolero</option>
                            <option value="104">Car 106 -Waganor</option>
                            <option value="104">Car 107 -Royal Enfield</option>
                            <option value="104">Car 108 -Innova</option>
                        </select>
                    </div>

                    <!-- Date picker field -->
                    <div class="mb-6">
                        <div class="date">
                            <input type="text" name="pickup_date" id="pickup_date"
                                class="w-full p-4 border-0 rounded-lg focus:ring-2 focus:ring-white focus:ring-opacity-50 bg-white bg-opacity-90 placeholder-gray-600"
                                placeholder="Pickup Date (MM/DD/YYYY)" required />
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-white hover:bg-opacity-90 text-blue-600 font-bold py-3 px-4 rounded-lg transition duration-200 shadow-md">
                            Check Availability
                        </button>
                    </div>
                </form>
            </div>

            <!-- Additional Info Card -->
            <div class="mt-8 bg-white p-6 rounded-xl shadow-md">
                <h4 class="text-xl font-bold text-gray-800 mb-4">Why Choose Us?</h4>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-blue-600 mt-1 mr-2"></i>
                        <span class="text-gray-700">24/7 Customer Support</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-blue-600 mt-1 mr-2"></i>
                        <span class="text-gray-700">No Hidden Fees</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-blue-600 mt-1 mr-2"></i>
                        <span class="text-gray-700">Free Cancellation</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <script>
    $(function() {
        // Initialize datetimepicker
        $('#pickup_date').datetimepicker({
            format: 'm/d/Y',
            timepicker: false,
            minDate: 0 // Disable past dates
        });

        // Handle form submission
        $("#availabilityForm").on("submit", function(e) {
            e.preventDefault();

            let pickupDate = $("#pickup_date").val();
            let carId = $("#car_id").val();

            if (!pickupDate) {
                $("#message-container").html('<div class="alert alert-danger">Please select a date</div>');
                return false;
            }

            if (!carId) {
                $("#message-container").html('<div class="alert alert-danger">Please select a car</div>');
                return false;
            }

            $.ajax({
                url: "checkAvailability.php",
                type: "POST",
                data: {
                    pickup_date: pickupDate,
                    car_id: carId
                },
                success: function(response) {
                    $("#message-container").html(response);
                },
                error: function(xhr, status, error) {
                    $("#message-container").html(
                        '<div class="alert alert-danger">Error: ' + error + '</div>'
                    );
                }
            });
        });
    });
    </script>
</body>
</html>