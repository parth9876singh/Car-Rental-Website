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
        .feature-card {
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        .about-image {
            transition: transform 0.5s ease;
        }
        .about-image:hover {
            transform: scale(1.05);
        }
        .feature-icon {
            transition: all 0.3s ease;
        }
        .feature-card:hover .feature-icon {
            transform: rotate(360deg);
        }
        @keyframes slideInFromBottom {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .animate-slide-in {
            animation: slideInFromBottom 0.8s ease-out forwards;
        }
    </style>
</head>
<body class="page-transition">
    <!-- Welcome Section -->
    <div class="relative bg-cover bg-center py-16 md:py-24" style="background-image: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)), url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
        <div class="container mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12" data-aos="fade-down">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold uppercase mb-4 relative inline-block pb-4">
                    Welcome To <span class="text-red-600">Drive2U</span>
                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-red-600"></div>
                </h1>
            </div>
            
            <!-- About Content -->
            <div class="flex justify-center">
                <div class="max-w-4xl text-center" data-aos="fade-up" data-aos-delay="100">
                    <img src="img/about.png" alt="About Royal Cars" class="about-image mx-auto mb-8 w-full max-w-2xl rounded-lg shadow-xl">
                    <p class="text-gray-600 text-lg leading-relaxed mb-12 animate-slide-in">
                        "Hello everyone, We welcome you on Drive2U Self-drive Bike and car rental services in Lucknow, We provide bikes and variety of cars for self driving, We also provide cars for weddings, and also for trips and tours with a family with your friends, And we offer you all these facilities in very low price and also with lots of exciting offers. Drive2U provides best car on rent in Lucknow, and for the Self driving car in Lucknow, Best self driving services in Lucknow, Rent now for outstation and for your Trips and tours as well."
                    </p>
                </div>
            </div>
            
            <!-- Features -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <!-- Feature 1 -->
                <div class="feature-card bg-white rounded-xl shadow-md p-6 flex items-center h-40" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex-shrink-0 -ml-4 mr-6 w-24 h-24 bg-red-600 rounded-full flex items-center justify-center text-white text-4xl shadow-lg feature-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-2">Wide Car Range</h3>
                        <p class="text-gray-600">Choose from our extensive fleet of vehicles</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card bg-white rounded-xl shadow-md p-6 flex items-center h-40" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex-shrink-0 -ml-4 mr-6 w-24 h-24 bg-red-600 rounded-full flex items-center justify-center text-white text-4xl shadow-lg feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-2">Fully Insured</h3>
                        <p class="text-gray-600">All our vehicles are fully insured</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card bg-white rounded-xl shadow-md p-6 flex items-center h-40" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex-shrink-0 -ml-4 mr-6 w-24 h-24 bg-red-600 rounded-full flex items-center justify-center text-white text-4xl shadow-lg feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-2">24/7 Support</h3>
                        <p class="text-gray-600">Round the clock customer support</p>
                    </div>
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