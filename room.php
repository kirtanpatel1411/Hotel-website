<?php
session_start();


include 'db.php';
include 'header.php';


// $checkin = $checkout = $adults = $children = $rooms = "";


if ($_SERVER["REQUEST_METHOD"] == "GET") {
   $checkin = $_GET['checkin'] ?? "";
   $checkout = $_GET['checkout'] ?? "";
   $adults = $_GET['adults'] ?? "";
   $children = $_GET['child'] ?? "";
   $rooms = $_GET['rooms'] ?? "";
   $price = $_GET['price'] ?? "";
} 
if(isset($_GET['price']) || isset($_POST['price'])) { 
   $price = isset($_GET['price']) ? $_GET['price'] : $_POST['price'];
   // $price = $_GET['price'];
   $sql = "SELECT * FROM rooms WHERE price <= '$price'";
   $result = mysqli_query($conn, $sql);
}else{
   $sql = "SELECT * FROM rooms WHERE status='Available'";
   $result = $conn->query($sql);
   
}
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

         align-items: flex-start;

         margin: 50px auto;
         gap: 80px;
         padding: 20px;
      }


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


      .room-container {
         flex: 2;
         display: flex;
         flex-direction: column;

         gap: 20px;
         justify-content: flex-start;
         max-width: 1000px;
      }


      .room {
         display: flex;

         align-items: center;
         background: #fff;
         border-radius: 4px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         overflow: hidden;
         width: 100%;

         max-width: 1000px;

         padding: 12px;
         gap: 15px;
      }


      .room img {
         width: 40%;

         height: 180px;
         object-fit: cover;
         border-radius: 4px;
      }


      .room-content {
         flex: 1;
         display: flex;
         flex-direction: column;
         justify-content: center;
         padding: 10px;
      }


      .room h3 {
         color: #A66914;
         margin-bottom: 5px;
         font-size: 20px;
      }


      .room p {
         color: #333;
         margin-bottom: 5px;
      }


      .room .price {
         font-size: 18px;
         font-weight: bold;
         color: #4CAF50;
         margin-bottom: 10px;
         text-align: left;

      }


      .room button {
         background-color: #A66914;
         color: white;
         border: none;
         padding: 8px 16px;

         cursor: pointer;
         font-size: 16px;
         border-radius: 5px;
         transition: 0.3s;
         width: auto;

      }

      .room button:hover {
         background-color: #8A5410;
      }
      form button {
         background-color: #A66914;
         color: white;
         border: none;
         padding: 8px 16px;

         cursor: pointer;
         font-size: 16px;
         border-radius: 5px;
         transition: 0.3s;
         width: auto;

      }

      form button:hover {
         background-color: #8A5410;
      }


      @media (max-width: 768px) {
         .room {
            flex-direction: column;

            text-align: center;
            align-items: center;
         }

         .room img {
            width: 100%;

            height: auto;
         }

         .room .price {
            text-align: center;

         }
      }
   </style>
</head>

<body>

   <h1 style="text-align: center; color: #A66914;">Available Rooms</h1>

   <div class="container">

      <div class="form-section">
         <h2>Booking Details</h2>
         <form action="" method="">
            <div class="box">
               <p>Check In <span>*</span></p>
               <input type="date" class="input" name="checkin" value="<?php echo $checkin; ?>" >
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
            <!-- <div class="box">
               <p>price <span>*</span></p>
               <input type="number" class="input" name="price" value="<?php //echo $price; ?>" required>
            </div> -->
         </form>
            <form action="room.php" method="POST">
            <div class="box">
        <p>Price <span>*</span></p>
        <select name="price" class="input">
            <option value="2000" <?php if ($price == "2000") echo "selected"; ?>>Under 2000</option>
            <option value="3000" <?php if ($price == "3000") echo "selected"; ?>>Under 3000</option>
            <option value="8000" <?php if ($price == "8000") echo "selected"; ?>>Under 8000</option>
            <option value="14000" <?php if ($price == "14000") echo "selected"; ?>>Under 14000</option>
            <option value="18000" <?php if ($price == "18000") echo "selected"; ?>>Under 18000</option>
        </select>
    </div>
      <button type="submit">Update</button>
         </form>
      </div>


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
                     <button type="submit">Book Now</button>
                  </form>
                  <script>
                     function checkLogin(event) {
                        <?php if (!isset($_SESSION["user_id"])) { ?>
                           event.preventDefault();
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