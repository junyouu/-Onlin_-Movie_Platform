<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription</title>
    <link rel="stylesheet" href="subscription.css">
</head>
<body>
<h1>Subscription</h1>
    <div class="container">
        <div class="individual">
            <h2>Individual</h2>
            <br>
            <br>
            <p>-Access to all movies and TV shows</p>
            <br>
            <p>-Stream on 1 device at a time</p>
            <br>
            <p>-$9.99/month</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <form action="subscription.php" method="post">
                <input type="hidden" name="subscription" value="individual">
                <input type="submit" Value = "Subscribe">
                </form>
        </div>
        <div class="family">
            <h2>Family</h2>
            <br>
            <br>
            <p>-Access to all movies and TV shows</p>
            <br>
            <p>-Stream on up to 4 devices at a time</p>
            <br>
            <p>-$14.99/month</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <form action="subscription.php" method="post">
                <input type="hidden" name="subscription" value="family">
                <input type="submit" Value = "Subscribe">
            </form>
        </div>
    </div>

    
</body>
</html>

<?php
include "conn.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    $login_id = $_SESSION['login_id'];
    $subscription = $_POST['subscription'];
    $sql = "UPDATE login_credentials SET subscription = '$subscription' WHERE login_id = $login_id";;
    $res = mysqli_query($conn, $sql);
    if($subscription == "individual"){
        header("Location: complete_profile.php");
    }
    elseif($subscription == "family"){
        session_start();
        $_SESSION['login_id'] = $login_id;
        header("Location: choose_profile.php");
    }
}

?>