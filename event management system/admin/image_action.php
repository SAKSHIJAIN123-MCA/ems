<?php
$id = $_GET['id'];
$fname = $_FILES['image']['name'];
$ftmp = $_FILES['image']['tmp_name'];
$oldimage = $_POST['old_image'];
$path = "image/" . $fname;

move_uploaded_file($ftmp, $path);

require("connection.php");

if ($fname != "") {
    if (file_exists($oldimage)) {
        unlink($oldimage);
    }

    $stmt = $connection->prepare("UPDATE images SET image=? WHERE id=?");
    $stmt->bind_param("si", $path, $id);
    $stmt->execute();
    $stmt->close();
}

header("location: image_fetch.php");
?>
