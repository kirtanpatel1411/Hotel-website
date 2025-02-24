<?php
session_start();

include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Hotel Website</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

   <link rel="stylesheet" href="style.css">
</head>

<body>

   <section class="about" id="about">

      <div class="row">

         <div class="image">
            <img src="./images/aboutus.webp" alt="">
         </div>

         <div class="content">
            <h3>about us</h3>
            <p>Courtyard by Marriott Surat is a premier hotel offering a blend of comfort and convenience for both business and leisure travelers. The hotel features 132 double rooms and 1 single room, all designed to provide a restful environment with luxury bedding and modern amenities. Guests can start their day with a sumptuous breakfast at The Bistro, stay active at the 24-hour fitness center, or unwind in the outdoor pool. For those needing to stay productive, the hotel offers meeting rooms such as Solitaire, Coral, and Tiara, catering to various event needs. Additionally, Café Coco in the lobby provides a cozy spot for coffee or late-night snacks. The hotel's proximity to Surat Airport and local attractions like Dumas Beach makes it an ideal choice for travelers seeking both relaxation and accessibility. </p>

         </div>

         <div class="owner-section">
            <img src="./images/kirtan.png" alt="Owner Image">
            <h3>Mr. Kirtan Patel</h3>
            <p>"Founder & CEO of Courtyard by Marriott Surat. With years of experience in hospitality,<b style="color: black;"> Kirtan </b>is dedicated to providing exceptional guest experiences, ensuring every visitor feels at home."</p>
         </div>
         <div class="owner-section">
            <img src="./images/om.png" alt="Owner Image">
            <h3>Mr. Om Soni</h3>
            <p> "At Courtyard by Marriott Surat, we believe in making every guest feel at home. Under the leadership of <b style="color: black;">Om Soni</b>, our team works tirelessly to ensure your stay is comfortable, memorable, and filled with warmth. Welcome to a place where hospitality meets excellence!"

            </p>
         </div>


      </div>

   </section>
   <div class="owner-section">
      <img src="./images/owner.JPG" alt="Owner Image">

      <p>"Founded by<b style="color: black;"> Kirtan Patel</b> and <b style="color:black">Om Soni</b>, Courtyard by Marriott Surat stands as a testament to their shared vision of redefining luxury and hospitality. Their leadership continues to inspire excellence in every aspect of our service."</p>
   </div>
   <?php
   include 'footer.php';
   ?>

</body>

</html>