<?php
$id = $_GET['id'];
require('connection.php');

$sql = "DELETE FROM events WHERE id=$id";

if ($connection->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Data deleted successfully!');window.location.href='fetch_status.php';</script>";
} else {
    echo "Error deleting record: " . $connection->error;
}

$connection->close();
?>
