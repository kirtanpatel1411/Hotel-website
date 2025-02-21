<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Hotel Website</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- swiper js cdn link -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
   <!-- custom css link -->
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
