<?php
$connection = mysqli_connect("localhost", "root", "", "admin");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
