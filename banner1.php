<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner Section</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    /* Initial state - hidden */
    .scroll-animate-left {
        opacity: 0;
        transform: translateX(-50px);
        transition: all 0.8s ease-out;
    }
    
    .scroll-animate-right {
        opacity: 0;
        transform: translateX(50px);
        transition: all 0.8s ease-out;
    }
    
    /* Animated state - when visible */
    .scroll-animate-left.animate {
        opacity: 1;
        transform: translateX(0);
    }
    
    .scroll-animate-right.animate {
        opacity: 1;
        transform: translateX(0);
    }
    
    /* Hover effects */
    .banner-hover-effect {
        transition: all 0.3s ease;
    }
    
    .banner-hover-effect:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
</style>

</head>

<body>
    <div class="w-full py-12">
        <div class="max-w-6xl mx-auto py-12 px-4">
            <div class="flex flex-col lg:flex-row">
                <!-- Left Banner -->
                <div class="w-full lg:w-1/2 scroll-animate-left">
                    <div
                        class="px-8 bg-gray-600 flex items-center justify-between h-[350px] rounded-l-none lg:rounded-l-[30px] rounded-r-[30px] lg:rounded-r-none banner-hover-effect">
                        <img class="flex-shrink-0 -ml-8 w-1/2 mr-6 transform transition duration-500 hover:scale-105"
                            src="img/banner-left.png" alt="Driver banner">
                        <div class="text-right">
                            <h3 class="uppercase text-white mb-3 text-lg font-semibold">Want to be driver?</h3>
                            <p class="mb-4 text-gray-300">If you want to be a driver,need a valid driving license and safe driving skills. </p>
                            <a class="inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-full transition duration-300 transform hover:scale-105 hover:shadow-lg"
                                href="carDetailPage.php">
                                Start Now
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Banner -->
                <div class="w-full lg:w-1/2 mt-6 lg:mt-0 scroll-animate-right">
                    <div
                        class="px-8 bg-gray-800 flex items-center justify-between h-[350px] rounded-r-none lg:rounded-r-[30px] rounded-l-[30px] lg:rounded-l-none banner-hover-effect">
                        <div class="text-left">
                            <h3 class="uppercase text-white mb-3 text-lg font-semibold">Looking for a car?</h3>
                            <p class="mb-4 text-gray-300">Start by identifying your needs—budget, fuel type, size, and features.</p>
                            <a class="inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-full transition duration-300 transform hover:scale-105 hover:shadow-lg"
                                href="carDetailPage.php">
                                Start Now
                            </a>
                        </div>
                        <img class="flex-shrink-0 -mr-8 w-1/2 ml-6 transform transition duration-500 hover:scale-105"
                            src="img/banner-right.png" alt="Car banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, observerOptions);
    
    const leftBanner = document.querySelector('.scroll-animate-left');
    const rightBanner = document.querySelector('.scroll-animate-right');
    
    if (leftBanner) observer.observe(leftBanner);
    if (rightBanner) observer.observe(rightBanner);
});
</script>
</body>

</html>