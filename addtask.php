<?php 
    require 'config.php';
    session_start();
    if(isset($_SESSION['username'])) {
        // Allow user to add task

?>

    <!DOCTYPE html> 
    <html lang="en" dir="ltr">
        <head>
            <meta charset="utf-8">
            <title>SR | Calendar - Add Task</title>
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
                <h1>Add Task</h1>
                <input type="text" name="title" placeholder="Title" autocomplete="off">
                <input type="text" name="description" placeholder="Description" autocomplete="off">
                <input type="date" name="taskDate" >
                <input type="submit" name="addtask" value="Add Task" >
            </form>
            <script>
                function home() {
                    document.location = 'index.php';
                }
            </script>
        </body>

    </html>

<?php
    if(isset($_POST['addtask'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $taskDate = $_POST['taskDate'];
        $userid = $_SESSION['id'];
        if($title && $description && $taskDate && $userid) {
            $query1="select * from tasks where title='$title' AND description='$description' AND date='$taskDate' AND user_id='$userid'";
            $runquery1=mysqli_query($con,$query1);
            if(mysqli_num_rows($runquery1) > 0) {
                echo'<script>alert("Task already added")</script>';
                echo "<script type='text/javascript'> document.location = 'addtask.php'; </script>";
            }
            else {
                $query="insert into tasks (title, description, date, user_id) values('$title','$description','$taskDate','$userid')";
                $runquery=mysqli_query($con,$query);
                if($runquery){
                    echo'<script>alert("Task is added")</script>';
                    echo "<script type='text/javascript'> document.location = 'addtask.php'; </script>";
                }
                else {
                    echo'<script>alert("Task could not be added. Inconvenience is regretted")</script>';
                }
            }
        }
        else {
            echo $title;
            echo $description;
            echo $taskDate;
            echo $userid;
            var_dump($_SESSION);
            echo'<script>alert("Title, description, date should not be empty")</script>';
            // echo "<script type='text/javascript'> document.location = 'addtask.php'; </script>";
        }
    }
}
else {
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
?>