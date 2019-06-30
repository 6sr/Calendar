<?php
	require 'config.php';
	session_start();
?>

<!DOCTYPE html> 
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Animated Signin Form</title>
        <link rel="stylesheet" href="signin.css">
    </head>
    <body>
        <form class="box" method="post" enctype="multipart/form-data">
			<h1>Signin Page</h1>
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<input type="submit" name="SignIn" value="Signin">
			<a href="signup.php" style="text-decoration:none"><input type="button" name="Signup" value="Signup"></a>
        </form>
    </body>

</html>
<?php
if(isset($_POST['SignIn'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query1="select * from logincalendar where username='$username'";
	$runquery1=mysqli_query($con,$query1);
	$queryObj = mysqli_fetch_array($runquery1);		// $queryObj = $runquery1->fetch_assoc();

	if(mysqli_num_rows($runquery1)>0 && password_verify($password,$queryObj['password'])) {
		/*$writeFile = fopen("userFile/".$queryObj['id'].".csv",'a');
		$readFile = fopen("userFile/".$queryObj['id'].".csv",'r');*/
		
		/* header('location:Mainpage.php'); */
		echo "<script type='text/javascript'> document.location = 'Mainpage.php'; </script>";
		$_SESSION['username']=$username;
	}
	else{
		echo'<script>alert("Invalid username and password")</script>';
	}
}

?>