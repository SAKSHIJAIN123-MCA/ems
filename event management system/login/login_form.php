<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login form</title>
<link rel="stylesheet" href="login.css" type="text/css" />
<?php include "../header.php"; ?>
</head>

<body background="../images/Background3.png">
<div id="log_ss">
<header></header>
<div id="login_aa">
  <fieldset style="width:400px; margin-top:auto; margin-bottom:auto;"><legend>Login Form</legend>
<form action="login_action.php" method="post" >

<ul>  
		<li><label for="userid">User Name:</label></li>
          
		<li><input type="text" name="txtuname" size="12" placeholder="User Name"/></li>  
		<li><label for="passid">Password:</label></li>  
		<li><input type="password" name="txtpass" size="12" placeholder="Password" /></li>
          
<input type="submit" id="submit" value="Login" />
<p>Don't have an Account? <a href="http://localhost/ems/event%20management%20system/reg/sign-up.html">SignUp Here</a></p> 

</ul>
</form>
</fieldset>
</div>
</div>

<div>

  <?php include '../footer.php';?>
</div>
</body>
</html>