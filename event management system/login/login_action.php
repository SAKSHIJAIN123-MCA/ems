<?php 
session_start();

$uname = $_REQUEST['txtuname'];
$password = md5($_REQUEST['txtpass']);

require("connection.php");

$sql = "select * from users where username='$uname' and passid='$password'";
$result = mysqli_query($connection, $sql); // Assuming your connection variable is $conn

if(mysqli_num_rows($result) > 0) {
    $_SESSION['login'] = "true";
    $row = mysqli_fetch_assoc($result);
    $_SESSION['name'] = $row['name'];
    $_SESSION['id'] = $row['id'];  
    // Proceed with your logic after successful login
    echo '<script type="text/javascript" language="javascript">
        alert("Login Successfully");
        window.location.href="../my_event.php";
    </script>';
} else {
    echo '<script type="text/javascript" language="javascript">
        alert("Invalid username and password");
        window.location.href="login_form.php";
    </script>';
}
?>
