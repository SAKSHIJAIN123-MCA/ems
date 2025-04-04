
<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form Data</title>
    <h3> CUSTOMER'S REVIEWS </h3>
    <style>
   

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-family: Arial, sans-serif;
        border-radius: 8px;
        overflow: hidden;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 12px;
        text-align: left;
    }
    th {
        background-color: #f7f7f7;
        font-weight: bold;
    }
    table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Arial', sans-serif;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
    transition: background-color 0.3s ease;
}

th {
    background-color:#ab47bc; /* Elegant coral color */
    color: white;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    position: sticky;
    top: 0;
    z-index: 1;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

td {
    font-size: 15px;
    color: #555;
}

td:first-child {
    font-weight: bold;
    color: #333;
}

td:last-child {
    text-align: center;
}

.caption {
    caption-side: top;
    font-size: 18px;
    font-weight: bold;
    color: #ff6f61;
    padding: 10px 0;
}



</style>


</head>
<body>
<?php
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

// SQL query to fetch feedback data
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Feedback</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["email"] . "</td>
                <td>" . $row["FirstName"] . "</td>
                <td>" . $row["LastName"] . "</td>
                <td>" . $row["feedback"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No feedback data available.";
}

// Close connection
$conn->close();
?>
    <!-- Your PHP code here to display the feedback table -->
</body>
</html>

