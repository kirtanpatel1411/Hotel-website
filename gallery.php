<?php
session_start();

include'db.php';
include'header.php';
?>

<?php
$sql="SELECT * FROM gallery";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Gallery</title>
    <style>
      
        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Body Styling */
body {
    background-color: #f4f4f4;
    color: #333;
    /* text-align: center; */
    padding: 20px;
    padding-top: 150px;
}

/* Page Title */
h2 {
    font-size: 45px;
    margin-bottom: 20px;
    text-align: center;
}

/* Gallery Container */
.gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px;
}

/* Gallery Item */
.gallery img {
    width: 400px;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s, box-shadow 0.3s;
}

/* Hover Effect */
.gallery img:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

/* Responsive Design */
@media (max-width: 600px) {
    .gallery {
        flex-direction: column;
        align-items: center;
    }
}

    </style>
</head>
<body>
    <h2>Gallery</h2>
    <div class="gallery">
        <?php while($row = $result->fetch_assoc()) { ?>
            <img src="<?php echo  $row['image']; ?>" >
        <?php } ?>
    </div>





   <?php
include'footer.php';
?>


</body>
</html>