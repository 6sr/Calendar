<?php
    require 'config.php';
    session_start();
    if(isset($_SESSION['username'])) {
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }
    else {
        // Allow user to sign in
?>

    <!DOCTYPE html> 
    <html lang="en" dir="ltr">
        <head>
            <meta charset="utf-8">
            <title>SR | Calendar - Sign In</title>
            <link rel="stylesheet" href="signin.css">
            <link rel="icon" type="image/jpg" href="SRLogo.jpg" />
        </head>
        <body>
            <button onClick='home()' style='border-radius: 10%;
                                            padding:10px;
                                            background: #1abc9c;
                                            color: white;'>Go to Home page</button>
            
            <form class="box" method="post" enctype="multipart/form-data">
                <h1>Signin Page</h1>
                <input type="text" name="username" placeholder="Username" autocomplete="off">
                <input type="password" name="password" placeholder="Password" autocomplete="off">
                <input type="submit" name="SignIn" value="Signin">
                <a href="signup.php" style="text-decoration:none"><input type="button" name="Signup" value="Signup"></a>
            </form>
            <script>
                function home() {
                    document.location = 'index.php';
                }
            </script>

        </body>

    </html>
<?php
    if(isset($_POST['SignIn'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $query1="select * from users where username='$username'";
        $runquery1=mysqli_query($con,$query1);
        $queryObj = mysqli_fetch_array($runquery1);		// $queryObj = $runquery1->fetch_assoc();

        if(mysqli_num_rows($runquery1)>0 && password_verify($password,$queryObj['password'])) {
            /*$writeFile = fopen("userFile/".$queryObj['id'].".csv",'a');
            $readFile = fopen("userFile/".$queryObj['id'].".csv",'r');*/
            
            /* header('location:index.php'); */
            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
            $_SESSION['id'] = $queryObj['id'];
            $_SESSION['username']=$username;
            $_SESSION['mail'] = $queryObj['mail'];
        }
        else{
            echo'<script>alert("Invalid username or password")</script>';
        }
    }
}
?>