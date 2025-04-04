<?php
include('connect.php');

if(isset($_POST['event_type'], $_POST['event_description'])) {
    $event_type = $_POST['event_type'];
    $event_description = $_POST['event_description'];

    // Check if a file was uploaded
    if(isset($_FILES['event_image']) && $_FILES['event_image']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['event_image']['name'];
        $file_tmp = $_FILES['event_image']['tmp_name'];
        $file_type = $_FILES['event_image']['type'];

        // Check file type and size if necessary
        // Move uploaded file to the desired directory
        move_uploaded_file($file_tmp, "image/" . $file_name);

        // Update the event in the database with the new Event Image
        $sql = "UPDATE event SET Event_description='$event_description', Event_image='$file_name' WHERE Event_type='$event_type'";
        $res = mysqli_query($connection, $sql);

        if($res) {
            echo "<script>alert('Event updated');</script>";
            // Redirect back to eventall.php or any other page
            header('Location: eventall.php');
            exit();
        } else {
            echo "Error updating event: " . mysqli_error($connection);
        }
    } else {
        echo "Error uploading file.";
    }
}
?>
