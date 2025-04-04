<?php
session_start();
$id = $_GET['id'];
require('connection.php');

$sql = "SELECT date FROM events WHERE userid=" . $_SESSION['id'];
$result = mysqli_query($conn, $sql); // Assuming $conn is your MySQLi connection object
if ($result) {
    $row = mysqli_fetch_array($result);
    if ($row) {
        $cr_date = $row['date'];
    }
}

if (date("m/d/Y") >= $cr_date) {
    $sql = "UPDATE events SET status=2 WHERE id=$id";
    mysqli_query($conn, $sql);
    header("location: my_event.php");
} else if ($cr_date <= date("m/d/Y", strtotime("-7 days"))) {
    $sql = "UPDATE events SET status=2 WHERE id=$id";
    mysqli_query($conn, $sql);
    echo "<script type='text/javascript'>alert('You have canceled your event!'); window.location.href='my_event.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Your event cancel after some time.'); window.location.href='my_event.php';</script>";
}
?>
