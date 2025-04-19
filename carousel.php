<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Cars - Car Rental</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    /* Carousel Styles */
    .carousel-container {
        position: relative;
        width: 100%;
        height: 600px;
        /* Adjust height as needed */
        overflow: hidden;
        margin-bottom: 90px;
    }

    .carousel-slides {
        display: flex;
        width: 100%;
        height: 100%;
        transition: transform 0.5s ease-in-out;
    }

    .carousel-slide {
        min-width: 100%;
        position: relative;
    }

    .carousel-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .carousel-caption {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: white;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 20px;
    }

    .carousel-caption h4 {
        font-size: 1.5rem;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .carousel-caption h1 {
        font-size: 3.5rem;
        font-weight: bold;
        margin-bottom: 2rem;
    }

    .carousel-btn {
        background-color: rgba(33, 98, 203, 0.85);
        color: white;
        padding: 12px 30px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .carousel-btn:hover {
        background-color: #0069d9;
    }

    .carousel-control {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 45px;
        height: 45px;
        background-color: rgba(0, 0, 0, 0.7);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s;
    }

    .carousel-control:hover {
        background-color: rgba(0, 0, 0, 0.9);
    }

    .carousel-prev {
        left: 20px;
    }

    .carousel-next {
        right: 20px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .carousel-container {
            height: 500px;
        }

        .carousel-caption h1 {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 576px) {
        .carousel-container {
            height: 400px;
        }

        .carousel-caption h1 {
            font-size: 2rem;
        }

        .carousel-caption h4 {
            font-size: 1.2rem;
        }

        .carousel-btn {
            padding: 10px 20px;
            font-size: 0.9rem;
        }
    }
    /* Animation keyframes */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes slideUp {
        from { 
            opacity: 0;
            transform: translateY(30px);
        }
        to { 
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Animation classes */
    .animate-fade-in {
        animation: fadeIn 1s ease-in-out forwards;
    }
    
    .animate-slide-up {
        animation: slideUp 1s ease-out 0.3s forwards;
        opacity: 0; /* Start invisible */
    }
    
    /* Optional: Add hover effect to button */
    .carousel-btn {
        transition: all 0.3s ease;
    }
    
    .carousel-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
    </style>
</head>

<body>
    <!-- Carousel Section -->
    <div class="carousel-container" id="carousel">
        <div class="carousel-slides">
            <!-- Slide 1 -->
            <div class="carousel-slide active">
                <img src="./img/carousel-1.jpg" alt="Luxury Cars" class="animate-fade-in">
                <div class="carousel-caption animate-slide-up">
                    <h1>Luxury, Comfort, Convenience-All in One Drive</h1>
                    <a href="carBookingPage.php" class="carousel-btn">Reserve Now</a>
                </div>
            </div>


            <!-- Slide 2 -->
            <div class="carousel-slide active">
                <img src="./img/carousel2img.jpg" alt="Quality Cars" class="animate-fade-in">
                <div class="carousel-caption animate-slide-up">
                    <h1>Quality Cars with Unlimited Miles</h1>
                    <a href="carBookingPage.php" class="carousel-btn">Reserve Now</a>
                </div>
            </div>
        </div>

        <!-- Navigation Controls -->
        <div class="carousel-control carousel-prev" onclick="prevSlide()">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="carousel-control carousel-next" onclick="nextSlide()">
            <i class="fas fa-chevron-right"></i>
        </div>
    </div>

    <script>
    // Carousel functionality
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('carousel');
        const slides = document.querySelectorAll('.carousel-slide');
        let currentIndex = 0;
        let interval;

        // Initialize carousel
        function initCarousel() {
            updateCarousel();
            startAutoRotation();

            // Pause on hover
            carousel.addEventListener('mouseenter', pauseAutoRotation);
            carousel.addEventListener('mouseleave', startAutoRotation);

            // Touch events for mobile
            let touchStartX = 0;
            let touchEndX = 0;

            carousel.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
                pauseAutoRotation();
            }, {
                passive: true
            });

            carousel.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                startAutoRotation();
            }, {
                passive: true
            });
        }

        function handleSwipe() {
            if (touchEndX < touchStartX - 50) {
                nextSlide(); // Swipe left
            } else if (touchEndX > touchStartX + 50) {
                prevSlide(); // Swipe right
            }
        }

        function updateCarousel() {
            const slidesContainer = document.querySelector('.carousel-slides');
            slidesContainer.style.transform = `translateX(-${currentIndex * 100}%)`;

            // Update active class
            slides.forEach((slide, index) => {
                slide.classList.toggle('active', index === currentIndex);
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            updateCarousel();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            updateCarousel();
        }

        function startAutoRotation() {
            clearInterval(interval);
            interval = setInterval(nextSlide, 5000);
        }

        function pauseAutoRotation() {
            clearInterval(interval);
        }

        // Initialize the carousel
        initCarousel();

        // Make functions available globally for button clicks
        window.nextSlide = nextSlide;
        window.prevSlide = prevSlide;
    });
    </script>
</body>

</html>