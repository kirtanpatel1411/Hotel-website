<?php
include '../db.php';






if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_offer'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $discount_percentage = $_POST['discount_percentage'];
    $valid_until = $_POST['valid_until'];


    $sql = "INSERT INTO offers (title, description,  discount_percentage,valid_until) 
                    VALUES ('$title', '$description','$discount_percentage','$valid_until')";
    if ($conn->query($sql)) {
        echo "<script>alert('Offer added successfully!'); window.location.href='add_offer.php';</script>";
    } else {
        echo "<script>alert('Database error: " . $conn->error . "');</script>";
    }
}




if (isset($_GET['delete'])) {
    $id = $_GET['delete'];



    $conn->query("DELETE FROM offers WHERE id='$id'");
    echo "<script>alert('Offer deleted successfully!'); window.location.href='add_offer.php';</script>";
}


$offers = $conn->query("SELECT * FROM offers ORDER BY id DESC");
?>
<?php include 'sidebar.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Offers</title>
    <link rel="stylesheet" href="admin_style.css">
    <style>
        .main-content {
            margin-left: 270px;
            width: calc(100% - 270px);
            padding: 20px;
            background-color: #F8F9FA;
        }


        h1,
        h2 {
            color: #343A40;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        form {
            background: white;
            max-width: 500px;
            margin: 20px auto;
            padding: 55px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #E0E0E0;
        }

            input,
            textarea {
                width: 100%;
                padding: 12px;
                margin: 10px 0;
                border: 1px solid #CED4DA;
                border-radius: 5px;
                font-size: 16px;
                background-color: #FFF;
                color: #495057;
            }


            button {
                width: 100%;
                background: #343A40;
                color: white;
                padding: 12px;
                border: none;
                cursor: pointer;
                border-radius: 5px;
                font-size: 16px;
                transition: 0.3s;
            }




            table {
                width: 90%;
                margin: 20px auto;
                border-collapse: collapse;
                background: white;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                overflow: hidden;
            }

            th,
            td {
                border: 1px solid #ddd;
                padding: 12px;
                text-align: center;
            }

            th {
                background: #343A40;
                color: white;
                font-size: 16px;
                text-transform: uppercase;
            }

            td {
                font-size: 15px;
                color: #333;
            }


            .delete-btn {
                background: #DC3545;
                color: white;
                padding: 6px 12px;
                text-decoration: none;
                border-radius: 5px;
                font-size: 14px;
                transition: 0.3s;
            }

            .delete-btn:hover {
                background: #C82333;
            }


            @media screen and (max-width: 768px) {
                .sidebar {
                    width: 100%;
                    height: auto;
                    position: relative;
                }

                .main-content {
                    margin-left: 0;
                    width: 100%;
                }

                table {
                    width: 100%;
                }
            }
    </style>
</head>

<body>
    <div class="main-content">

        <h1>Manage Offers</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Offer Title" required>
            <textarea name="description" placeholder="Offer Description" required></textarea>
            <input type="number" name="discount_percentage" placeholder="Discount %" required>

            <input type="date" name="valid_until" required>
            <button type="submit" name="add_offer">Add Offer</button>
        </form>


        <h2>All Offers</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Discount (%)</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $offers->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td style="color: red;"><?php echo htmlspecialchars($row['discount_percentage']); ?>%</td>
                    <td>
                        <a href="?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>