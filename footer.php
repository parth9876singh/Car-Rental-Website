<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Section</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="/updatecar/css/animation.css">
</head>
<body>
    <!-- Main Footer -->
    <footer class="bg-gradient-to-r from-[#085162] from-[14.5%] to-[#c6e7f9] to-[135.4%] mt-24 py-12 px-4 sm:px-6 md:px-8 lg:px-10">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Contact Info -->
                <div class="mb-3" data-aos="fade-right" data-aos-delay="100">
                    <h4 class="text-xl font-semibold text-white uppercase mb-6">Get In Touch</h4>
                    <div class="space-y-3">
                        <p class="flex items-center text-gray-300 hover:translate-x-2 transition-transform">
                            <i class="fas fa-map-marker-alt text-white mr-3"></i>
                            Shankarpuri Colony, Sector 11, Indira Nagar, Lucknow
                        </p>
                        <p class="flex items-center text-gray-300 hover:translate-x-2 transition-transform">
                            <i class="fas fa-phone-alt text-white mr-3"></i>
                            +91 76190 85151
                        </p>
                        <p class="flex items-center text-gray-300 hover:translate-x-2 transition-transform">
                            <i class="fas fa-envelope text-white mr-3"></i>
                            info@example.com
                        </p>
                    </div>
                    <h6 class="text-white uppercase mt-6 mb-4">Follow Us</h6>
                    <div class="flex space-x-2">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-900 flex items-center justify-center text-white hover:bg-blue-400 transition-all hover:scale-110">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-900 flex items-center justify-center text-white hover:bg-blue-600 transition-all hover:scale-110">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-900 flex items-center justify-center text-white hover:bg-blue-700 transition-all hover:scale-110">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-900 flex items-center justify-center text-white hover:bg-pink-600 transition-all hover:scale-110">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <!-- Useful Links -->
                <div class="mb-8" data-aos="fade-right" data-aos-delay="200">
                    <h4 class="text-xl font-semibold text-white uppercase mb-6">Useful Links</h4>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="text-gray-300 hover:text-white hover:translate-x-2 transition-all inline-block">Home</a></li>
                        <li><a href="aboutPage.php" class="text-gray-300 hover:text-white hover:translate-x-2 transition-all inline-block">About</a></li>
                        <li><a href="contactPage.php" class="text-gray-300 hover:text-white hover:translate-x-2 transition-all inline-block">Contact</a></li>
                        <li><a href="carDetailPage.php" class="text-gray-300 hover:text-white hover:translate-x-2 transition-all inline-block">Booking Details</a></li>
                        <li><a href="./admin/admin.php" class="text-gray-300 hover:text-white hover:translate-x-2 transition-all inline-block">Admin</a></li>
                    </ul>
                </div>

                <!-- Car Gallery -->
                <div class="mb-8" data-aos="fade-right" data-aos-delay="300">
                    <h4 class="text-xl font-semibold text-white uppercase mb-6">Car Gallery</h4>
                    <div class="grid grid-cols-3 gap-1">
                        <a href="#">
                            <img class="w-full h-auto" src="img/gallery-1.jpg" alt="Car 1">
                        </a>
                        <a href="#">
                            <img class="w-full h-auto" src="img/gallery-2.jpg" alt="Car 2">
                        </a>
                        <a href="#">
                            <img class="w-full h-auto" src="img/gallery-3.jpg" alt="Car 3">
                        </a>
                        <a href="#">
                            <img class="w-full h-auto" src="img/gallery-4.jpg" alt="Car 4">
                        </a>
                        <a href="#">
                            <img class="w-full h-auto" src="img/gallery-5.jpg" alt="Car 5">
                        </a>
                        <a href="#">
                            <img class="w-full h-auto" src="img/gallery-6.jpg" alt="Car 6">
                        </a>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="mb-8" data-aos="fade-right" data-aos-delay="400">
                    <h4 class="text-xl font-semibold text-white uppercase mb-6">Newsletter</h4>
                    <p class="text-gray-300 mb-6">providing updates, news, promotions</p>
                    <div class="flex mb-4">
                        <input type="email" placeholder="Your Email" class="flex-grow px-4 py-3 bg-gray-900 text-white border-0 focus:outline-none focus:ring-2 focus:ring-red-600 transition-all hover:bg-gray-800">
                        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-3 uppercase font-medium transition-colors">
                            <a href="./login-signup/signup.php">Sign Up</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright Footer -->
    <div class="bg-black py-2 px-4 sm:px-6 md:px-8 lg:px-10">
        <div class="max-w-7xl mx-auto text-center text-gray-500">
            <p class="mb-2">&copy; <a href="#" class="hover:text-white transition-colors">Drive2U</a>. All Rights Reserved.</p>
        </div>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>
</html>