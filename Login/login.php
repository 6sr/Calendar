<?php
	require 'config.php';
	session_start();
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
			<h1>Login Page</h1>
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<input type="submit" name="SignIn" value="Login">
			<a href="register.php" style="text-decoration:none"><input type="button" name="Register" value="Register"></a>
        </form>
    </body>

</html>
<?php
if(isset($_POST['SignIn'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query1="select * from loginTable where username='$username' AND password='$password'";
	$runquery1=mysqli_query($con,$query1);
	if(mysqli_num_rows($runquery1)>0){
		/* header('location:Mainpage.php'); */
		echo "<script type='text/javascript'> document.location = 'Mainpage.php'; </script>";
		$_SESSION['username']=$username;
	}
	else{
		echo'<script>alert("Invalid username and password")</script>';
	}
}

?>