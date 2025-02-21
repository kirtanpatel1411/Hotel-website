    <?php
    session_start();
    include 'db.php';
    include 'header.php';


    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $checkin = $_GET['checkin'] ?? "";
        $checkout = $_GET['checkout'] ?? "";
        $adults = $_GET['adults'] ?? "";
        $children = $_GET['children'] ?? "";
        $rooms = $_GET['rooms'] ?? "";
    }

    // Fetch room details from URL parameters
    if (isset($_GET['room_id'])) {
        $room_id = $_GET['room_id'];
        $sql = "SELECT * FROM rooms WHERE id = '$room_id'";
        $result = $conn->query($sql);
        $room = $result->fetch_assoc();
    } else {
        echo "<script>alert('No room selected!'); window.location.href='rooms.php';</script>";
        exit;
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = $_SESSION['user_id'];
        $room_name = $_POST['room_name'];
        $price = $_POST['price'];
        $customer_name = $_POST['customer_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $check_in = $_POST['check_in'];
        $check_out = $_POST['check_out'];
        $adults = $_POST['adults'];
        $children = $_POST['children'];
        $rooms = $_POST['rooms'];
        $total_price = $_POST['total_price'];
        $status=$_POST['status'];

        $sql = "INSERT INTO booking (user_id,room_id,room_name, customer_name, email, phone, check_in, check_out, adults, children, rooms, total_price,status) VALUES ('$user_id','$room_id','$room_name', '$customer_name', '$email','$phone', '$check_in', '$check_out', '$adults', '$children', '$rooms', '$total_price','pending')";

        if ($conn->query($sql) === TRUE) {
            $booking_id = $conn->insert_id;
            header("Location: payment.php?booking_id=$booking_id");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Now</title>
        <script>
            function calculateTotal() {
                let pricePerNight = parseFloat(document.getElementById('price').value);
                let checkIn = document.getElementById('check_in').value;
                let checkOut = document.getElementById('check_out').value;
                let rooms = parseInt(document.getElementById('rooms').value);

                if (checkIn && checkOut && !isNaN(pricePerNight) && !isNaN(rooms)) {
                    let checkInDate = new Date(checkIn);
                    let checkOutDate = new Date(checkOut);
                    let timeDiff = checkOutDate.getTime() - checkInDate.getTime();
                    let days = timeDiff / (1000 * 3600 * 24);

                    if (days > 0) {
                        let totalPrice = days * pricePerNight * rooms;
                        document.getElementById('total_price').value = totalPrice.toFixed(2);
                    } else {
                        document.getElementById('total_price').value = "Invalid Dates";
                    }
                } else {
                    document.getElementById('total_price').value = "";
                }
            }

            // Auto calculate total on page load if values are pre-filled
            window.onload = function() {
                calculateTotal();
            };
        </script>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f8f8f8;
                padding-top: 100px;

            }

            .reservation {
                text-align: center;
                padding: 20px;
                max-width: 1000px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 4px;
                
            }

            .container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
                /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 4px; */
            }

            .box {
                width: 300px;
                margin-bottom: 15px;
                font-size: 20px;
            }

            .input {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 20px;
                font-weight: 600;
            }

            .btn {
                background-color: #A66914;
                color: white;
                padding: 10px 20px;
                border: none;
                cursor: pointer;
                font-size: 16px;
                border-radius: 5px;
            }

            .btn:hover {
                background-color: #8A5410;
            }
        </style>
    </head>

    <body>
        
        <div class="container">
            <section class="reservation" id="reservation">
                <h1 class="heading">Book Now</h1>
                <form action="" method="POST">
                    <div class="container">
                        <div class="box">
                            <p>Room Name</p>
                            <input type="text" class="input" name="room_name" value="<?php echo $room['name']; ?>" readonly>
                        </div>
                        <div class="box">
                            <p>Price per Night</p>
                            <input type="text" class="input" id="price" name="price" value="<?php echo $room['price']; ?>" readonly>
                        </div>
                        <div class="box">
                            <p>Name <span>*</span></p>
                            <input type="text" class="input" name="customer_name" required>
                        </div>
                        <div class="box">
                            <p>Email <span>*</span></p>
                            <input type="email" class="input" name="email" required>
                        </div>
                        <div class="box">
                            <p>Phone <span>*</span></p>
                            <input type="number" class="input" name="phone" required>
                        </div>
                        <div class="box">
                            <p>Check In <span>*</span></p>
                            <input type="date" class="input" id="check_in" name="check_in" value="<?php echo $checkin; ?>" required onchange="calculateTotal()">
                        </div>
                        <div class="box">
                            <p>Check Out <span>*</span></p>
                            <input type="date" class="input" id="check_out" name="check_out" value="<?php echo $checkout; ?>" required onchange="calculateTotal()">
                        </div>
                        <div class="box">
                            <p>Adults <span>*</span></p>
                            <select name="adults" class="input" required>
                                <option value="1" <?php if ($adults == "1") echo "selected"; ?>>1 Adult</option>
                                <option value="2" <?php if ($adults == "2") echo "selected"; ?>>2 Adults</option>
                                <option value="3" <?php if ($adults == "3") echo "selected"; ?>>3 Adults</option>
                                <option value="4" <?php if ($adults == "4") echo "selected"; ?>>4 Adults</option>
                            </select>
                        </div>
                        <div class="box">
                            <p>Children</p>
                            <select name="children" class="input" required>

                                <option value="1" <?php if ($children == "1") echo "selected"; ?>>1 Child</option>
                                <option value="2" <?php if ($children == "2") echo "selected"; ?>>2 Children</option>
                                <option value="3" <?php if ($children == "3") echo "selected"; ?>>3 Children</option>
                                <option value="4" <?php if ($children == "4") echo "selected"; ?>>4 Children</option>

                            </select>
                        </div>
                        <div class="box">
                            <p>Rooms <span>*</span></p>
                            <select name="rooms" class="input" id="rooms" required onchange="calculateTotal()">
                                <option value="1" <?php if ($rooms == "1") echo "selected"; ?>>1 Room</option>
                                <option value="2" <?php if ($rooms == "2") echo "selected"; ?>>2 Rooms</option>
                                <option value="3" <?php if ($rooms == "3") echo "selected"; ?>>3 Rooms</option>
                                <option value="4" <?php if ($rooms == "4") echo "selected"; ?>>4 Rooms</option>
                            </select>
                        </div>
                        <div class="box">
                            <p>Total Price</p>
                            <input type="text" class="input" id="total_price" name="total_price" readonly>
                        </div>
                    </div>

                    <input type="submit" name="submit" value="Proceed to Payment" class="btn">
                </form>
            </section>
        </div>
        <?php include 'footer.php'; ?>
    </body>

    </html>