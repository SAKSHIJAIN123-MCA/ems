<?php include('connect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #f5f5f5;
}

img {
    display: block;
    margin: auto;
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

</style>
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>event type</th>
            <th>event description</th>
            <th>event image</th>
            <th>edit</th>
            <th>delete</th>

        </tr>
        <?php 

$sql1="SELECT * FROM event";
    $res=  mysqli_query($connection,$sql1);
   
    if(mysqli_num_rows($res)>0){
      while($row = $res->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['Event_type'] ?></td>
            <td><?php echo $row['Event_description'];?></td>
            <td><img src="image/<?php echo $row['Event_image'] ?>" alt=""  style="width:100px;height:100px"></td>
            <td ><a href="event_edit1.php?id=<?php echo $row['Event_type'] ?>">EDIT</a></td>
            <td ><a href="event_delete1.php?id=<?php echo $row['Event_type'] ?>">Delete</a></td>


        </tr>
        <?php }}?>
    </table>


    <footer id="foot">
<nav><a href="http://localhost/ems/event%20management%20system/">Home</a> | 
  <a href="http://localhost/ems/event%20management%20system/admin/moreevent.php">Events</a> | 
  <a href="http://localhost/ems/event%20management%20system/admin/Event_add.php">Event Add</a> | 
  <a href="http://localhost/ems/event%20management%20system/admin/index-digital.php">Admin Home</a> | 

 </nav>
</footer>


</body>
</html>