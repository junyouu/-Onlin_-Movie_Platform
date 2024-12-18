<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Profile</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="add_profile.css">
</head>
<body>
    <div class = "center">
    <center>
        <form action="add_profile.php" method="post" >
            <h1>CREATE PROFILE</h1>
            <div class= "inputbox">
                <input type="text" placeholder = "Profile Name" name="profile_name" required>
            </div>
            <div class= "inputbox">
                <input type="password" placeholder = "Profile password (6 digits number)" name="profile_password" pattern="\d{6}" title="Please enter a 6-digit number" required>
            </div>
            <div class= "inputbox">
                <input type="text" placeholder = "Age" name="user_age" required>
            </div>
            <div class= "inputbox">
                <input type="text" placeholder = "Phone Number" name="user_phone_num" required>
            </div>
            <div class= "inputbox">
                <input type="email" placeholder = "Email" name="user_email" required>
            </div>
            <br>
            
            <input type="submit" value="Create Profile" class= "createprofile">
            </form>
    </center>      
    </div>
    
</body>
</html>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $profile_name = $_POST['profile_name'];
    if(strlen($profile_name) > 20){
        echo "<script>alert('Username cannot be longer than 20 characters!');
                window.history.back();</script>";
        exit();
    }

    $profile_password = $_POST['profile_password'];

    $user_age = $_POST['user_age'];
    $user_phone_num = $_POST['user_phone_num'];
    if(!is_numeric($user_phone_num)){
        echo "<script>alert('Please enter a valid phone number.');
                window.history.back();</script>";
        exit();
    }   
    if(!((strlen($user_phone_num) === 10) || (strlen($user_phone_num) === 11))){
        echo "<script>alert('Please enter a valid phone number.');
                window.history.back();</script>";
        exit();
    }
    $user_email = $_POST['user_email'];

    session_start();
    $login_id = $_SESSION['login_id'];

    include "conn.php";
    $sql = "INSERT INTO user_profile(profile_name, profile_password, user_age, user_phone_num, user_email, login_id)
            VALUES('$profile_name', '$profile_password', '$user_age', '$user_phone_num', '$user_email', '$login_id')";
    $res = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) > 0){
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        $user_id = mysqli_insert_id($conn);

        $sql = "INSERT INTO watchlist(user_id) VALUES($user_id)";
        $res = mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn) < 0){
            echo "Error Occurs!";
        }

        $sql = "INSERT INTO history(user_id) VALUES($user_id)";
        $res = mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn) < 0){
            echo "Error Occurs!";
        }

        if($user_age <= 12){
            $sql = "UPDATE user_profile SET user_preferences = 'For Kids' WHERE user_id = $user_id";
            $res = mysqli_query($conn, $sql);
            header("Location: mainpage.php");
        }else{
            header("Location: preferences.php");
        }
    }   
}

?>