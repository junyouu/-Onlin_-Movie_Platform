<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class = "center">
        <center>
            <form action="signup.php" method="post" >
                <h1>SIGN UP YOUR ACCOUNT</h1>
                <div class= "inputbox">
                    <input type="text" placeholder = "Account Name" name="login_name" required>
                </div>
                <div class= "inputbox">
                    <input type="password" placeholder = "Account Password" name="login_password" required>
                </div>
                <a href="login.php"><p>Already Have an Account?</p></a>
                <input type="submit" value="Create Account" class= "createaccount">
            </form>
        </center>
    </div>


</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include "conn.php";
    $login_name = $_POST['login_name'];
    $sql = "SELECT * FROM login_credentials WHERE login_name = '$login_name'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0){
        echo "<script>alert('Duplicate Username is Not Allowed!');
                window.history.back();</script>";
        exit();
    }

    if(strlen($login_name) > 20){
        echo "<script>alert('Username cannot be longer than 20 characters!');
                window.history.back();</script>";
        exit();
    }

    $login_password = $_POST['login_password'];
    if(strlen($login_password) > 16){
        echo "<script>alert('Password can only be maximum of 16 characters!');
                window.history.back();</script>";
        exit();
    }

    $sql = "INSERT INTO login_credentials(login_name, login_password)
            VALUES('$login_name', '$login_password')";
    $res = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) > 0){
        $login_id = mysqli_insert_id($conn);
        session_start();
        $_SESSION['login_id'] = $login_id;
        header("Location: subscription.php");
    }
}


?>