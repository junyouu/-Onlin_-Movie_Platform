<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <script>
        function goProfile(profile){
            var user_id = profile.id;
            window.location.href = "profile_login.php?user_id=" + user_id;
        }
    </script>

    <a href="add_profile.php">
        <img src="add-icon.webp" alt="">
    </a>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Profile</title>
    <link rel="stylesheet" type="text/css" text href= "choose_profile.css">
</head>
<body>
    <h4>NOTFLIX</h4>
    <h3>Chooose Your Profile<h3>
    <div class="containner3">
        <?php
        session_start();

        include "conn.php";

        $login_id = $_SESSION['login_id'];

        $sql = "SELECT * FROM user_profile WHERE login_id = $login_id";
        $res = mysqli_query($conn, $sql);

        if(mysqli_affected_rows($conn) > 0){
            while($profile = mysqli_fetch_assoc($res)){ ?>
            <div class="containner2">
                <img class="img1" src="Netflix-icon.png" alt="" id="<?=$profile['user_id']?>" onclick="goProfile(this)">
                <h2><?=$profile['profile_name']?></h2>
            </div>
        <?php
            }
        }
        ?>

        <div class="containner2">
            <a href="add_profile.php">
                <img id="img2" src="add-icon.webp" alt="">
            </a>
        </div>
        
    </div>

    <script>
        function goProfile(profile){
            var user_id = profile.id;
            window.location.href = "profile_login.php?user_id=" + user_id;
        }
    </script>

</body>
</html>

