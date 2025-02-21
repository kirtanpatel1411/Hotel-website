<?php
include '../db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Directory for file uploads
$uploadDir = '../upload/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}

// Initialize variables
$editMode = false;
$roomId = $name = $description = $price = $status = $image = "";

// If "Edit" is clicked, fetch the selected room data
if (isset($_GET['edit'])) {
    $editMode = true;
    $roomId = $_GET['edit'];
    $result = $conn->query("SELECT * FROM rooms WHERE id = $roomId");
    if ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
        $status = $row['status'];
        $image = $row['image'];
    }
}

// Handle form submission for adding/updating a room
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    // Handle file upload if a new image is selected
    if (!empty($_FILES['image']['name'])) {
        $imageName = basename($_FILES['image']['name']);
        $imagePath = $uploadDir . $imageName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            $image = 'upload/' . $imageName; // Store path in database
        }
    }

    // If in edit mode, update the existing room
    if (isset($_POST['room_id']) && $_POST['room_id'] != "") {
        $roomId = $_POST['room_id'];
        $sql = "UPDATE rooms SET name='$name', description='$description', price='$price', image='$image', status='$status' WHERE id=$roomId";
        $conn->query($sql);
        echo "<script>alert('Room update successfully !'); window.location.href='add_room.php';</script>";

    } else {
        // Insert a new room
        $sql = "INSERT INTO rooms (name, description, price, image, status) VALUES ('$name', '$description', '$price', '$image', '$status')";
        $conn->query($sql);
        echo "<script>
    alert('Room added successfully!');
    window.location.href = 'add_room.php'; // Redirect to home page
</script>";
       
    }
}

// Handle room deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM rooms WHERE id=$id");
    echo "<script>
    alert('Room deleted successfully!');
    window.location.href = 'add_room.php'; // Redirect to home page
</script>";
    
    
}

// Fetch all rooms
$result = $conn->query("SELECT * FROM rooms");
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Rooms - Admin Panel</title>
   <style>
    /* General Styling */
body {
    background-color: #f4f6f9;
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
}

/* Main Container (Keeps Sidebar Intact) */
.container {
    margin-left: 270px;
    margin-right: 12px;
    padding: 0px;
    /* background: white; */
    min-height: 100vh;
}

/* Page Heading */
h2 {
    color: #A66914;
    font-size: 28px;
    text-align: center;
    margin-bottom: 20px;
}

/* Form Container */
.form-container {
    width: 50%;
    margin: auto;
    padding: 50px;
    background: white;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border: 1px solid #ddd;
}

h3 {
    color: #A66914;
    text-align: center;
    margin-bottom: 20px;
}

/* Form Input Fields */
label {
    font-weight: bold;
    margin-top: 10px;
    display: block;
}

input, textarea, select {
    width: 100%;
    padding: 12px;
    margin: 5px 0;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 16px;
}

/* Submit Button */
button {
    width: 100%;
    background-color: #A66914;
    color: white;
    padding: 12px;
    border: none;
    cursor: pointer;
    font-size: 18px;
    border-radius: 6px;
    transition: 0.3s;
}

button:hover {
    background-color: #8D5A0D;
}

/* Table Styling */
.table-container {
    margin-top: 30px;
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
}

/* Table Header */
th {
    background-color: #A66914;
    color: white;
    padding: 12px;
    font-size: 16px;
    text-transform: uppercase;
}

/* Table Rows */
td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    font-size: 14px;
    color: #333;
}

/* Image Styling */
td img {
    width: 80px;
    border-radius: 5px;
    transition: transform 0.3s ease;
}

td img:hover {
    transform: scale(1.1);
}

/* Alternate Row Colors */
tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Hover Effect */
tr:hover {
    background-color: #f1f1f1;
    transition: 0.2s ease-in-out;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 10px;
    justify-content: center;
}

.update-btn, .delete-btn {
    text-decoration: none;
    padding: 10px 14px;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
}

/* Update Button */
.update-btn {
    background-color: #28A745; /* Green */
    color: white;
}

.update-btn:hover {
    background-color: #218838;
}

/* Delete Button */
.delete-btn {
    background-color: red;
    color: white;
}

.delete-btn:hover {
    background-color: darkred;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        margin-left: 0;
        padding: 20px;
    }

    .form-container {
        width: 90%;
    }

    table {
        width: 100%;
    }

    th, td {
        padding: 10px;
        font-size: 13px;
    }
}

   </style>
</head>

<body>

<?php include 'sidebar.php'; ?>

<div class="container">
    <h2>Admin Panel - Manage Rooms</h2>

    <!-- Add/Edit Room Form -->
    <div class="form-container">
        <h3><?php echo $editMode ? "Edit Room" : "Add New Room"; ?></h3>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="room_id" value="<?php echo $editMode ? $roomId : ''; ?>">
            <label>Room Name:</label>
            <input type="text" name="name" required value="<?php echo $name; ?>">

            <label>Room Description:</label>
            <textarea name="description" required><?php echo $description; ?></textarea>

            <label>Price:</label>
            <input type="number" name="price" required value="<?php echo $price; ?>">

            <label>Upload Image:</label>
            <input type="file" name="image">
            <?php if ($editMode && !empty($image)) { ?>
                <div class="image-preview">
                    <p>Current Image:</p>
                    <img src="../<?php echo $image; ?>" width="100">
                </div>
            <?php } ?>

            <label>Status:</label>
            <select name="status">
                <option value="Available" <?php echo ($status == 'Available') ? 'selected' : ''; ?>>Available</option>
                <option value="Booked" <?php echo ($status == 'Booked') ? 'selected' : ''; ?>>Booked</option>
            </select>

            <button type="submit"><?php echo $editMode ? "Update Room" : "Add Room"; ?></button>
        </form>
    </div>

    <!-- Existing Rooms Table -->
    <h3>Existing Rooms</h3>
    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>₹<?php echo $row['price']; ?></td>
                    <td><img src="../<?php echo $row['image']; ?>" width="80"></td>
                    <td><?php echo $row['status']; ?></td>
                    <td class="action-buttons">
                        <a href="add_room.php?edit=<?php echo $row['id']; ?>" class="update-btn">Edit</a>
                        <a href="add_room.php?delete=<?php echo $row['id']; ?>" class="delete-btn">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>
