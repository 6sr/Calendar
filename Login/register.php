<?php 
	require 'config.php';
?>

<!DOCTYPE html> 
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Animated Login Form</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <form class="box" method="post" enctype="multipart/form-data">
			<h1>Register Page</h1>
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<label for="img1" style="color:white">Upload Image</label>
			<br>
			<input type="file" name="img1">
			<input type="submit" name="Register" value="Register">
			<a href="login.php" style="text-decoration:none"><input type="button" value="Login"></a>
        </form>
    </body>

</html>

<?php
if(isset($_POST['Register'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$img=$_FILES['img1']['name'];
	$temp_name=$_FILES['img1']['tmp_name'];
	$filepath="admin/$img";
	move_uploaded_file($temp_name,$filepath);
	$query2="insert into loginTable (username,password,img) values('$username','$password','$img')";
	$runquery2=mysqli_query($con,$query2);
	if($runquery2){
		echo'<script>alert("Account has been registered")</script>';
	}
}


?>