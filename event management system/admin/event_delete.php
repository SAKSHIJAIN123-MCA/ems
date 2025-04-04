<?php
$id = $_GET['id'];
require('connection.php');
$sql = "DELETE FROM event_table WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
$connection->close();
?>

<script type="text/javascript" language="javascript">
    alert("Data deleted successfully!");
    window.location.href = "fetch_event.php";
</script>
