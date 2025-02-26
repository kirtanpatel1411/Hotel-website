<!DOCTYPE html>
<html lang="en">
<?php
session_start();

include 'db.php';

// Fetch only valid offers (not expired)
$sql = "SELECT * FROM offers WHERE valid_until >= CURDATE() ORDER BY id DESC";
$result = $conn->query($sql);



?>



<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Hotel Website</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

   <link rel="stylesheet" href="style.css">
   <script>
      function toggleDropdown() {
         document.getElementById("account-dropdown").classList.toggle("show");
      }

      window.onclick = function(event) {
         if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
               var openDropdown = dropdowns[i];
               if (openDropdown.classList.contains('show')) {
                  openDropdown.classList.remove('show');
               }
            }
         }
      }

      document.addEventListener("DOMContentLoaded", function() {
         const logo = document.getElementById("logoClick");
         const popup = document.getElementById("offerPopup");
         const closeBtn = document.querySelector(".close-btn");

         // Show popup when clicking the logo
         logo.addEventListener("click", function() {
            popup.style.display = "flex";
         });

         // Close popup when clicking "X"
         closeBtn.addEventListener("click", function() {
            popup.style.display = "none";
         });

         // Close popup when clicking outside content
         window.addEventListener("click", function(event) {
            if (event.target === popup) {
               popup.style.display = "none";
            }
         });
      });
   </script>
   <style>
      .dropdown {
         position: relative;
         display: inline-block;
      }

      .dropdown-content {
         display: none;
         position: absolute;
         background-color: white;
         min-width: 160px;
         box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
         z-index: 1;
      }

      .dropdown-content a {
         color: black;
         padding: 12px 16px;
         text-decoration: none;
         display: block;
      }

      .dropdown-content a:hover {
         background-color: #f1f1f1;
      }

      .show {
         display: block;
      }
   </style>
</head>

<body>
   <header class="header">
      <a href="#" class="logo">
         <img src="./images/cy_logo_L.avif" alt="Hotel Logo" style="height: 50px;">
      </a>
      <nav class="navbar">
         <a href="index.php">home</a>
         <a href="about.php">about</a>
         <a href="room.php">room</a>
         <a href="gallery.php">gallery</a>
         <a href="feedback.php">Feedback</a>
         <div class="dropdown">
            <a href="#" class="dropbtn" onclick="toggleDropdown()">Account</a>
            <div class="dropdown-content" id="account-dropdown">
               <a href="login.php">Login</a>
               <a href="register.php">Register</a>
               <a href="profile.php">Profile</a>
            </div>
         </div>
         <a href="room.php" class="bookbtn"> book now</a>
      </nav>
      <div id="menu-btn" class="fas fa-bars"></div>
   </header>
</body>

</html>


<!-- end -->

<!-- home -->

<section class="home" id="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide" style="background: url(images/banner3.jpg  ) no-repeat;">

         </div>

         <div class="swiper-slide slide" style="background: url(images/banner2.jpg) no-repeat;">

         </div>

         <div class="swiper-slide slide" style="background: url(images/home-slide1.jpg) no-repeat;">

         </div>

         <div class="swiper-slide slide" style="background: url(images/home-slide4.jpg) no-repeat;">

         </div>
         <div class="swiper-slide slide" style="background: url(images/home-slide3.jpg) no-repeat;">

         </div>


      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

   </div>

</section>

<!-- end -->

<!-- availability -->

<section class="availability">

   <form action="room.php" method="GET">

      <div class="box">
         <p>check in <span>*</span></p>
         <input type="date" class="input" name="checkin" required>
      </div>

      <div class="box">
         <p>check out <span>*</span></p>
         <input type="date" class="input" name="checkout" required>
      </div>

      <div class="box">
         <p>adults <span>*</span></p>
         <select name="adults" id="" class="input">
            <option value="1">1 adults</option>
            <option value="2">2 adults</option>
            <option value="3">3 adults</option>
            <option value="4">4 adults</option>

         </select>
      </div>

      <div class="box">
         <p>children <span>*</span></p>
         <select name="child" id="" class="input">
            <option value="1">1 child</option>
            <option value="2">2 child</option>
            <option value="3">3 child</option>
            <option value="4">4 child</option>

         </select>
      </div>

      <div class="box">
         <p>rooms <span>*</span></p>
         <select name="rooms" id="" class="input">
            <option value="1">1 rooms</option>
            <option value="2">2 rooms</option>
            <option value="3">3 rooms</option>
            <option value="4">4 rooms</option>

         </select>
      </div>
      <div class="box">
         <p>Price <span>*</span></p>
         <select name="price" id="" class="input">
            <option value="3000">under 3000 </option>
            <option value="8000">under 8000</option>
            <option value="14000">under 14000</option>
            <option value="18000">under 18000</option>

         </select>
      </div>

      <button type="submit" class="btn">Check Availability</button>


   </form>

