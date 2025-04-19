<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Royal Cars</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="/updatecar/css/animation.css">
    <style>
    .service-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        border-left-color: #cc0000;
    }

    .service-icon {
        box-shadow: 0 5px 15px rgba(204, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .service-card:hover .service-icon {
        transform: rotate(360deg);
    }

    .service-image {
        transition: all 0.5s ease;
    }

    .service-card:hover .service-image {
        transform: scale(1.1);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    </style>
</head>

<body class="bg-gray-100 page-transition">
    <!-- Services Section -->
    <div class="py-16 px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-12" data-aos="fade-down">
                <h1 class="text-3xl md:text-4xl font-bold uppercase text-gray-800 relative inline-block pb-4">
                    Our<span class="text-red-600"> Services</span>
                    <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-20 h-1 bg-red-600"></span>
                </h1>
                <p class="text-gray-600 max-w-2xl mx-auto mt-6 text-lg animate-fadeInUp">
                    Premium car services tailored to your needs
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Service 1: Car Rental -->
                <div
                    class="service-card bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 p-6 border-l-4 border-transparent hover:border-blue-500 h-full flex flex-col group" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-full h-40 mb-4 overflow-hidden rounded-lg">
                        <img src="./img/rentpic.jpg" alt="Car Rental Service"
                            class="service-image w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-xl font-bold uppercase text-gray-800 mb-3">Car Rental</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                        Car rental services provide temporary access to vehicles for personal or business use. Customers can choose from various models, durations, and rental plans.
                        </p>
                    </div>
                    <a href="carDetailPage.php"
                        class="mt-auto text-blue-500 font-medium hover:text-blue-700 transition-colors duration-300 inline-flex items-center">
                        Book Now <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <!-- Service 2: Car Financing -->
                <div
                    class="service-card bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 p-6 border-l-4 border-transparent hover:border-blue-500 h-full flex flex-col group" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-full h-40 mb-4 overflow-hidden rounded-lg">
                        <img src="./img/finepic.webp" alt="Car Rental Service"
                            class="service-image w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-xl font-bold uppercase text-gray-800 mb-3">Car Finance</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                        Car finance allows individuals to purchase a vehicle by spreading the cost over time through loans or leasing options.
                        </p>
                    </div>
                    <a href="carDetailPage.php"
                        class="mt-auto text-blue-500 font-medium hover:text-blue-700 transition-colors duration-300 inline-flex items-center">
                        Book Now <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <!-- Service 3: Car Inspection -->
                <div
                    class="service-card bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 p-6 border-l-4 border-transparent hover:border-blue-500 h-full flex flex-col group" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-full h-40 mb-4 overflow-hidden rounded-lg">
                        <img src="./img/inspectpic.avif" alt="Car Rental Service"
                            class="service-image w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-xl font-bold uppercase text-gray-800 mb-3">Car Inspection</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                        Car inspection is a thorough check of a vehicle's condition, including its engine, brakes, lights, tires, and emissions.
                        </p>
                    </div>
                    <a href="carDetailPage.php"
                        class="mt-auto text-blue-500 font-medium hover:text-blue-700 transition-colors duration-300 inline-flex items-center">
                        Book Now <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <!-- Service 4: DoorStep Pickup -->
                <div
                    class="service-card bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 p-6 border-l-4 border-transparent hover:border-blue-500 h-full flex flex-col group" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-full h-40 mb-4 overflow-hidden rounded-lg">
                        <img src="./img/doorpic.jpg" alt="Car Rental Service"
                            class="service-image w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-xl font-bold uppercase text-gray-800 mb-3">Doorstep Pickup</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                        Doorstep pickup is a convenient service where items, such as vehicles or packages, are collected directly from a customer’s location. 
                        </p>
                    </div>
                    <a href="carDetailPage.php"
                        class="mt-auto text-blue-500 font-medium hover:text-blue-700 transition-colors duration-300 inline-flex items-center">
                        Book Now <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <!-- Service 5:Airport drop&Pickup  -->
                <div
                    class="service-card bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 p-6 border-l-4 border-transparent hover:border-blue-500 h-full flex flex-col group" data-aos="fade-up" data-aos-delay="500">
                    <div class="w-full h-40 mb-4 overflow-hidden rounded-lg">
                        <img src="./img/airportpic.jpg" alt="Car Rental Service"
                            class="service-image w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-xl font-bold uppercase text-gray-800 mb-3">Airport drop&Pickup</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                        Airport drop and pick-up services provide convenient transportation to and from the airport. These services ensure timely arrivals and departures
                        </p>
                    </div>
                    <a href="carDetailPage.php"
                        class="mt-auto text-blue-500 font-medium hover:text-blue-700 transition-colors duration-300 inline-flex items-center">
                        Book Now <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <!-- Service 6: Online booking -->
                <div
                    class="service-card bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 p-6 border-l-4 border-transparent hover:border-blue-500 h-full flex flex-col group" data-aos="fade-up" data-aos-delay="600">
                    <div class="w-full h-40 mb-4 overflow-hidden rounded-lg">
                        <img src="./img/caronlinepic.webp" alt="Car Rental Service"
                            class="service-image w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-xl font-bold uppercase text-gray-800 mb-3">Online Booking</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                        It offers convenience, instant confirmation, and flexibility, making planning and managing trips faster and easier.
                        </p>
                    </div>
                    <a href="carDetailPage.php"
                        class="mt-auto text-blue-500 font-medium hover:text-blue-700 transition-colors duration-300 inline-flex items-center">
                        Book Now <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>
</body>
</html>
