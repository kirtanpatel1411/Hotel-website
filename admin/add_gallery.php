<?php
include '../db.php';
include 'sidebar.php';
$uploadDir = '../upload/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $imageName = basename($_FILES['image']['name']);
    $imagePath = $uploadDir . $imageName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        $imageDBPath = './upload/' . $imageName;
        $sql = "INSERT INTO gallery (image) VALUES ('$imageDBPath')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>
    alert('Image Added Sucessfully!');
    window.location.href = 'add_gallery.php'; // Redirect to home page
</script>";
        } else {
            echo "Database error: " . $conn->error;
        }
    } else {
        echo "<script>
    alert('File upload failed. Check folder permissions.');
    window.location.href = 'add_gallery.php'; // Redirect to home page
</script>";
    }
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM gallery WHERE id=$id");
    echo "<script>
    alert('image deleted successfully!');
    window.location.href = 'add_gallery.php'; // Redirect to home page
</script>";
}


$result = $conn->query("SELECT * FROM gallery");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Upload Gallery Image</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            display: flex;
        }


        .sidebar {
            width: 250px;
            position: fixed;
            height: 100%;
            background: #A66914;

        }

        .container {
            margin-left: 260px;
            padding: 30px;
            width: calc(100% - 260px);
            min-height: 100vh;

            text-align: center;
        }


        h2 {
            color: #A66914;
            font-size: 26px;
            margin-bottom: 20px;
        }


        form {
            width: 50%;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid #ddd;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }


        input[type="file"] {
            padding: 10px;
            border: 2px solid #A66914;
            border-radius: 6px;
            width: 80%;
            background: white;
            cursor: pointer;
        }


        button {
            width: 80%;
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


        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }


        th {
            background-color: #A66914;
            color: white;
            padding: 12px;
            font-size: 16px;
            text-transform: uppercase;
        }


        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
            color: #333;
            text-align: center;
        }


        td img {
            width: 80px;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        td img:hover {
            transform: scale(1.1);
        }


        .delete-btn {
            display: inline-block;
            background: #e74c3c;
            color: white;
            padding: 8px 14px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
            font-weight: bold;
        }

        .delete-btn:hover {
            background: #c0392b;
            transform: scale(1.05);
        }


        @media (max-width: 768px) {
            .container {
                margin-left: 0;
                width: 100%;
                padding: 20px;
            }

            form {
                width: 80%;
            }

            table {
                width: 100%;
            }

            th,
            td {
                padding: 10px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Upload Image</h2>
        <form action="add_gallery.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" required>
            <button type="submit">Upload</button>
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Action</th>

        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><img src="../<?php echo $row['image']; ?>" width="100"></td>
                <td>
                    <a href="add_gallery.php?delete=<?php echo $row['id']; ?>" class="delete-btn">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>