</section>

<!-- end -->

<!-- services -->

<section class="services">

   <div class="box-container">

      <div class="box">
         <img src="images/service1.png" alt="">
         <h3>swimming pool</h3>
      </div>

      <div class="box">
         <img src="images/service2.png" alt="">
         <h3>food & drink</h3>
      </div>

      <div class="box">
         <img src="images/service3.png" alt="">
         <h3>restaurant</h3>
      </div>

      <div class="box">
         <img src="images/service4.png" alt="">
         <h3>fitness</h3>
      </div>

      <div class="box">
         <img src="images/service5.png" alt="">
         <h3>beauty spa</h3>
      </div>

      <div class="box">
         <img src="images/service6.png" alt="">
         <h3>resort beach</h3>
      </div>

   </div>

</section>

<!-- end -->



<!-- about -->

<section class="about" id="about">

   <div class="row">

      <div class="image">
         <img src="images/aboutus.webp" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>Courtyard by Marriott Surat is a premier hotel offering a blend of comfort and convenience for both business and leisure travelers. The hotel features 132 double rooms and 1 single room, all designed to provide a restful environment with luxury bedding and modern amenities. Guests can start their day with a sumptuous breakfast at The Bistro, stay active at the 24-hour fitness center, or unwind in the outdoor pool. For those needing to stay productive, the hotel offers meeting rooms such as Solitaire, Coral, and Tiara, catering to various event needs. Additionally, Café Coco in the lobby provides a cozy spot for coffee or late-night snacks. The hotel's proximity to Surat Airport and local attractions like Dumas Beach makes it an ideal choice for travelers seeking both relaxation and accessibility. </p>

      </div>

   </div>

</section>

<!-- end -->



<!-- gallery -->

<section class="gallery" id="gallery">

   <h1 class="heading">our gallery</h1>

   <div class="swiper gallery-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/gallery1.jpg" alt="">
            <div class="icon">
               <i class="fas fa-magnifying-glass-plus"></i>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/gallery2.jpg" alt="">
            <div class="icon">
               <i class="fas fa-magnifying-glass-plus"></i>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/gallery3.jpg" alt="">
            <div class="icon">
               <i class="fas fa-magnifying-glass-plus"></i>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/gallery4.jpg" alt="">
            <div class="icon">
               <i class="fas fa-magnifying-glass-plus"></i>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/gallery5.jpg" alt="">
            <div class="icon">
               <i class="fas fa-magnifying-glass-plus"></i>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/gallery6.jpg" alt="">
            <div class="icon">
               <i class="fas fa-magnifying-glass-plus"></i>
            </div>
         </div>

      </div>

   </div>

</section>

<!-- end -->

<section class="facilities" id="facilities   ">

   <div class="facilities-container">
      <h1>Our Facilities</h1>
      <div class="facilities-grid">
         <div class="facility-card">
            <img src="images/service1.png" alt="Swimming Pool">
            <h3>Swimming Pool</h3>
            <p>Relax and unwind in our luxurious swimming pool with a poolside lounge.</p>
         </div>

         <div class="facility-card">
            <img src="images/service5.png" alt="Spa & Wellness">
            <h3>Spa & Wellness</h3>
            <p>Rejuvenate with our spa services, sauna, and wellness treatments.</p>
         </div>

         <div class="facility-card">
            <img src="images/service3.png" alt="Restaurant">
            <h3>Multi-Cuisine Restaurant</h3>
            <p>Enjoy gourmet dishes prepared by our world-class chefs.</p>
         </div>

         <div class="facility-card">
            <img src="images/service4.png" alt="Gym & Fitness">
            <h3>Gym & Fitness</h3>
            <p>Stay fit with our state-of-the-art fitness center and personal trainers.</p>
         </div>

         <div class="facility-card">
            <img src="images/wifi.jpg" alt="Free WiFi">
            <h3>Free WiFi</h3>
            <p>High-speed internet access available throughout the hotel.</p>
         </div>

         <div class="facility-card">
            <img src="images/parking.png" alt="Parking">
            <h3>Free Parking</h3>
            <p>Spacious and secure parking area for our guests.</p>
         </div>
      </div>
   </div>

</section>

<!-- faq -->

