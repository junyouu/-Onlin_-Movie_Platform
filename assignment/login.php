<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="signup_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class = "center">
        <center>
            <form action="login.php" method="post" >
                <h1>LOG IN YOUR ACCOUNT</h1>
                <div class= "inputbox">
                    <input type="text" placeholder = "Account Name" name="login_name" required>
                </div>
                <div class= "inputbox">
                    <input type="password" placeholder = "Account Password" name="login_password" required>
                </div>
                <a href="signup.php"><p>Haven't Sign Up?</p></a>
                <input type="submit" value="Log In" class= "createaccount">
            </form>
        </center>
    </div>


</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "conn.php";
    $login_name = $_POST['login_name'];
    $login_password = $_POST['login_password'];

    $sql = "SELECT * FROM login_credentials WHERE login_name = '$login_name' AND login_password = '$login_password'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) > 0 ){
        while($rows = mysqli_fetch_assoc($res)){
            if($rows['subscription'] == 'family'){
                session_start();
                $_SESSION['login_id'] = $rows['login_id'];
                header("Location: choose_profile.php");
            }
            elseif($rows['subscription'] == 'individual'){
                $login_id = $rows['login_id'];
                $sql = "SELECT * FROM user_profile WHERE login_id = $login_id";
                $res = mysqli_query($conn, $sql);   
                if (mysqli_num_rows($res) > 0){
                    while($profile = mysqli_fetch_assoc($res)){
                        $user_id = $profile['user_id'];
                    }
                }
                session_start();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['login_id'] = $rows['login_id'];
                header("Location: mainpage.php");
            }   
        }

    }else{
        echo"<script>alert('Invalid Login Crendentials!');</script>";
    }
}


?>