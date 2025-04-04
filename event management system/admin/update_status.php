<?php
require("connection.php");
$id = $_GET['id'];

$sql = "UPDATE events SET status='1' WHERE id=$id";

if (mysqli_query($connection, $sql)) {
    header("location:fetch_status.php");
} else {
    echo "Error updating record: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
