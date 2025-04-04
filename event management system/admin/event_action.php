<?php
// Include database connection
require("connection.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input to prevent SQL injection
    $eventName = mysqli_real_escape_string($connection, $_POST['event']);
    $eventDesc = mysqli_real_escape_string($connection, $_POST['event_description']);

    // SQL query to insert data into event_table
    $sql = "INSERT INTO event_table (event_name, description) VALUES ('$eventName', '$eventDesc')";

    // Execute query and check for success
    if (mysqli_query($connection, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    // Close database connection
    mysqli_close($connection);
} else {
    // Redirect to adminevent.php if form is not submitted
    header("location: adminevent.php");
    exit; // Exit to prevent further execution
}
?>
