<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log In</title>
    <link rel="stylesheet" href="signup_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class = "center">
        <center>
            <form action="admin_login.php" method="post" >
                <h1>LOG IN STAFF ACCOUNT</h1>
                <div class= "inputbox">
                    <input type="text" placeholder = "Account Name" name="admin_name" required>
                </div>
                <div class= "inputbox">
                    <input type="password" placeholder = "Account Password" name="admin_password" required>
                </div>
                <a href="admin_signup.php"><p>Haven't Sign Up?</p></a>
                <input type="submit" value="Log In" class= "createaccount">
            </form>
        </center>
    </div>


</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "conn.php";
    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];

    $sql = "SELECT * FROM admin WHERE admin_name = '$admin_name' AND admin_password = '$admin_password'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) > 0 ){
        while($rows = mysqli_fetch_assoc($res)){
                session_start();
                $_SESSION['admin_id'] = $rows['admin_id'];
                header("Location: admin.php");
            }
    }else{
        echo"<script>alert('Invalid Login Crendentials!');</script>";
    }
}


?>