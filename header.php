<?php 
include_once 'includes/session.php';
$currentUser = getCurrentUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Cars</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="/updatecar/css/animation.css">
    <style>
    /* Custom styles for dropdown */
    .dropdown-menu {
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        overflow: hidden;
    }


    .dropdown-item {
        padding: 12px 16px;
        transition: all 0.3s ease;

    }

    /* Mobile menu styles */
    #mobileMenu {
        display: none;
        position: fixed;
        top: 80px;
        left: 0;
        right: 0;
        background-color: white;
        padding: 1rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        z-index: 50;
    }

    #mobileMenu.open {
        display: block;
    }

    /* Mobile dropdown styles */
    .mobile-dropdown-content {
        display: none;
        padding-left: 1rem;
    }

    .mobile-dropdown-content.open {
        display: block;
    }
    </style>
</head>

<body>
    <!-- Top Info Bar -->
    <div class="bg-gradient-to-r from-[#085162] from-[14.5%] to-[#c6e7f9] to-[135.4%] py-3 px-4 lg:px-8 hidden lg:block page-transition"
        data-aos="fade-down">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center space-x-4 mb-2 md:mb-0">
                <a href="" class="text-white font-bold hover:text-white transition flex items-center">
                    <i class="fas fa-phone-alt mr-2"></i> +91 7619085151
                </a>
                <span class="text-gray-500">|</span>
                <a href="" class="text-white font-bold hover:text-white transition flex items-center">
                    <i class="fas fa-envelope mr-2"></i> info@example.com
                </a>
            </div>
            <div class="flex items-center space-x-4">
                <?php if ($currentUser): ?>
                <span class="text-black font-bold text-2xl">Welcome,
                    <?php echo htmlspecialchars($currentUser['name']); ?></span>
                <a href="/updatecar/login-signup/logout.php"
                    class="text-white font-bold hover:text-black transition">Logout</a>
                <?php else: ?>
                <a href="/updatecar/login-signup/login.php"
                    class="text-white font-bold hover:text-black transition">Login</a>
                <span class="text-gray-500">|</span>
                <a href="/updatecar/login-signup/signup.php"
                    class="text-white font-bold hover:text-black transition">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    <div class="relative shadow-md ">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <nav class="bg-[radial-gradient(circle_331px_at_1.4%_52.9%,_rgba(255,236,2,1)_0%,_rgba(255,223,2,1)_33.6%,_rgba(255,187,29,1)_61%,_rgba(255,175,7,1)_100.7%)] rounded-full shadow-lg py-3 px-6 my-2"
                data-aos="fade-up">
                <div class="flex justify-between items-center">
                    <!-- Logo -->
                    <a href="index.php" class="text-4xl font-bold text-gray-900">Drive2U</a>

                    <!-- Desktop Menu -->
                    <div class="hidden lg:flex items-center space-x-6">
                        <a href="index.php" class="text-gray-900 font-bold hover:text-white transition text-lg">Home</a>
                        <a href="aboutPage.php"
                            class="text-gray-900 font-bold hover:text-white transition text-lg">About</a>

                        <!-- Cars Dropdown -->
                        <div class="dropdown relative">
                            <button id="dropdownButton"
                                class="text-gray-900 font-bold hover:text-white transition flex items-center focus:outline-none text-lg">
                                Cars <i class="fas fa-chevron-down ml-1 text-sm"></i>
                            </button>
                            <div id="dropdownMenu"
                                class="dropdown-menu hidden absolute left-0 mt-2 w-48 bg-white shadow-lg z-50">
                                <a href="carDetailPage.php"
                                    class="dropdown-item block px-4 py-2 text-gray-800 hover:bg-gray-100">Detail</a>
                            
                                <a href="previous_bookings.php"
                                    class="dropdown-item block px-4 py-2 text-gray-800 hover:bg-gray-100">Previous Booking</a>
                            </div>
                        </div>

                        <a href="contactPage.php"
                            class="text-gray-900 font-bold hover:text-white transition text-lg">Contact</a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button id="menuToggle" class="lg:hidden text-gray-900 hover:text-white transition">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </nav>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="lg:hidden">
                <div class="flex flex-col space-y-3">
                    <a href="index.php" class="text-gray-900 hover:text-blue-600 transition py-2">Home</a>
                    <a href="aboutPage.php" class="text-gray-900 hover:text-blue-600 transition py-2">About</a>

                    <!-- Mobile Cars Dropdown -->
                    <div class="mobile-dropdown">
                        <button
                            class="text-gray-900 hover:text-blue-600 transition py-2 w-full text-left flex justify-between items-center"
                            onclick="toggleMobileDropdown(this)">
                            Cars <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="mobile-dropdown-content">
                            <a href="carDetailPage.php"
                                class="block text-gray-900 hover:text-blue-600 transition py-2 pl-4">Car Detail</a>
                            <a href="carBookingPage.php"
                                class="block text-gray-900 hover:text-blue-600 transition py-2 pl-4">Car Booking</a>
                        </div>
                    </div>

                    <a href="contactPage.php" class="text-gray-900 hover:text-blue-600 transition py-2">Contact</a>

                    <!-- Mobile Auth Links -->
                    <div class="border-t border-gray-200 mt-2 pt-2">
                        <?php if ($currentUser): ?>
                        <div class="text-gray-900 py-2">Welcome, <?php echo htmlspecialchars($currentUser['name']); ?>
                        </div>
                        <a href="/updatecar/login-signup/logout.php"
                            class="text-red-600 hover:text-red-700 transition py-2 block">Logout</a>
                        <?php else: ?>
                        <a href="/updatecar/login-signup/login.php"
                            class="text-blue-600 hover:text-blue-700 transition py-2 block">Login</a>
                        <a href="/updatecar/login-signup/signup.php"
                            class="text-blue-600 hover:text-blue-700 transition py-2 block">Sign Up</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 800,
        offset: 100,
        once: true
    });
    // Mobile menu toggle
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('open');
    });

    // Mobile dropdown toggle
    function toggleMobileDropdown(button) {
        const dropdownContent = button.nextElementSibling;
        dropdownContent.classList.toggle('open');
        const icon = button.querySelector('i');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('#mobileMenu') && !e.target.closest('#menuToggle')) {
            mobileMenu.classList.remove('open');
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function() {
            dropdownMenu.classList.add('hidden');
        });
    });
    </script>
</body>

</html>