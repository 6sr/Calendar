<?php 
	require 'config.php';
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
<title>
Front end Back end
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
	
	echo "
        <form method='POST'>
            <input type='submit' value='Logout' name='Logout' />
        </form>
    ";
	echo "
        <table>
        <tr>
            <td>Image</td>
            <td>
	";
				if(count($imgFiles) > 0) {	echo "<img src='$imgFiles[0]'/>"; }
				else { echo "<img src='userData/default-user-image.png' />"; }
	echo "
			</td>
        </tr>
        <tr>
            <td>Username</td>
            <td>$username</td>
        </tr>
        </table>
    ";
    if(isset($_POST['Logout'])){
        session_destroy();
    	echo "<script type='text/javascript'> document.location = 'signin.php'; </script>";
    }
}
else{
	echo "Welcome admin";
}

?>
</body>
</html>