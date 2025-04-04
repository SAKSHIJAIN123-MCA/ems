<?php
session_start();
$ename = $_REQUEST['name'];
$dname = $_REQUEST['dname'];
$phone = $_REQUEST['pnumber'];
$email = $_REQUEST['emailid'];
$etype = $_REQUEST['etype'];
$nattendees = $_REQUEST['eattendees'];
$date = $_REQUEST['date_allow_empty'];
$dvenue = $_REQUEST['dvenue'];
$price = $_REQUEST['price'];
$des = $_REQUEST['submitted'];
require("connection.php");

// Check if $_SESSION['id'] is set and not null
if(isset($_SESSION['id']) && $_SESSION['id'] !== null) {
    // Assuming your connection is established in connection.php using mysqli_connect
    $sql = "INSERT INTO events (userid, name, dname, pnumber, emailid, etype, eattendees, date, dvenue, price, description) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
       
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    
    if($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "isssssissss", $_SESSION['id'], $ename, $dname, $phone, $email, $etype, $nattendees, $date, $dvenue, $price, $des);
           
        // Execute the statement
        $result = mysqli_stmt_execute($stmt);
    
        if ($result) {
            header("Location: contact.php");
        } else {
            echo "Error executing statement: " . mysqli_stmt_error($stmt);
        }
    
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
} else {
    echo "booking confirm.";
}

mysqli_close($conn);
?>

<html>
    <head>
        <body>
  
<footer id="foot">
<nav><a href="index.php">Home</a> | 
  <a href="event.php">Events</a> | 
 
</footer>
 
</html>
</head>
</body>