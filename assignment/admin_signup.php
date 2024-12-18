<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign Up</title>
    <link rel="stylesheet" href="signup_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class = "center">
        <center>
            <form action="admin_signup.php" method="post" >
                <h1>SIGN UP STAFF ACCOUNT</h1>
                <div class= "inputbox">
                    <input type="text" placeholder = "Account Name" name="admin_name" required>
                </div>
                <div class= "inputbox">
                    <input type="password" placeholder = "Account Password" name="admin_password" required>
                </div>
                <a href="admin_login.php"><p>Already Have an Account?</p></a>
                <input type="submit" value="Create Account" class= "createaccount">
            </form>
        </center>
    </div>


</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include "conn.php";
    $admin_name = $_POST['admin_name'];
    $sql = "SELECT * FROM admin WHERE admin_name = '$admin_name'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0){
        echo "<script>alert('Duplicate Username is Not Allowed!');
                window.history.back();</script>";
        exit();
    }

    if(strlen($admin_name) > 20){
        echo "<script>alert('Username cannot be longer than 20 characters!');
                window.history.back();</script>";
        exit();
    }

    $admin_password = $_POST['admin_password'];
    if(strlen($admin_password) > 16){
        echo "<script>alert('Password can only be maximum of 16 characters!');
                window.history.back();</script>";
        exit();
    }

    $sql = "INSERT INTO admin(admin_name, admin_password)
            VALUES('$admin_name', '$admin_password')";
    $res = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) > 0){
        $admin_id = mysqli_insert_id($conn);
        session_start();
        $_SESSION['admin_id'] = $admin_id;
        header("Location: admin.php");
    }
}


?>