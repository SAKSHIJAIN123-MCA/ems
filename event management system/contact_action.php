<?php
session_start();
$ename = $_REQUEST['name'];
$dname = $_REQUEST['dname'];
$email = $_REQUEST['emailid'];
$etype = ($_REQUEST['etype']);
$nattendees = ($_REQUEST['eattendees']);
$date = $_REQUEST['date_allow_empty'];
$dvenue = $_REQUEST['dvenue'];
$price = $_REQUEST['price'];
$des = $_REQUEST['submitted'];
require("connection.php");

// Assuming your connection is established in connection.php using mysqli_connect
$sql = "INSERT INTO events(userid, name, dname, emailid, etype, eattendees, date, dvenue, price, description) 
        VALUES (" . $_SESSION['id'] . ", '$ename', '$dname', '$email', '$etype', '$nattendees', '$date', '$dvenue', '$price', '$des')";

$result = mysqli_query($conn, $sql); // $conn is your mysqli connection object

if ($result) {
    header("Location: contact.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
