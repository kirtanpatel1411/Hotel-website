<?php
session_start();

include 'db.php';
include 'header.php';
?>

<?php
$sql = "SELECT * FROM gallery";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html>

<head>
    <title>Gallery</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }


        body {
            background-color: #f4f4f4;
            color: #333;

            padding: 20px;
            padding-top: 150px;
        }


        h2 {
            font-size: 45px;
            margin-bottom: 20px;
            text-align: center;
        }


        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }


        .gallery img {
            width: 400px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }


        .gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }


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
        <?php while ($row = $result->fetch_assoc()) { ?>
            <img src="<?php echo  $row['image']; ?>">
        <?php } ?>
    </div>





    <?php
    include 'footer.php';
    ?>


</body>

</html>