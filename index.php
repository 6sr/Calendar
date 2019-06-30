<?php 
	require 'config.php';
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="icon" type="image/jpg" href="SRLogo.jpg" />
	<style>
		img {
			transition: 1s;
			position: fixed;
			height:5vw;
			width: 5vw;
			right: 0.5vw;
		}
		img:hover {
			height: 20vw;
			width: 20vw;
		}
	</style>
<title>
SR | Calendar - Home
</title>
</head>
<body>
<?php
if(isset($_SESSION['username'])) {
	
	$username=$_SESSION['username'];
	$query13="select * from loginCalendar where username='$username'";
	$runquery13=mysqli_query($con,$query13);
    $rowdata=mysqli_fetch_array($runquery13);
	$username=$rowdata['username'];
	
	//$extensionList=array(".jpg",".png");
	$imgPath="userData/".$rowdata['id']."/profile";
	$imgFiles = array();
	foreach (glob($imgPath.'.*') as $img) {
		$imgFiles[] = $img;
	}
	
	if(count($imgFiles) > 0) {	echo "<img src='$imgFiles[0]' />"; }
	else { echo "<img src='userData/default-user-image.png' />"; }
	echo "
		<form method='POST'>
			<input type='submit' value='Logout' class='gotoBtn' name='Logout' style='float:right;margin:0 6vw;' />
		</form><br>
	";
	include "calendarBlock.php";
	echo "
		<br>
		<button class='gotoBtn'>Add Note</button>
	";
    if(isset($_POST['Logout'])){
        session_destroy();
    	echo "<script type='text/javascript'> document.location = 'signin.php'; </script>";
    }
}
else{
	include "signInUpBar.php";
	include "calendarBlock.php";
}

?>
</body>
</html>