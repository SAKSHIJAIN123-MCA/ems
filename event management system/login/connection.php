<?php
$connection = mysqli_connect("localhost:3307", "root", "", "admin");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
