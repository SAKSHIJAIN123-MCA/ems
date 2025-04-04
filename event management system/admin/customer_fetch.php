<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Table</title>
<h>CUSTOMER HELP DATA</h>
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
    background-color: #ff6f61; /* Elegant coral color */
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

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "admin";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to fetch data from 'help' table
        $sql = "SELECT * FROM help";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Name"]. "</td>";
                echo "<td>" . $row["Email"]. "</td>";
                echo "<td>" . $row["Message"]. "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>0 results</td></tr>";
        }

        // Close connection
        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>
