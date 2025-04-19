   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
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
           <h1 class="text-5xl font-bold uppercase text-white mb-6">Contact</h1>
           <div class="flex items-center text-white">
               <a href="index.php" class="uppercase font-medium text-white hover:text-gray-200 transition">Home</a>
               <span class="mx-3 text-gray-300">/</span>
               <span class="uppercase text-gray-300">About</span>
           </div>
       </div>

       <?php include 'contact.php'; ?>
       <!-- Map Section -->
       <div class="mt-12">
           <div class="bg-white p-8 rounded-xl shadow-lg">
               <h2 class="text-2xl font-bold text-gray-800 mb-6">Our Location</h2>
               <div id="map" class="w-full h-[400px]"></div>
           </div>
       </div>
       <?php include 'footer.php'; ?>

       <!-- Google Maps JavaScript -->
       <script>
       // Initialize the map after the API is loaded
       function initMap() {
           try {
               console.log("Initializing map...");
               // Mumbai coordinates
               const shopLocation = {
                   lat: 25.883657,
                   lng: 83.903988
               };

               const mapElement = document.getElementById("map");
               console.log("Map element:", mapElement);

               const mapOptions = {
                   zoom: 16,
                   center: shopLocation,
                   mapTypeControl: true,
                   streetViewControl: true,
                   fullscreenControl: true,
                   mapTypeId: google.maps.MapTypeId.ROADMAP
               };

               const map = new google.maps.Map(mapElement, mapOptions);

               // Add a marker for the shop location
               const marker = new google.maps.Marker({
                   position: shopLocation,
                   map: map,
                   title: "Royal Cars Rental Shop",
                   animation: google.maps.Animation.DROP
               });

               // Add an info window with more detailed content
               const infoWindow = new google.maps.InfoWindow({
                   content: `
                        <div style="padding: 15px; max-width: 250px;">
                            <h3 style="color: #dc2626; margin-bottom: 8px; font-weight: bold; font-size: 16px;">Royal Cars Rental</h3>
                            <p style="margin: 0; line-height: 1.4;">
                                <i class="fas fa-map-marker-alt" style="color: #dc2626; margin-right: 5px;"></i>
                                Your Shop Address Here<br>
                                Mumbai, Maharashtra
                            </p>
                            <p style="margin: 8px 0 0; line-height: 1.4;">
                                <i class="fas fa-phone" style="color: #dc2626; margin-right: 5px;"></i>
                                Your Phone Number<br>
                                <i class="fas fa-clock" style="color: #dc2626; margin-right: 5px;"></i>
                                Open: 9:00 AM - 6:00 PM
                            </p>
                        </div>
                    `
               });

               // Open info window by default
               infoWindow.open(map, marker);

               // Toggle info window on marker click
               marker.addListener("click", () => {
                   infoWindow.open(map, marker);
               });

               console.log("Map setup complete");
           } catch (error) {
               console.error("Error initializing map:", error);
               document.getElementById('map').innerHTML =
                   '<div class="p-4 text-red-600">Error initializing Google Maps. Please try refreshing the page.</div>';
           }
       }

       // Add error handling for Google Maps API loading
       window.gm_authFailure = function() {
           console.error('Google Maps authentication failed');
           document.getElementById('map').innerHTML = `
                <div class="p-4 bg-red-50 border border-red-200 rounded-lg">
                    <h3 class="text-red-600 font-semibold mb-2">Google Maps Error</h3>
                    <p class="text-red-500">Unable to load Google Maps correctly. This might be due to:</p>
                    <ul class="list-disc list-inside text-red-500 mt-2">
                        <li>API key configuration issues</li>
                        <li>Domain restrictions</li>
                        <li>Billing not enabled</li>
                    </ul>
                </div>
            `;
       };
       </script>
       <script
           src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjO6K0Q36EP7h-7hqBVZvTCB-1D87RMlM&callback=initMap"
           async defer></script>


   </body>

   </html>