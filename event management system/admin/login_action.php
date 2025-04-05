<?php
session_start();
$username = $_REQUEST['username'];
$password = md5($_REQUEST['password']);
require("connection.php");

// Create connection
$connection = mysqli_connect("localhost:3307", "root", "", "admin");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM admin_login WHERE username='$username' AND password='$password'";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['login'] = "true";
    $row = mysqli_fetch_assoc($result);
    $_SESSION['name'] = $row['username'];
    ?>
    <script type="text/javascript" language="javascript">
        alert("Login successful");
        window.location.href = "index-digital.php";
    </script>
    <?php
} else {
    ?>
    <script type="text/javascript" language="javascript">
        alert("Invalid username and password");
        window.location.href = "login_admin.php";
    </script>
    <?php
}
?>
