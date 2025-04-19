<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Offer</title>
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
        opacity: 0.5;
        transition: opacity 0.3s ease;
    }

    .glass-bg:hover::before {
        opacity: 0.7;
    }

    .glass-bg::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: -5;
    }

    .banner-text {
        animation: slideInTop 1s ease-out;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }

    .float-animation {
        animation: float 6s ease-in-out infinite;
    }
    </style>
</head>

<body class="page-transition">
    <div class="w-full py-12 ">
        <div class="max-w-6xl mx-auto py-12 px-4 ">
            <div class="bg-banner py-12 px-4 text-center rounded-3xl shadow-xl glass-bg relative flex flex-col justify-center items-center overflow-hidden card-hover" data-aos="zoom-in">
                <div class="py-12">
                    <h1 class="text-6xl md:text-7xl lg:text-8xl font-bold uppercase text-blue-900 mb-8 banner-text float-animation">
                        Upcoming Offer
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>

</html>