<section class="faqs" id="faq">

   <h1 class="heading">Frequently Asked Questions</h1>

   <div class="row">

      <div class="image">
         <img src="images/FAQs.gif" alt="FAQs">
      </div>

      <div class="content">

         <div class="box active">
            <h3>What are the available payment methods?</h3>
            <p>We accept payments through Credit/Debit Cards, UPI, Net Banking, and PayPal. Cash payments are also available at the hotel reception.</p>
         </div>

         <div class="box">
            <h3>What is the check-in and check-out time?</h3>
            <p>Our standard check-in time is **2:00 PM**, and check-out time is **11:00 AM**. Early check-in and late check-out are subject to availability.</p>
         </div>

         <div class="box">
            <h3>Do you offer free WiFi?</h3>
            <p>Yes, we provide **complimentary high-speed WiFi** in all rooms and public areas for our guests.</p>
         </div>

         <div class="box">
            <h3>Is breakfast included in the room booking?</h3>
            <p>Yes, a **complimentary buffet breakfast** is included in most room packages. Please check your booking details for confirmation.</p>
         </div>

         <div class="box">
            <h3>Do you have airport pickup and drop-off services?</h3>
            <p>Yes, we offer **airport pickup and drop-off** services at an additional charge. Please contact our front desk to arrange transportation.</p>
         </div>

         <div class="box">
            <h3>Is there a cancellation policy?</h3>
            <p>Yes, cancellations are allowed **24 hours before check-in** for a full refund. Cancellations made after that may incur charges. Policies may vary based on your booking.</p>
         </div>

         <div class="box">
            <h3>Are pets allowed in the hotel?</h3>
            <p>We do not allow pets in the hotel, except for **service animals** with proper documentation.</p>
         </div>

         <div class="box">
            <h3>Do you have parking facilities?</h3>
            <p>Yes, we offer **free parking** for all hotel guests with 24/7 security.</p>
         </div>

      </div>

   </div>

</section>

<!-- end -->

<!-- Offer Icon -->
<div class="offerlogo" id="logoClick">
   <img src="images/offer.png" alt="Hotel Logo">
</div>

<div id="offerPopup" class="popup">
   <div class="popup-content">
      <span class="close-btn">&times;</span>

      <?php if ($result->num_rows > 0) { ?>
         <?php while ($offer = $result->fetch_assoc()) { ?>
            <div class="offer-box">

               <h2><?php echo htmlspecialchars($offer['title']); ?></h2>
               <p><?php echo htmlspecialchars($offer['description']); ?></p>
               <h3>Discount: <?php echo htmlspecialchars($offer['discount_percentage']); ?>% OFF</h3>
               <p><strong>Valid Until:</strong> <?php echo htmlspecialchars($offer['valid_until']); ?></p>
               <hr>
            </div>
         <?php } ?>
      <?php } else { ?>
         <p>No current offers available.</p>
      <?php } ?>

   </div>
</div>




<!-- footer -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i>+91 9714022044 </a>
         <a href="#"> <i class="fas fa-phone"></i>+91 9081794927</a>
         <a href="#"> <i class="fas fa-envelope"></i>reservations@courtyardsurat.com</a>
         <a href="#"> <i class="fas fa-map"></i>Earthspace, Hazira Road, Surat, Gujarat, India</a>
      </div>

      <div class="box">
         <h3>quick links</h3>
         <a href="index.html"> <i class="fas fa-arrow-right"></i>Home</a>
         <a href="about.php"> <i class="fas fa-arrow-right"></i>About</a>
         <a href="room.php"> <i class="fas fa-arrow-right"></i>Rooms</a>
         <a href="gallery.php"> <i class="fas fa-arrow-right"></i>Gallery</a>
         <a href="feedback.php"> <i class="fas fa-arrow-right"></i>Feedback</a>
      </div>

      <div class="box">
         <h3>extra links</h3>
         <a href="faq.php"> <i class="fas fa-arrow-right"></i> FAQ</a>
         <a href="privacy.php"> <i class="fas fa-arrow-right"></i> Privacy Policy</a>
         <a href="terms.php"> <i class="fas fa-arrow-right"></i> Terms & Conditions</a>
         <a href="refund.php"> <i class="fas fa-arrow-right"></i> Refund Policy</a>
         <a href="careers.php"> <i class="fas fa-arrow-right"></i> Careers</a>
      </div>

   </div>

   <div class="share">
      <a href="https://www.facebook.com/Courtyardsurat/" class="fab fa-facebook-f"></a>
      <a href="https://www.instagram.com/courtyardmarriottsurat/" class="fab fa-instagram"></a>
      <!-- <a href="#" class="fab fa-twitter"></a> -->
      <a href="https://in.pinterest.com/pin/880664902127439501/" class="fab fa-pinterest"></a>
   </div>

   <div class="credit">&copy; copyright @ 2025 by <span style="color:black">courtyard</span></div>

</section>

<!-- end -->


















<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script src="script.js"></script>

</body>

</html>