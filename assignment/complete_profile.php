<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Profile</title>
    <link rel="stylesheet" type="text/css" text href= "complete_profile.css">
</head>
<h2>NOTFLIX</h2>
<body>
    <div class = "center">
        <h1>Complete Your Profile</h1>
        <div class = "container">
            <form action="complete_profile.php" method="post">
                <label for="user_age">Age:</label>
                <input type="text" name="user_age" required>
                <br>
                <label for="user_phone_num">Phone Number:</label>
                <input type="text" name="user_phone_num" required>
                <br>
                <label for="user_email">Email:</label>
                <input type="email" name="user_email" required>
                <br>
                <input id="s" type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
    

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "conn.php";
    session_start();

    $login_id = $_SESSION['login_id'];
    $sql = "SELECT * FROM login_credentials WHERE login_id = $login_id";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) > 0){
        while($rows = mysqli_fetch_assoc($res)){
            $profile_name = $rows['login_name'];
            $profile_password = $rows['login_password'];
        }
    }

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

    $sql = "INSERT INTO user_profile(profile_name, profile_password, user_age, user_phone_num, user_email, login_id)
            VALUES('$profile_name', '$profile_password', '$user_age', '$user_phone_num', '$user_email', '$login_id')";
    $res = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) > 0){
        $user_id = mysqli_insert_id($conn);
        $_SESSION['user_id'] = $user_id;

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