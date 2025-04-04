
<?php session_start();?>

<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

// Create a MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_REQUEST['id'];

$sql = "SELECT * FROM images WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Process the data
} else {
    echo "No results found.";
}

// Close the connection (optional, as it will automatically close at the end of the script)
$conn->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php include 'head.php'; ?>


</head>

<body>


<div style="margin-top:20px;">

<div id="admin">
Welcome: admin</div>

<div id="hm">
<a href="index-digital.php">Home</a>
</div>
<div style="clear: both;"></div>
<script>
	$("#imageform")[0].reset();
</script>
<h1>IMAGES OF EVENTS</h1>
<div id="upload-wrapper">
<div align="center">
<h3>Image Uploader</h3>
<form action="image_action.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data" id="MyUploadForm">


	
<input name="image" id="imageInput" type="file">
<img src='<?php echo $row['image'];?>' height='50px' width='50px'/>
 <input type="hidden" name="old_image" value="<?php echo $row['image']; ?>"/>

<input type="submit" id="submit-btn" value="Upload">



</form>

<div id="output"></div>

</div>
</div>
</div>
</body>
</html>