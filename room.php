<?php
session_start();

include 'db.php';
include 'header.php';

// Initialize variables to avoid errors
$checkin = $checkout = $adults = $children = $rooms = "";

// Check if GET request has values
if ($_SERVER["REQUEST_METHOD"] == "GET") {
   $checkin = $_GET['checkin'] ?? "";
   $checkout = $_GET['checkout'] ?? "";
   $adults = $_GET['adults'] ?? "";
   $children = $_GET['child'] ?? "";
   $rooms = $_GET['rooms'] ?? "";
}

$sql = "SELECT * FROM rooms WHERE status = 'available'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Available Rooms</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         background-color: #f8f8f8;
         margin: 0;
         padding: 0;
      }

      .container {
         display: flex;
         /* justify-content: space-between; */
         align-items: flex-start;
         /* max-width: 1200px; */
         margin: 50px auto;
         gap: 80px;
         padding: 20px;
      }

      /* Form Section */
      .form-section {
         flex: 1;
         background: #fff;
         padding: 20px;
         border-radius: 4px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         max-width: 350px;
         border: 2px solid black;
      }

      .form-section h2 {
         text-align: center;
         color: #A66914;
         margin-bottom: 20px;
      }

      .box {
         margin-bottom: 15px;
      }

      .box p {
         margin: 5px 0;
         font-weight: bold;
         color: #333;
      }

      .input {
         width: 100%;
         padding: 8px;
         border: 1px solid #ccc;
         border-radius: 2px;
         font-size: 16px;
         background: #f4f4f4;
      }

      /* Room Container */
      .room-container {
         flex: 2;
         display: flex;
         flex-direction: column;
         /* Stack rooms in a single column */
         gap: 20px;
         justify-content: flex-start;
         max-width: 1000px;
      }

      /* Room Card */
      .room {
         display: flex;
         /* Image on left, content on right */
         align-items: center;
         background: #fff;
         border-radius: 4px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         overflow: hidden;
         width: 100%;
         /* Full width */
         max-width: 1000px;
         /* Limit max width */
         padding: 12px;
         gap: 15px;
      }

      /* Room Image */
      .room img {
         width: 40%;
         /* Image takes 40% */
         height: 180px;
         object-fit: cover;
         border-radius: 4px;
      }

      /* Room Content */
      .room-content {
         flex: 1;
         display: flex;
         flex-direction: column;
         justify-content: center;
         padding: 10px;
      }

      /* Room Title */
      .room h3 {
         color: #A66914;
         margin-bottom: 5px;
         font-size: 20px;
      }

      /* Room Description */
      .room p {
         color: #333;
         margin-bottom: 5px;
      }

      /* Room Price */
      .room .price {
         font-size: 18px;
         font-weight: bold;
         color: #4CAF50;
         margin-bottom: 10px;
         text-align: left;
         /* Align price properly */
      }

      /* Book Now Button */
      .room button {
         background-color: #A66914;
         color: white;
         border: none;
         padding: 8px 16px;
         /* Normal button size */
         cursor: pointer;
         font-size: 16px;
         border-radius: 5px;
         transition: 0.3s;
         width: auto;
         /* Make button size normal */
      }

      .room button:hover {
         background-color: #8A5410;
      }

      /* Responsive Design */
      @media (max-width: 768px) {
         .room {
            flex-direction: column;
            /* Stack image and content on smaller screens */
            text-align: center;
            align-items: center;
         }

         .room img {
            width: 100%;
            /* Full width */
            height: auto;
         }

         .room .price {
            text-align: center;
            /* Center price on small screens */
         }
      }
   </style>
</head>

<body>

   <h1 style="text-align: center; color: #A66914;">Available Rooms</h1>

   <div class="container">
      <!-- Form Section -->
      <div class="form-section">
         <h2>Booking Details</h2>
         <form action="" method="">
            <div class="box">
               <p>Check In <span>*</span></p>
               <input type="date" class="input" name="checkin" value="<?php echo $checkin; ?>" required>
            </div>
            <div class="box">
               <p>Check Out <span>*</span></p>
               <input type="date" class="input" name="checkout" value="<?php echo $checkout; ?>" required>
            </div>
            <div class="box">
               <p>Adults <span>*</span></p>
               <input type="number" class="input" name="adults" value="<?php echo $adults; ?>" required>
            </div>
            <div class="box">
               <p>Children</p>
               <input type="number" class="input" name="child" value="<?php echo $children; ?>" required>
            </div>
            <div class="box">
               <p>Rooms <span>*</span></p>
               <input type="number" class="input" name="rooms" value="<?php echo $rooms; ?>" required>
            </div>
            <!-- <button type="submit" style="background:#A66914; color:white; border:none; padding:10px 20px; cursor:pointer; font-size:16px; border-radius:5px;">Update Details</button> -->
         </form>
      </div>

      <!-- Room Section -->
      <div class="room-container">
         <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="room">
               <img src="<?php echo $row['image']; ?>" alt="Room Image">
               <div class="room-content">
                  <h3><?php echo $row['name']; ?></h3>
                  <p><?php echo $row['description']; ?></p>
                  <p class="price">₹<?php echo $row['price']; ?> per night</p>
                  <form action="booking.php" method="GET" onsubmit="return checkLogin(event)">
                     <input type="hidden" name="room_id" value="<?php echo $row['id']; ?>">
                     <input type="hidden" name="checkin" value="<?php echo $checkin; ?>">
                     <input type="hidden" name="checkout" value="<?php echo $checkout; ?>">
                     <input type="hidden" name="adults" value="<?php echo $adults; ?>">
                     <input type="hidden" name="children" value="<?php echo $children; ?>">
                     <input type="hidden" name="rooms" value="<?php echo $rooms; ?>">
                     <button type="submit" >Book Now</button>
                  </form>
                  <script>
    function checkLogin(event) {
        <?php if (!isset($_SESSION["user_id"])) { ?>
            event.preventDefault(); // Stop form submission
            alert("You need to log in first!");
            window.location.href = "login.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>";
            return false;
        <?php } ?>
        return true;
    }
</script>
               </div>
            </div>

         <?php } ?>
      </div>
   </div>

   <?php include 'footer.php'; ?>
</body>

</html>