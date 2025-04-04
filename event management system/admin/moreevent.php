<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="Left">
        <a href="http://localhost/ems/event%20management%20system/index.php" class="Lb">Home</a><hr>
        <a href="http://localhost/ems/event%20management%20system/contact_us.php" class="Lb">Contact Us</a><hr>
        <a href="http://localhost/ems/event%20management%20system/admin/login_admin.php" class="Lb">Admin Login</a><hr>
        <a href="http://localhost/ems/event%20management%20system/reg/sign-up.html" class="Lb">SignUp</a><hr>
        <a href="http://localhost/ems/event%20management%20system/login/login_form.php" class="Lb">SignIn</a><hr>
    </div>

    <div class="Gen"> 
        <div class="Home">
            <div class="Sl">
                
            </div>
            <br><br>ITS TIME TO CELEBRATE! <br>THE BEST EVENT
        </div>
        <?php include('connect.php'); ?>
        <?php 
            $sql1="SELECT * FROM `event`";
            $res= mysqli_query($connection,$sql1);
            
            if(mysqli_num_rows($res)>0){
                while($row = $res->fetch_assoc()) { ?>
                    <div class="Event" >
                        <div class="E1" style="background-image: url('image/<?php echo $row['Event_image'] ?>'); background-size: cover;"></div>
                        <div class="E2">
                            <label> <?php echo $row['Event_type']; ?></label>
                            <p style="font-size: 25px; text-align: justify;"><?php echo $row['Event_description']; ?></p>
                            <a  style="font-size: 25px; text-align: justify;"  href="http://localhost/ems/event%20management%20system/reg/sign-up.html" class="btn">Book Now</a>
                        </div>
                    </div>
                <?php }
            }
        ?>
    </div>
</body>
</html>
