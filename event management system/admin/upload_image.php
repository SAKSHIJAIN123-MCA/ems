<?php
$fname = $_FILES['image']['name'];
$fsize = $_FILES['image']['size'];
$ftype = $_FILES['image']['type'];
$ftmp = $_FILES['image']['tmp_name'];
$path = "image/" . $fname;

require("connection.php");

$sql = "INSERT INTO images(image) VALUES ('$path')";
mysqli_query($connection, $sql); // Assuming $connection is your database connection variable

move_uploaded_file($ftmp, $path);

header("location:image_event.php");
?>
