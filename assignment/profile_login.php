<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Log In</title>
    <link rel="stylesheet" href="profile_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <form action="profile_login.php?user_id=<?=$_GET['user_id']?>" method="post">
        <center>
        <h1>ENTER YOUR PROFILE PASSWORD</h1>
        <div class = "box">
        <input type="password" name="profile_password" maxlength = "6" required>
        </div>
        </center>
        <center>
        <input type="submit" value="Log In" class = "login" >
        </center>
    </form>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "conn.php";
    $user_id = $_GET['user_id'];
    $profile_password = $_POST['profile_password'];
    $sql = "SELECT * FROM user_profile WHERE user_id = '$user_id' AND profile_password = '$profile_password'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0){
        session_start();
        $_SESSION['user_id'] = $user_id;
        header("Location: mainpage.php");
    }else{
        echo"<script>alert('Invalid Login Crendentials!');</script>";
    }
}

?>