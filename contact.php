<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = '';
        $mail->Password   = '';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Email content
        $mail->setFrom($email, $name);
        $mail->addAddress('singhparth2318.com@gmail.com');
        $mail->Subject = $subject;
        $mail->Body    = "Name: $name\nEmail: $email\n\n$message";

        $mail->send();
        $response = array('status' => 'success', 'message' => '✅ Message sent successfully!');
        echo json_encode($response);
    } catch (Exception $e) {
        $response = array('status' => 'error', 'message' => '❌ Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        echo json_encode($response);
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
    .contact-input {
        transition: all 0.3s;
    }

    .contact-input:focus {
        border-color: #cc0000;
        box-shadow: 0 0 0 0.2rem rgba(204, 0, 0, 0.1);
    }

    .submit-btn {
        transition: all 0.3s;
    }

    .submit-btn:hover {
        background-color: #b30000;
        transform: translateY(-2px);
    }

    #map {
        width: 100%;
        height: 400px;
        border-radius: 0.75rem;
        position: relative;
    }

    #map div {
        border-radius: 0.75rem;
    }

    .card-hover {
        transition: all 0.3s;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.1);
    }

    .btn-hover {
        transition: all 0.3s;
    }

    .btn-hover:hover {
        transform: translateY(-2px);
    }
    </style>
</head>

<body class="bg-gray-100 page-transition">
    <div class="w-full py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto pt-12 pb-8 px-4">
            <!-- Heading Section -->
            <div class="text-center mb-12" data-aos="fade-up">
                <h1 class="text-4xl md:text-5xl font-bold uppercase text-center mb-6 relative inline-block pb-4 text-gray-800">
                    Contact <span class="text-red-600">Us</span>
                </h1>
                <p class="text-gray-600 max-w-2xl mx-auto">Have questions? Get in touch with our team today</p>
            </div>

            <!-- Contact Content -->
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Contact Form -->
                <div class="w-full lg:w-7/12" data-aos="fade-right" data-aos-delay="100">
                    <div class="bg-white p-8 md:p-10 rounded-xl shadow-lg card-hover">
                        <form id="contact-form">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <input type="text"
                                        class="contact-input w-full p-4 border border-gray-300 rounded-lg"
                                        placeholder="Your Name" required name="name">
                                </div>
                                <div>
                                    <input type="email"
                                        class="contact-input w-full p-4 border border-gray-300 rounded-lg"
                                        placeholder="Your Email" required name="email">
                                </div>
                            </div>
                            <div class="mb-6">
                                <input type="text" class="contact-input w-full p-4 border border-gray-300 rounded-lg"
                                    placeholder="Subject" required name="subject">
                            </div>
                            <div class="mb-6">
                                <textarea class="contact-input w-full p-4 border border-gray-300 rounded-lg" rows="5"
                                    placeholder="Message" required name="message"></textarea>
                            </div>
                            <div>
                                <button type="submit"
                                    class="btn-hover w-full bg-red-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-red-700 transition duration-300">
                                    Send Message
                                </button>
                            </div>

                            <div id="response" class="mt-4 text-center"></div>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="w-full lg:w-5/12" data-aos="fade-left" data-aos-delay="200">
                    <div class="h-full p-8 md:p-10 rounded-xl shadow-lg bg-gradient-to-br from-red-600 to-red-800 card-hover">
                        <!-- Office 1 -->
                        <div class="flex items-start mb-6">
                            <div
                                class="flex-shrink-0 bg-white w-12 h-12 rounded-full flex items-center justify-center mr-5">
                                <i class="fas fa-map-marker-alt text-red-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold mb-1">Head Office</h3>
                                <p class="text-red-100">Indira Nagar, Lucknow, Uttar Pradesh 226016</p>
                            </div>
                        </div>

                        <!-- Office 2 -->
                        <div class="flex items-start mb-6">
                            <div
                                class="flex-shrink-0 bg-white w-12 h-12 rounded-full flex items-center justify-center mr-5">
                                <i class="fas fa-map-marker-alt text-red-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold mb-1">Branch Office</h3>
                                <p class="text-red-100">Near Rajkiya Balika Inter Collage, Shankarpuri Colony, Sector 11
                                </p>
                            </div>
                        </div>

                        <!-- Email 1 -->
                        <div class="flex items-start mb-6">
                            <div
                                class="flex-shrink-0 bg-white w-12 h-12 rounded-full flex items-center justify-center mr-5">
                                <i class="fas fa-envelope-open text-red-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold mb-1">Customer Service</h3>
                                <p class="text-red-100">customer@example.com</p>
                            </div>
                        </div>

                        <!-- Email 2 -->
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 bg-white w-12 h-12 rounded-full flex items-center justify-center mr-5">
                                <i class="fas fa-envelope-open text-red-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold mb-1">Return & Refund</h3>
                                <p class="text-red-100">refund@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>

    <script>
    $(document).ready(function() {
        $('#contact-form').on('submit', function(e) {
            e.preventDefault();
            
            // Add loading animation to button
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.text();
            submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Sending...');
            submitBtn.prop('disabled', true);
            
            $.ajax({
                url: 'contact.php',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    const data = response;
                    if(data.status === 'success') {
                        // Add success animation
                        submitBtn.html('<i class="fas fa-check"></i> ' + data.message);
                        submitBtn.removeClass('bg-red-600').addClass('bg-green-600');
                        
                        // Reset form
                        setTimeout(() => {
                            $('#contact-form')[0].reset();
                            submitBtn.html(originalText);
                            submitBtn.removeClass('bg-green-600').addClass('bg-red-600');
                            submitBtn.prop('disabled', false);
                        }, 3000);
                    } else {
                        // Add error animation
                        submitBtn.html('<i class="fas fa-times"></i> ' + data.message);
                        submitBtn.removeClass('bg-red-600').addClass('bg-yellow-600');
                        
                        setTimeout(() => {
                            submitBtn.html(originalText);
                            submitBtn.removeClass('bg-yellow-600').addClass('bg-red-600');
                            submitBtn.prop('disabled', false);
                        }, 3000);
                    }
                },
                error: function() {
                    submitBtn.html('<i class="fas fa-times"></i> Error occurred');
                    submitBtn.removeClass('bg-red-600').addClass('bg-yellow-600');
                    
                    setTimeout(() => {
                        submitBtn.html(originalText);
                        submitBtn.removeClass('bg-yellow-600').addClass('bg-red-600');
                        submitBtn.prop('disabled', false);
                    }, 3000);
                }
            });
        });
    });
    </script>

</body>

</html>
