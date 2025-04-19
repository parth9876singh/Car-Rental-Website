<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details - Drive2U</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="/updatecar/css/animation.css">
    <style>
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
        z-index: -10;
        opacity: 0.7;
        transition: opacity 0.3s ease;
    }

    .glass-bg:hover::before {
        opacity: 0.8;
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

    .car-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .car-card:hover {
        transform: translateY(-10px);
    }

    .car-image {
        transition: all 0.5s ease;
    }

    .car-card:hover .car-image {
        transform: scale(1.05);
    }

    .book-btn {
        transition: all 0.3s ease;
    }

    .book-btn:hover i {
        transform: translateX(5px);
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

<body class="page-transition">
    <?php include 'header.php'; ?>
    <div class="w-full glass-bg relative h-[450px] flex flex-col justify-center items-center overflow-hidden" data-aos="fade-down">
        <h1 class="text-5xl font-bold uppercase text-white mb-6 animate-fadeInUp">Booking Details</h1>
        <div class="flex items-center text-white animate-fadeInUp" style="animation-delay: 0.2s">
            <a href="index.php" class="uppercase font-medium text-white hover:text-gray-200 transition">Home</a>
            <span class="mx-3 text-gray-300">/</span>
            <span class="uppercase text-gray-300">Booking Details</span>
        </div>
    </div>
    <div class="container mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Car Grid Section -->
            <div class="w-full lg:w-2/3">
                <h2 class="text-3xl font-bold text-gray-800 mb-8" data-aos="fade-right">Available Cars</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                    <!-- Car Item 1 -->
                    <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col transform hover:-translate-y-2 hover:border hover:border-gray-100 group car-card" data-aos="fade-up" data-aos-delay="0">
                        <!-- Image with 3D hover -->
                        <div class="relative group">
                            <img class="w-full mb-6 rounded-lg h-48 object-cover transition-all duration-500 transform group-hover:scale-105 group-hover:shadow-xl group-hover:-translate-y-2 car-image"
                                src="img/scorpionimg.jpg" alt="Mahindra Scorpio N">
                            <div
                                class="absolute inset-0 rounded-lg bg-blue-100 opacity-0 group-hover:opacity-10 transition-opacity duration-300 pointer-events-none">
                            </div>
                        </div>

                        <h4
                            class="uppercase mb-6 font-bold text-xl text-center text-gray-800 group-hover:text-red-600 transition-colors">
                            Scorpio N</h4>

                        <!-- Car Details Grid - Animate icons on hover -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-calendar-alt text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Year: <strong>2024</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-car text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Type: <strong>SUV</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-cogs text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Transmission: <strong>Automatic</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-road text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Mileage: <strong>20km/l</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-users text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Seats: <strong>7</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-id-card text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">ID: <strong>101</strong></span>
                            </div>
                        </div>

                        <!-- Pricing Information - Animate on hover -->
                        <div
                            class="bg-gray-100 p-4 rounded-lg mb-6 transform group-hover:scale-[1.02] transition-transform">
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Price per km:</span>
                                <span class="font-semibold">₹15/km</span>
                            </div>
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Outstation (per day):</span>
                                <span class="font-semibold">₹2,500</span>
                            </div>
                            <div class="flex justify-between hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Daily rental:</span>
                                <span class="font-semibold text-red-600">₹1,499/day</span>
                            </div>
                        </div>

                        <!-- Enhanced Button -->
                        <div class="mt-auto text-center">
                            <a class="inline-block bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95 transform group-hover:-translate-y-1 book-btn"
                                href="carBookingPage.php">
                                Book Now <i
                                    class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col transform hover:-translate-y-2 hover:border hover:border-gray-100 group car-card" data-aos="fade-up" data-aos-delay="100">
                        <!-- Image with 3D hover -->
                        <div class="relative group">
                            <img class="w-full mb-6 rounded-lg h-48 object-cover transition-all duration-500 transform group-hover:scale-105 group-hover:shadow-xl group-hover:-translate-y-2 car-image"
                                src="img/swiftimg.png" alt="Mahindra Scorpio N">
                            <div
                                class="absolute inset-0 rounded-lg bg-blue-100 opacity-0 group-hover:opacity-10 transition-opacity duration-300 pointer-events-none">
                            </div>
                        </div>

                        <h4
                            class="uppercase mb-6 font-bold text-xl text-center text-gray-800 group-hover:text-red-600 transition-colors">
                            Swift Dzire</h4>

                        <!-- Car Details Grid - Animate icons on hover -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-calendar-alt text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Year: <strong>2024</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-car text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Type: <strong>SUV</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-cogs text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Transmission: <strong>Automatic</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-road text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Mileage: <strong>13km/l</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-users text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Seats: <strong>5</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-id-card text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">ID: <strong>102</strong></span>
                            </div>
                        </div>

                        <!-- Pricing Information - Animate on hover -->
                        <div
                            class="bg-gray-100 p-4 rounded-lg mb-6 transform group-hover:scale-[1.02] transition-transform">
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Price per km:</span>
                                <span class="font-semibold">₹11/km</span>
                            </div>
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Outstation (per day):</span>
                                <span class="font-semibold">₹2,200</span>
                            </div>
                            <div class="flex justify-between hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Daily rental:</span>
                                <span class="font-semibold text-red-600">₹1,299/day</span>
                            </div>
                        </div>

                        <!-- Enhanced Button -->
                        <div class="mt-auto text-center">
                            <a class="inline-block bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95 transform group-hover:-translate-y-1 book-btn"
                                href="carBookingPage.php">
                                Book Now <i
                                    class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col transform hover:-translate-y-2 hover:border hover:border-gray-100 group car-card" data-aos="fade-up" data-aos-delay="200">
                        <!-- Image with 3D hover -->
                        <div class="relative group">
                            <img class="w-full mb-6 rounded-lg h-48 object-cover transition-all duration-500 transform group-hover:scale-105 group-hover:shadow-xl group-hover:-translate-y-2 car-image"
                                src="img/brezzaimg.jpg" alt="Mahindra Scorpio N">
                            <div
                                class="absolute inset-0 rounded-lg bg-blue-100 opacity-0 group-hover:opacity-10 transition-opacity duration-300 pointer-events-none">
                            </div>
                        </div>

                        <h4
                            class="uppercase mb-6 font-bold text-xl text-center text-gray-800 group-hover:text-red-600 transition-colors">
                            Maaruti Breeza</h4>

                        <!-- Car Details Grid - Animate icons on hover -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-calendar-alt text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Year: <strong>2022</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-car text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Type: <strong>SUV</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-cogs text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Transmission: <strong>Automatic</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-road text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Mileage: <strong>18km/l</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-users text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Seats: <strong>5</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-id-card text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">ID: <strong>103</strong></span>
                            </div>
                        </div>

                        <!-- Pricing Information - Animate on hover -->
                        <div
                            class="bg-gray-100 p-4 rounded-lg mb-6 transform group-hover:scale-[1.02] transition-transform">
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Price per km:</span>
                                <span class="font-semibold">₹11/km</span>
                            </div>
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Outstation (per day):</span>
                                <span class="font-semibold">₹2,500</span>
                            </div>
                            <div class="flex justify-between hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Daily rental:</span>
                                <span class="font-semibold text-red-600">₹1,299/day</span>
                            </div>
                        </div>

                        <!-- Enhanced Button -->
                        <div class="mt-auto text-center">
                            <a class="inline-block bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95 transform group-hover:-translate-y-1 book-btn"
                                href="carBookingPage.php">
                                Book Now <i
                                    class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col transform hover:-translate-y-2 hover:border hover:border-gray-100 group car-card" data-aos="fade-up" data-aos-delay="300">
                        <!-- Image with 3D hover -->
                        <div class="relative group">
                            <img class="w-full mb-6 rounded-lg h-48 object-cover transition-all duration-500 transform group-hover:scale-105 group-hover:shadow-xl group-hover:-translate-y-2 car-image"
                                src="img/cretaimg.jpg" alt="Mahindra Scorpio N">
                            <div
                                class="absolute inset-0 rounded-lg bg-blue-100 opacity-0 group-hover:opacity-10 transition-opacity duration-300 pointer-events-none">
                            </div>
                        </div>

                        <h4
                            class="uppercase mb-6 font-bold text-xl text-center text-gray-800 group-hover:text-red-600 transition-colors">
                            Hyundi Creta</h4>

                        <!-- Car Details Grid - Animate icons on hover -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-calendar-alt text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Year: <strong>2024</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-car text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Type: <strong>SUV</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-cogs text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Transmission: <strong>Automatic</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-road text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Mileage: <strong>25km/l</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-users text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Seats: <strong>5</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-id-card text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">ID: <strong>104</strong></span>
                            </div>
                        </div>

                        <!-- Pricing Information - Animate on hover -->
                        <div
                            class="bg-gray-100 p-4 rounded-lg mb-6 transform group-hover:scale-[1.02] transition-transform">
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Price per km:</span>
                                <span class="font-semibold">₹11/km</span>
                            </div>
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Outstation (per day):</span>
                                <span class="font-semibold">₹2,100</span>
                            </div>
                            <div class="flex justify-between hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Daily rental:</span>
                                <span class="font-semibold text-red-600">₹1,199/day</span>
                            </div>
                        </div>

                        <!-- Enhanced Button -->
                        <div class="mt-auto text-center">
                            <a class="inline-block bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95 transform group-hover:-translate-y-1 book-btn"
                                href="carBookingPage.php">
                                Book Now <i
                                    class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col transform hover:-translate-y-2 hover:border hover:border-gray-100 group car-card" data-aos="fade-up" data-aos-delay="400">
                        <!-- Image with 3D hover -->
                        <div class="relative group">
                            <img class="w-full mb-6 rounded-lg h-48 object-cover transition-all duration-500 transform group-hover:scale-105 group-hover:shadow-xl group-hover:-translate-y-2 car-image"
                                src="img/boleroimg.avif" alt="Mahindra Scorpio N">
                            <div
                                class="absolute inset-0 rounded-lg bg-blue-100 opacity-0 group-hover:opacity-10 transition-opacity duration-300 pointer-events-none">
                            </div>
                        </div>

                        <h4
                            class="uppercase mb-6 font-bold text-xl text-center text-gray-800 group-hover:text-red-600 transition-colors">
                            Mahindra Bolero</h4>

                        <!-- Car Details Grid - Animate icons on hover -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-calendar-alt text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Year: <strong>2022</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-car text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Type: <strong>SUV</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-cogs text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Transmission: <strong>Automatic</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-road text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Mileage: <strong>14 km/l</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-users text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Seats: <strong>7</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-id-card text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">ID: <strong>105</strong></span>
                            </div>
                        </div>

                        <!-- Pricing Information - Animate on hover -->
                        <div
                            class="bg-gray-100 p-4 rounded-lg mb-6 transform group-hover:scale-[1.02] transition-transform">
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Price per km:</span>
                                <span class="font-semibold">₹11/km</span>
                            </div>
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Outstation (per day):</span>
                                <span class="font-semibold">₹1,800</span>
                            </div>
                            <div class="flex justify-between hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Daily rental:</span>
                                <span class="font-semibold text-red-600">₹999/day</span>
                            </div>
                        </div>

                        <!-- Enhanced Button -->
                        <div class="mt-auto text-center">
                            <a class="inline-block bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95 transform group-hover:-translate-y-1 book-btn"
                                href="carBookingPage.php">
                                Book Now <i
                                    class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col transform hover:-translate-y-2 hover:border hover:border-gray-100 group car-card" data-aos="fade-up" data-aos-delay="500">
                        <!-- Image with 3D hover -->
                        <div class="relative group">
                            <img class="w-full mb-6 rounded-lg h-48 object-cover transition-all duration-500 transform group-hover:scale-105 group-hover:shadow-xl group-hover:-translate-y-2 car-image"
                                src="img/waganorimg.webp" alt="Mahindra Scorpio N">
                            <div
                                class="absolute inset-0 rounded-lg bg-blue-100 opacity-0 group-hover:opacity-10 transition-opacity duration-300 pointer-events-none">
                            </div>
                        </div>

                        <h4
                            class="uppercase mb-6 font-bold text-xl text-center text-gray-800 group-hover:text-red-600 transition-colors">
                          Waganor</h4>

                        <!-- Car Details Grid - Animate icons on hover -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-calendar-alt text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Year: <strong>2022</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-car text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Type: <strong>SUV</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-cogs text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Transmission: <strong>Automatic</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-road text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Mileage: <strong>12 km/l</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-users text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Seats: <strong>5</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-id-card text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">ID: <strong>106</strong></span>
                            </div>
                        </div>

                        <!-- Pricing Information - Animate on hover -->
                        <div
                            class="bg-gray-100 p-4 rounded-lg mb-6 transform group-hover:scale-[1.02] transition-transform">
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Price per km:</span>
                                <span class="font-semibold">₹11/km</span>
                            </div>
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Outstation (per day):</span>
                                <span class="font-semibold">₹1,500</span>
                            </div>
                            <div class="flex justify-between hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Daily rental:</span>
                                <span class="font-semibold text-red-600">₹899/day</span>
                            </div>
                        </div>

                        <!-- Enhanced Button -->
                        <div class="mt-auto text-center">
                            <a class="inline-block bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95 transform group-hover:-translate-y-1 book-btn"
                                href="carBookingPage.php">
                                Book Now <i
                                    class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col transform hover:-translate-y-2 hover:border hover:border-gray-100 group car-card" data-aos="fade-up" data-aos-delay="600">
                        <!-- Image with 3D hover -->
                        <div class="relative group">
                            <img class="w-full mb-6 rounded-lg h-48 object-cover transition-all duration-500 transform group-hover:scale-105 group-hover:shadow-xl group-hover:-translate-y-2 car-image"
                                src="img/bikeimg.webp" alt="Mahindra Scorpio N">
                            <div
                                class="absolute inset-0 rounded-lg bg-blue-100 opacity-0 group-hover:opacity-10 transition-opacity duration-300 pointer-events-none">
                            </div>
                        </div>

                        <h4
                            class="uppercase mb-6 font-bold text-xl text-center text-gray-800 group-hover:text-red-600 transition-colors">
                            Royal Enfield</h4>

                        <!-- Car Details Grid - Animate icons on hover -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-calendar-alt text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Year: <strong>2024</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-car text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Type: <strong>Bike</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-cogs text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Transmission: <strong>Automatic</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-road text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Mileage: <strong>35 km/l</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-users text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Seats: <strong>2</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-id-card text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">ID: <strong>107</strong></span>
                            </div>
                        </div>

                        <!-- Pricing Information - Animate on hover -->
                        <div
                            class="bg-gray-100 p-4 rounded-lg mb-6 transform group-hover:scale-[1.02] transition-transform">
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Price per km:</span>
                                <span class="font-semibold">₹11/km</span>
                            </div>
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Outstation (per day):</span>
                                <span class="font-semibold">₹899</span>
                            </div>
                            <div class="flex justify-between hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Daily rental:</span>
                                <span class="font-semibold text-red-600">₹499/day</span>
                            </div>
                        </div>

                        <!-- Enhanced Button -->
                        <div class="mt-auto text-center">
                            <a class="inline-block bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95 transform group-hover:-translate-y-1 book-btn"
                                href="carBookingPage.php">
                                Book Now <i
                                    class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col transform hover:-translate-y-2 hover:border hover:border-gray-100 group car-card" data-aos="fade-up" data-aos-delay="700">
                        <!-- Image with 3D hover -->
                        <div class="relative group">
                            <img class="w-full mb-6 rounded-lg h-48 object-cover transition-all duration-500 transform group-hover:scale-105 group-hover:shadow-xl group-hover:-translate-y-2 car-image"
                                src="img/enovaimg.avif" alt="Mahindra Scorpio N">
                            <div
                                class="absolute inset-0 rounded-lg bg-blue-100 opacity-0 group-hover:opacity-10 transition-opacity duration-300 pointer-events-none">
                            </div>
                        </div>

                        <h4
                            class="uppercase mb-6 font-bold text-xl text-center text-gray-800 group-hover:text-red-600 transition-colors">
                            Innova Crysta</h4>

                        <!-- Car Details Grid - Animate icons on hover -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-calendar-alt text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Year: <strong>2022</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-car text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Type: <strong>SUV</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-cogs text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Transmission: <strong>Automatic</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-road text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Mileage: <strong>20 km/l</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-users text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">Seats: <strong>7</strong></span>
                            </div>
                            <div class="flex items-center hover:scale-105 transition-transform">
                                <i
                                    class="fas fa-id-card text-red-600 mr-2 group-hover:scale-110 transition-transform"></i>
                                <span class="text-gray-600">ID: <strong>108</strong></span>
                            </div>
                        </div>

                        <!-- Pricing Information - Animate on hover -->
                        <div
                            class="bg-gray-100 p-4 rounded-lg mb-6 transform group-hover:scale-[1.02] transition-transform">
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Price per km:</span>
                                <span class="font-semibold">₹15/km</span>
                            </div>
                            <div class="flex justify-between mb-2 hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Outstation (per day):</span>
                                <span class="font-semibold">₹2,700</span>
                            </div>
                            <div class="flex justify-between hover:text-red-600 transition-colors">
                                <span class="text-gray-700">Daily rental:</span>
                                <span class="font-semibold text-red-600">₹1,799/day</span>
                            </div>
                        </div>

                        <!-- Enhanced Button -->
                        <div class="mt-auto text-center">
                            <a class="inline-block bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95 transform group-hover:-translate-y-1 book-btn"
                                href="carBookingPage.php">
                                Book Now <i
                                    class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php include 'checkAvail.php'; ?>

        </div>
        </div>
        <?php include 'footer.php'; ?>

</body>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        offset: 50,
        once: true
    });
</script>
</html>