<?php
$id = $_GET['id'];
require('connection.php');
$sql = "DELETE FROM images WHERE id = $id";
mysqli_query($connection, $sql); // Assuming your connection variable is named $conn

?>

<script type="text/javascript" language="javascript">
alert("Data deleted successfully!");
window.location.href = "image_fetch.php";
</script>
