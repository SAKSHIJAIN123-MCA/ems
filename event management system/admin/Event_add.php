<?php
if(isset($_POST['Event_type'])){
    include('connect.php');
     $file_name1 =$_FILES['Event_image']['name'];
  
 $event_type =$_POST['Event_type'];
 $event_desp =$_POST['Event_description'];
 
 $file_tmp1 =$_FILES['Event_image']['tmp_name'];
 move_uploaded_file($file_tmp1,"image/".$file_name1);

 
 $sql ="INSERT INTO event(Event_type, Event_description, Event_image) VALUES ('$event_type','$event_desp','$file_name1')";

 $res=mysqli_query($connection,$sql);
 if($res)
 {
    echo "<script> 
alert('Event add');
 </script>";

 }
 else 
 {

 }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
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
    margin: 5px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="file"] {
    border: none;
    background-color: transparent;
}

.Submit {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
}

.Submit:hover {
    background-color: #45a049;
}

.Bt {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
}
#foot {
  background-color: #f2f2f2; /* Footer ka background color */
  padding: 10px; /* Padding footer ke content ke liye */
}

#foot nav {
  text-align: center; /* Text ko center align karna */
}

#foot nav a {
  text-decoration: none; /* Link underline remove karna */
  color: #333; /* Link ka color */
  margin: 0 10px; /* Link ke beech ka space */
}

#foot nav a:hover {
  color: #000; /* Hover pe link ka color change karna */
  font-weight: bold; /* Hover pe link ka font weight badhana */
}


@media screen and (max-width: 600px) {
    form {
        width: 90%;
    }
}
</style>
    <title>Document</title>
</head>
<body>
    <form action="Event_add.php" method="post" enctype="multipart/form-data">
        <label>Event type</label>
        <input class="Bt" type="text" name="Event_type" required><br><br>
        <label>Event description </label>
        <input class="Bt" type="text" name="Event_description" required><br><br>
        <label>Event Image </label>
        <input class="Bt" type="file" name="Event_image" required><br>
        <input class="Submit" type="submit">
    </form>
 
<footer id="foot">
<nav><a href="http://localhost/ems/event%20management%20system/">Home</a> | 
  <a href="http://localhost/ems/event%20management%20system/admin/moreevent.php">Events</a> | 
  <a href="http://localhost/ems/event%20management%20system/admin/eventall.php">Event edit and delete</a> | 
  <a href="http://localhost/ems/event%20management%20system/admin/index-digital.php">Admin Home</a> | 

 </nav>
</footer>

</body>
</html>
