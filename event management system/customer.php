<?php
// Database connection parameters
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "admin"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Message = $_POST['Message'];
    
    // SQL query to insert data into 'help' table
    $sql = "INSERT INTO help (Name, Email, Message) VALUES ('$Name', '$Email', '$Message')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Message sent successfully!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner with Customer Help Support</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        /* Customer support section */
        .customer-support {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            max-width: 800px;
            padding: 40px;
            text-align: center;
        }

        .customer-support h2 {
            color: #333;
            font-size: 32px;
            margin-bottom: 20px;
        }

        .customer-support p {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* Contact form styles */
        .contact-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-group {
            width: 100%;
            margin-bottom: 20px;
        }

        .input-group input,
        .input-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        .input-group input:focus,
        .input-group textarea:focus {
            outline: none;
            border-color: #007bff;
        }

        .input-group button {
            background-color: #007bff;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 12px 30px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .input-group button:hover {
            background-color: #0056b3;
        }

        /* Additional styles */
        .customer-support img {
            max-width: 100%;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Customer support section -->
    <div class="customer-support">
        <h2>Get Instant Help!</h2>
        <img src="helper.jpeg" alt="Customer Support" />
        <p>Contact our 24/7 support team for quick assistance.</p>
        <!-- Contact form -->
        <form action="customer.php" method="post" class="contact-form">
            <div class="input-group">
                <input type="text" name="Name" placeholder="Your Name" required>
            </div>
            <div class="input-group">
                <input type="email" name="Email" placeholder="Your Email" required>
            </div>
            <div class="input-group">
                <textarea name="Message" placeholder="Your Message" rows="4" required></textarea>
            </div>
            <div class="input-group">
                <button type="submit">Send Message</button>
            </div>
        </form>
       
    </div>
    <!-- Additional content and scripts -->
</body>
</html>
