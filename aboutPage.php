<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<body>

    <?php include 'header.php'; ?>
    <div class="w-full glass-bg relative h-[450px] flex flex-col justify-center items-center overflow-hidden">
        <h1 class="text-5xl font-bold uppercase text-white mb-6">About</h1>
        <div class="flex items-center text-white">
            <a href="index.php" class="uppercase font-medium text-white hover:text-gray-200 transition">Home</a>
            <span class="mx-3 text-gray-300">/</span>
            <span class="uppercase text-gray-300">About</span>
        </div>
    </div>


    <?php include 'about.php'; ?>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">What Our Clients Say</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Hear from customers who've experienced our premium
                    car rental service</p>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center space-x-1 text-yellow-400 mr-4">
                            <!-- Star Ratings -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="text-gray-800 font-semibold">5.0</span>
                        </div>
                        <span class="text-sm text-gray-500">2 days ago</span>
                    </div>
                    <p class="text-gray-600 mb-4">"The Scorpio N I rented was in perfect condition. The pickup process
                        was smooth and the team was very professional. Will definitely rent again!"</p>
                    <div class="flex items-center">
                        <img src="" alt="Client"
                            class="w-10 h-10 rounded-full mr-3 object-cover">
                        <div>
                            <h4 class="font-semibold text-gray-800">Rajesh Kumar</h4>
                            <p class="text-sm text-gray-500">Business Traveler</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center space-x-1 text-yellow-400 mr-4">
                            <!-- Star Ratings -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="text-gray-800 font-semibold">4.8</span>
                        </div>
                        <span class="text-sm text-gray-500">1 week ago</span>
                    </div>
                    <p class="text-gray-600 mb-4">"Great experience with the Innova Crysta. Perfect for our family road
                        trip. The unlimited kilometers option saved us money!"</p>
                    <div class="flex items-center">
                        <img src="" alt="Client"
                            class="w-10 h-10 rounded-full mr-3 object-cover">
                        <div>
                            <h4 class="font-semibold text-gray-800">Priya Sharma</h4>
                            <p class="text-sm text-gray-500">Family Vacation</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center space-x-1 text-yellow-400 mr-4">
                            <!-- Star Ratings -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="text-gray-800 font-semibold">5.0</span>
                        </div>
                        <span class="text-sm text-gray-500">3 weeks ago</span>
                    </div>
                    <p class="text-gray-600 mb-4">"Excellent service! The car was clean, well-maintained and the
                        delivery option to my hotel was super convenient for my business trip."</p>
                    <div class="flex items-center">
                        <img src="" alt="Client"
                            class="w-10 h-10 rounded-full mr-3 object-cover">
                        <div>
                            <h4 class="font-semibold text-gray-800">Amit Patel</h4>
                            <p class="text-sm text-gray-500">Corporate Client</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View More Button -->
            <div class="text-center mt-12">
                <a href="#"
                    class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300 font-medium">
                    View More Testimonials
                </a>
            </div>
        </div>
    </section>
    
    <?php include 'footer.php'; ?>


</body>

</html>