<?php
    if(isset($_SESSION['username'])) {
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/jpg" href="SRLogo.jpg" />
</head>
<body>
<ul style="list-style-type: none;margin: 0;padding: 1vw;">
    <li style="float:right"><button onclick="signup()" class="gotoBtn" style="text-decoration: none;margin-right:0;">Signup</a></li>
    <li style="float:right;padding:0 1vw;"><button onclick="signin()" class="gotoBtn" style="text-decoration: none;">Signin</a></li>
</ul>
    <script>
        function signin() {
            document.location = 'signin.php';
        }
        function signup() {
            document.location = 'signup.php';
        }
    </script>
</body>
</html>
