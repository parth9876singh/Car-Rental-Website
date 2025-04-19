<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    .team-carousel {
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
    }

    .team-item {
        scroll-snap-align: start;
        flex: 0 0 auto;
    }

    .team-social {
        transition: all 0.3s ease;
    }

    .carousel-nav-btn {
        transition: all 0.3s ease;
    }

    .carousel-nav-btn:hover {
        background-color: #b30000 !important;
        transform: scale(1.1);
    }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-12 px-4">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4 relative inline-block pb-4">
                Meet Our <span class="text-red-600">Expert Team</span>
                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-20 h-1 bg-red-600"></div>
            </h1>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Our dedicated professionals are here to provide you with the best car rental experience
            </p>
        </div>

        <!-- Carousel Container -->
        <div class="relative">
            <!-- Carousel Navigation Buttons -->
            <button id="prevBtn"
                class="carousel-nav-btn absolute left-0 top-1/2 transform -translate-y-1/2 z-10 w-12 h-12 bg-red-600 text-white rounded-full flex items-center justify-center shadow-lg">
                <i class="fas fa-angle-left text-xl"></i>
            </button>

            <button id="nextBtn"
                class="carousel-nav-btn absolute right-0 top-1/2 transform -translate-y-1/2 z-10 w-12 h-12 bg-red-600 text-white rounded-full flex items-center justify-center shadow-lg">
                <i class="fas fa-angle-right text-xl"></i>
            </button>

            <!-- Carousel Track -->
            <div id="carouselTrack"
                class="team-carousel flex overflow-x-auto snap-x snap-mandatory scrollbar-hide space-x-8 px-12 py-4">
                <!-- Team Member 1 -->
                <div
                    class="team-item w-72 flex-shrink-0 bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                    <img src="./img/team-1.jpg" alt="John Smith"
                        class="w-full h-70 object-cover border-b-4 border-red-600">
                    <div class="p-6 relative" style="min-height: 150px;">
                        <h3 class="text-xl font-bold text-gray-800 text-center">Your Name</h3>
                        <div
                            class="team-social flex justify-center space-x-3 absolute bottom-6 left-0 right-0 opacity-0">
                            <a href="#"
                                class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div
                    class="team-item w-72 flex-shrink-0 bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                    <img src="./img/team-2.jpg" alt="Sarah Johnson"
                        class="w-full h-70 object-cover border-b-4 border-red-600">
                    <div class="p-6 relative" style="min-height: 150px;">
                        <h3 class="text-xl font-bold text-gray-800 text-center">Your Name</h3>
                        <div
                            class="team-social flex justify-center space-x-3 absolute bottom-6 left-0 right-0 opacity-0">
                            <a href="#"
                                class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div
                    class="team-item w-72 flex-shrink-0 bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                    <img src="./img/team-3.jpg" alt="Michael Brown"
                        class="w-full h-70 object-cover border-b-4 border-red-600">
                    <div class="p-6 relative" style="min-height: 150px;">
                        <h3 class="text-xl font-bold text-gray-800 text-center">Your Name</h3>
                        <div
                            class="team-social flex justify-center space-x-3 absolute bottom-6 left-0 right-0 opacity-0">
                            <a href="#"
                                class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div
                    class="team-item w-72 flex-shrink-0 bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                    <img src="./img/team-4.jpg" alt="Emily Davis"
                        class="w-full h-70 object-cover border-b-4 border-red-600">
                    <div class="p-6 relative" style="min-height: 150px;">
                        <h3 class="text-xl font-bold text-gray-800 text-center">Your Name</h3>
                        <div
                            class="team-social flex justify-center space-x-3 absolute bottom-6 left-0 right-0 opacity-0">
                            <a href="#"
                                class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const carouselTrack = document.getElementById('carouselTrack');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const teamItems = document.querySelectorAll('.team-item');

        // Set up hover effects for team items
        teamItems.forEach(item => {
            item.addEventListener('mouseenter', () => {
                item.querySelector('.team-social').style.opacity = '1';
                item.querySelector('.team-social').style.bottom = '24px';
            });

            item.addEventListener('mouseleave', () => {
                item.querySelector('.team-social').style.opacity = '0';
                item.querySelector('.team-social').style.bottom = '0';
            });
        });

        // Carousel navigation
        prevBtn.addEventListener('click', () => {
            carouselTrack.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });

        nextBtn.addEventListener('click', () => {
            carouselTrack.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });

        // Responsive adjustments
        function handleResize() {
            const itemWidth = document.querySelector('.team-item').offsetWidth;
            const scrollAmount = window.innerWidth < 768 ? itemWidth : itemWidth * 2;

            prevBtn.onclick = () => {
                carouselTrack.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            };

            nextBtn.onclick = () => {
                carouselTrack.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            };
        }

        // Initialize and update on resize
        handleResize();
        window.addEventListener('resize', handleResize);
    });
    </script>
</body>

</html>