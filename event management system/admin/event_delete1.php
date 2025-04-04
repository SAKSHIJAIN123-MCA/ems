<?php 
include('connect.php');
$event_type=$_GET['id'];
$sql ="Delete from event where Event_type='$event_type'";

$res=mysqli_query($connection,$sql);
if($res)
{
   echo "<script> 
alert('Event delete');
document.location = 'eventall.php'; </script>";

}
else 
{

}

?>