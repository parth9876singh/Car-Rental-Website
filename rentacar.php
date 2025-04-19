<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Dream Car</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    .rent-item {
        transition: all 0.3s ease;
    }

    .rent-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .car-image {
        transition: transform 0.5s ease;
    }

    .car-image:hover {
        transform: scale(1.03);
    }

    .rent-button {
        transition: all 0.3s;
    }

    .rent-button:hover {
        background-color: #b30000;
        transform: scale(1.05);
    }

    .popular-badge {
        position: absolute;
        top: 15px;
        right: 15px;
    }
    </style>
</head>

<body class="bg-gray-100">
    <div class="w-full py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto pt-12 pb-8 px-4">
            <!-- Heading Section -->
            <div class="text-center mb-12">
                <h1
                    class="text-4xl md:text-5xl font-bold uppercase text-center mb-6 relative inline-block pb-4 text-gray-800">
                    Find Your <span class="text-red-600">Dream Car</span>
                </h1>
                <div class="w-24 h-1 bg-red-600 mx-auto mb-8"></div>
            </div>

            <!-- Cars Grid -->
            <div class="bg-gray-50 py-12">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Cars</h2>

                    <!-- Carousel Container -->
                    <div class="relative">
                        <!-- Carousel Items -->
                        <div class="flex overflow-x-auto pb-6 -mx-4 px-4 snap-x snap-mandatory scrollbar-hide">
                            <!-- Car Item 1 -->
                            <div
                                class="flex-shrink-0 w-72 mx-3 snap-start bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border hover:border-blue-100">
                                <div class="p-5 h-full flex flex-col">
                                    <div
                                        class="relative h-40 mb-4 overflow-hidden rounded-lg bg-gradient-to-br from-gray-50 to-gray-100">
                                        <img class="w-full h-full object-contain transition-transform duration-500 hover:scale-110"
                                            src="img/enovaimg.avif" alt="Mercedes Benz R3">
                                    </div>

                                    <h4
                                        class="uppercase text-lg font-extrabold text-gray-800 mb-3 text-center tracking-tight">
                                        Innova Crysta</h4>

                                    <div class="mt-auto">
                                        <h4 class="mb-3 text-center font-medium text-gray-600 text-sm">For more details
                                        </h4>
                                        <a class="block w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-center py-2.5 px-4 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95"
                                            href="carDetailPage.php">
                                            Click here
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Car Item 2 -->
                            <div
                                class="flex-shrink-0 w-72 mx-3 snap-start bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border hover:border-blue-100">
                                <div class="p-5 h-full flex flex-col">
                                    <div
                                        class="relative h-40 mb-4 overflow-hidden rounded-lg bg-gradient-to-br from-gray-50 to-gray-100">
                                        <img class="w-full h-full object-contain transition-transform duration-500 hover:scale-110"
                                            src="img/scorpionimg.jpg" alt="Mercedes Benz R3">
                        </div>

                                    <h4
                                        class="uppercase text-lg font-extrabold text-gray-800 mb-3 text-center tracking-tight">
                                       Scorpio N</h4>

                                    <div class="mt-auto">
                                        <h4 class="mb-3 text-center font-medium text-gray-600 text-sm">For more details
                                        </h4>
                                        <a class="block w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-center py-2.5 px-4 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95"
                                            href="carDetailPage.php">
                                            Click here
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Car Item 3 -->
                            <div
                                class="flex-shrink-0 w-72 mx-3 snap-start bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border hover:border-blue-100">
                                <div class="p-5 h-full flex flex-col">
                                    <div
                                        class="relative h-40 mb-4 overflow-hidden rounded-lg bg-gradient-to-br from-gray-50 to-gray-100">
                                        <img class="w-full h-full object-contain transition-transform duration-500 hover:scale-110"
                                            src="img/bikeimg.webp" alt="Mercedes Benz R3">
                                    </div>

                                    <h4
                                        class="uppercase text-lg font-extrabold text-gray-800 mb-3 text-center tracking-tight">
                                        Royal Enfield </h4>

                                    <div class="mt-auto">
                                        <h4 class="mb-3 text-center font-medium text-gray-600 text-sm">For more details
                                        </h4>
                                        <a class="block w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-center py-2.5 px-4 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95"
                                            href="carDetailPage.php">
                                            Click here
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Car Item 4 -->
                            <div
                                class="flex-shrink-0 w-72 mx-3 snap-start bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border hover:border-blue-100">
                                <div class="p-5 h-full flex flex-col">
                                    <div
                                        class="relative h-40 mb-4 overflow-hidden rounded-lg bg-gradient-to-br from-gray-50 to-gray-100">
                                        <img class="w-full h-full object-contain transition-transform duration-500 hover:scale-110"
                                            src="img/cretaimg.jpg" alt="Mercedes Benz R3">
                                    </div>

                                    <h4
                                        class="uppercase text-lg font-extrabold text-gray-800 mb-3 text-center tracking-tight">
                                        Creta</h4>

                                    <div class="mt-auto">
                                        <h4 class="mb-3 text-center font-medium text-gray-600 text-sm">For more details
                                        </h4>
                                        <a class="block w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-center py-2.5 px-4 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95"
                                            href="carDetailPage.php">
                                            Click here
                                        </a>
                                    </div>
                                </div>
                            </div>

                        <!-- Navigation Arrows (Optional) -->
                        <button
                            class="hidden md:block absolute left-0 top-1/2 -translate-y-1/2 -ml-4 p-2 rounded-full bg-white shadow-md hover:bg-gray-100 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button
                            class="hidden md:block absolute right-0 top-1/2 -translate-y-1/2 -mr-4 p-2 rounded-full bg-white shadow-md hover:bg-gray-100 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // You can add any JavaScript functionality here if needed
        document.addEventListener('DOMContentLoaded', function() {
        // JavaScript for any additional interactivity
        });
    </script>
</body>
</html>