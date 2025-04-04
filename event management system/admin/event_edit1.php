<?php
include('connect.php');

if(isset($_GET['id'])) {
    $event_type = $_GET['id'];
    
    // Fetch the event details from the database using the event ID
    $sql = "SELECT * FROM event WHERE Event_type='$event_type'";
    $res = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($res);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        @media only screen and (max-width: 600px) {
            form {
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <h1>Edit Event</h1>
    <form action="update_event.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="event_type" value="<?php echo $row['Event_type']; ?>">
        <label for="event_description">Event Description:</label><br>
        <input type="text" id="event_description" name="event_description" value="<?php echo $row['Event_description']; ?>"><br>
        
        <!-- Add input field for Event Image -->
        <label for="event_image">Event Image:</label><br>
        <input type="file" id="event_image" name="event_image"><br><br>
        
        <input type="submit" value="Save Changes">
    </form>
</body>
</html>
