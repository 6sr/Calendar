<?php 
	require 'config.php';
?>

<!DOCTYPE html> 
<html lang="en" dir="ltr">
    <head>
		<meta charset="utf-8">
		<title>SR | Calendar - Sign Up</title>
		<link rel="stylesheet" href="signin.css">
		<link rel="icon" type="image/jpg" href="SRLogo.jpg" />
		<style>
			.box input[type = "email"], .box input[type = "file"] {
				border: 0;
				background: none;
				display: block;
				border-radius: 24px;
				outline: none;
				color: white;
				margin: 20px auto;
				border: 2px solid #3498db;
				padding: 14px 10px;
				text-align: center;
				width: 200px;
				transition: 0.25s;
			}
			.box input[type="email"]:focus {
				width: 280px;
				border-color: #175782;
			}
			.box input[type = "file"]:hover {
				border-color: #175782;
			}
		</style>
    </head>
    <body>
		<button onClick='home()' style='border-radius: 10%;
										padding:10px;
										background: #1abc9c;
										color: white;'>Go to Home page</button>
        <form class="box" method="post" enctype="multipart/form-data">
			<h1>Signup Page</h1>
			<input type="text" name="username" placeholder="Username" autocomplete="off">
			<input type="email" name="mail" placeholder="Email" autocomplete="off">
			<input type="password" name="password" placeholder="Password" autocomplete="off">
			<label for="img1" style="color:white">Upload Image</label>
			<input type="file" name="img1">
			<input type="submit" name="Signup" value="Signup">
			<a href="signin.php" style="text-decoration:none"><input type="button" value="Signin"></a>
        </form>
		<script>
			function home() {
				document.location = 'index.php';
			}
		</script>
    </body>

</html>

<?php
if(isset($_POST['Signup'])){
	$username=$_POST['username'];
	$mail = $_POST['mail'];
	$password=$_POST['password'];
	if($username && $mail && $password) {
		$password = password_hash($password, PASSWORD_DEFAULT);

		$img=$_FILES['img1']['name'];
		$temp_name=$_FILES['img1']['tmp_name'];
		
		$query = "select * from logincalendar where mail='$mail' AND username='$username'";
		$runqueryCheck1 = mysqli_query($con,$query);
		$query = "select * from logincalendar where mail='$mail'";
		$runqueryCheck2 = mysqli_query($con,$query);
		$query = "select * from logincalendar where username='$username'";
		$runqueryCheck3 = mysqli_query($con,$query);
		if(mysqli_num_rows($runqueryCheck1)>0) {
			echo'<script>alert("User is already registered")</script>';
			echo "<script type='text/javascript'> document.location = 'signup.php'; </script>";
		}
		else if(mysqli_num_rows($runqueryCheck2)>0) {
			echo'<script>alert("Account is already registered with this mail id")</script>';
			echo "<script type='text/javascript'> document.location = 'signup.php'; </script>";
		}
		else if(mysqli_num_rows($runqueryCheck3)>0) {
			echo'<script>alert("Username is not available")</script>';
			echo "<script type='text/javascript'> document.location = 'signup.php'; </script>";
		}
		else {
			$query2="insert into logincalendar (username,mail,password) values('$username','$mail','$password')";
			$runquery2=mysqli_query($con,$query2);

			if($runquery2){
				$query1="select * from logincalendar where mail='$mail' AND username='$username'";
				$runquery1=mysqli_query($con,$query1);
				$queryObj = mysqli_fetch_array($runquery1);		// $queryObj = $runquery1->fetch_assoc();
				
				mkdir('userData/'.$queryObj['id'], 0755, true);
				$newFile = fopen("userData/".$queryObj['id']."/data.csv",'w'); 
				fclose($newFile);
				
				if($img != "") {
					$filepath="userData/".$queryObj['id']."/profile.".explode(".",$img)[1];
					move_uploaded_file($temp_name,$filepath);
				}
				
				echo'<script>alert("Account has been registered")</script>';
				//echo "<script type='text/javascript'> document.location = 'signin.php'; </script>";
				//echo "<a href='signin.php'>Go to sign in page</a>";
			}
			else {
				echo'<script>alert("Account is not registered")</script>';
			}
		}
	}
	else {
		echo'<script>alert("User, mail, password should not be empty")</script>';
		echo "<script type='text/javascript'> document.location = 'signup.php'; </script>";
	}
}


?>