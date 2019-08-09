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
    $query13="select * from users where username='$username'";
    $runquery13=mysqli_query($con,$query13);
    $rowdata=mysqli_fetch_array($runquery13);
    $username=$rowdata['username'];
    
    //$extensionList=array(".jpg",".png");
    // $imgPath="userData/".$rowdata['id']."/profile";
    $imgPath="userData/".$rowdata['id'];
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
        <button class='gotoBtn' onclick='addtaskFunc()'>Add Task</button>
    ";
    $userid = $_SESSION['id'];
    if($userid) {
        $query1="select * from tasks where user_id='$userid'";
        $runquery1=mysqli_query($con,$query1);
        if(mysqli_num_rows($runquery1) > 0) {
            echo "
                <style>
                    .task {
                        width: 90%;
                        border-radius: 0;
                        text-align: left;
                    }
                </style>
            ";
            $i = 0;
            while ($taskRow = mysqli_fetch_array($runquery1)) {
                echo "<br><br><button class = 'gotoBtn task' onmouseover='showDes(this)' onmouseout='hideDes(this)' >";
                    echo "Task ".($i + 1);
                    echo "<h2>".$taskRow['title']."</h2>";
                    echo "<p style = 'display: none'>".$taskRow['description']."</p>";
                echo "</button>";
                $i++;
            }
            echo "<br><br><br>";
        }
    }
    echo "
        <script>
            function addtaskFunc() {
                document.location = 'addtask.php';
            }
            
            function hideDes(evt) {
                console.log('lolhide');
                evt.getElementsByTagName('p')[0].style.display = 'none';
            }
            function showDes(evt) {
                console.log('lolshow');
                evt.getElementsByTagName('p')[0].style.display = 'block';
            }
        </script>
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