<?php
session_start();

// Database connection parameters
$servername = "localhost"; // Replace 'localhost' with your server name if necessary
$username = "root"; // Replace 'username' with your MySQL username
$password = ""; // Replace 'password' with your MySQL password
$dbname = "admin"; // Replace 'database_name' with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, "", $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Server-side validation
    $errors = array();

    // Validate First Name
    if (empty($_POST['FirstName'])) {
        $errors[] = "First Name is required";
    } elseif (!preg_match("/^[a-zA-Z'-]+$/", $_POST['FirstName'])) {
        $errors[] = "Only letters and white space allowed for First Name";
    } else {
        $FirstName = $_POST['FirstName'];
    }

    // Validate Last Name
    if (empty($_POST['LastName'])) {
        $errors[] = "Last Name is required";
    } elseif (!preg_match("/^[a-zA-Z'-]+$/", $_POST['LastName'])) {
        $errors[] = "Only letters and white space allowed for Last Name";
    } else {
        $LastName = $_POST['LastName'];
    }

    // Validate Email
    if (empty($_POST['email'])) {
        $errors[] = "Email is required";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    } else {
        $email = $_POST['email'];
    }

    // Validate Feedback
    if (empty($_POST['feedback'])) {
        $errors[] = "Feedback is required";
    } elseif (!preg_match("/^[a-zA-Z\s']+$/", $_POST['feedback'])) {
        $errors[] = "Only letters, spaces, and apostrophes allowed for Feedback";
    } else {
        $feedback = $_POST['feedback'];
    }

    // If there are no errors, proceed with inserting data into the database
    if (empty($errors)) {
        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO feedback (FirstName, LastName, email, feedback) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $FirstName, $LastName, $email, $feedback);

        // Set parameters and execute
        $stmt->execute();

        // Close statement
        $stmt->close();

        // Close connection
        $conn->close();
    } else {
        // If there are errors, store them in session and redirect back to the form page
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST;
        header("Location: feedback.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Feedback</title>
<style>
    /* Your CSS styles here */
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    .errors {
        background-color: #ffe6e6;
        color: #cc0000;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }
    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 8px 16px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        font-weight: bold;
    }
    .message {
        text-align: center;
        margin-top: 20px;
        color: #333;
    }
</style>
</head>
<body>

<div class="container">
    <img src="feedback.jpeg" alt="Feedback Image" style="max-width: 100%; height: auto;">
    <img src="icon.jpg" alt="Feedback Image" style="max-width: 50%; height: repeat-y;">

    <h2>Customer Feedback Form</h2>

    <?php if (isset($_SESSION['errors'])): ?>
        <div class="errors">
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>

    <form action="feedback.php" method="post">
        <div class="form-group">
            <label for="FirstName">First Name:</label>
            <input type="text" id="FirstName" name="FirstName" required pattern="[A-Za-z]{1,32}" value="<?php echo isset($_SESSION['old']['FirstName']) ? $_SESSION['old']['FirstName'] : '' ?>">
        </div>

        <div class="form-group">
            <label for="LastName">Last Name:</label>
            <input type="text" id="LastName" name="LastName" required pattern="[A-Za-z]{1,32}" value="<?php echo isset($_SESSION['old']['LastName']) ? $_SESSION['old']['LastName'] : '' ?>">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : '' ?>">
        </div>

        <div class="form-group">
            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" rows="4" required><?php echo isset($_SESSION['old']['feedback']) ? $_SESSION['old']['feedback'] : '' ?></textarea>
        </div>

        <input type="submit" value="Submit">
    </form>

    <div class="message">
        We value your feedback! Please share your thoughts with us.
    </div>
</div>

</body>
</html>
