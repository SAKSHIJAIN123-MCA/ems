<?php
require("connection.php");

function NewUser()
{
    global $conn;
    $userid = $_POST['userid'];
    $passid = md5($_POST['passid']);
    $username = $_POST['username'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $zip = $_POST['zip'];
    $email = $_POST['email'];
    $gender = $_POST['sex'];

    $stmt = $conn->prepare("INSERT INTO users (username, passid, name, address, country, zip, email, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $userid, $passid, $username, $address, $country, $zip, $email, $gender);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "YOUR REGISTRATION IS COMPLETED...";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

function SignUp()
{
    global $conn;
    if (!empty($_POST['userid'])) {
        $userid = $_POST['userid'];
        $passid = md5($_POST['passid']);

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND passid = ?");
        $stmt->bind_param("ss", $userid, $passid);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
        } else {
            NewUser();
        }

        $stmt->close();
    }
}

if (isset($_POST['submit'])) {
    SignUp();
}

header("location:sign-up.html");
?>
