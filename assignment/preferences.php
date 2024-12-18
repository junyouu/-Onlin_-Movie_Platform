<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include("conn.php");
    session_start();
    $user_id = $_SESSION["user_id"];
    $preferences = $_POST["poster"];
    $sql =  "UPDATE user_profile SET  user_preferences = '$preferences' WHERE user_id = $user_id";
    $result = mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn) > 0){
        header("Location: mainpage.php");
    }else{
        echo "Update Not Successful!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUR FAVOURITE TYPE OF MOVIE</title>
    <link rel="stylesheet" href="preferences.css">
</head>
<body>
    <form action="preferences.php" method="post">
        <div class = "center">
            <div class = "left">
                <p class = "normaltext">CHOOSE</p>
                <h1 class = "h1">YOUR FAVOURITE TYPE<br>OF MOVIE</h1>
            </div>
            <br>
            <label >
                <img src= "movie poster/POSTER doctor strange.jpg"  alt="doraemon" class = "movie" width = "200" height = "250" >
                <input type="radio"  class= "radioformat" name = "poster" value="Superhero">
            </label>
            <label >
                <img src= "movie poster/someone like you.jpg"  alt="harrypotter" class = "movie" width = "200" height = "250" >
                <input type="radio"      class= "radioformat" name = "poster" value="Romance">
            </label>
            <label >
                <img src= "movie poster/flash.jpeg"  alt="flash" class = "movie" width = "200" height = "250" >
                <input type="radio"     class= "radioformat" name = "poster" value="Superhero">
            </label>
            <label >
                <img src= "movie poster/all these years.jpg"  alt="yourname" class = "movie" width = "200" height = "250" >
                <input type="radio"     class= "radioformat" name = "poster" value="Romance" >
                <br>
            </label>
            <label >
                <img src= "movie poster/tangled.jpg"  alt="onepiece" class = "movie" width = "200" height = "250" >
                <input type="radio"      class= "radioformat" name = "poster" value="For Kids" >
            </label>
            <label >
                <img src= "movie poster/avenger.jpeg"  alt="avenger" class = "movie" width = "200" height = "250" >
                <input type="radio"      class= "radioformat" name = "poster" value="Superhero">
            </label>
            <label >
                <img src= "movie poster/blade runner 2049.jpg"  alt="spiritedaway" class = "movie" width = "200" height = "250" >
                <input type="radio"      class= "radioformat" name = "poster" value="Science Fiction">
            </label>
            <label >
                <img src= "movie poster/shrek.webp"  alt="shrek" class = "movie" width = "200" height = "250" >
                <input type="radio"      class= "radioformat" name = "poster" Value="For Kids" >
            </label>
                <br>
                
            <label >
                <img src= "movie poster/frozen.jpg"  alt="incantation" class = "movie" width = "200" height = "250" >
                <input type="radio"      class= "radioformat" name = "poster" Value="For Kids" >
            </label>
            <label >
                <img src= "movie poster/arrival.webp"  alt="arrival" class = "movie" width = "200" height = "250" >
                <input type="radio"      class= "radioformat" name = "poster" Value="Science Fiction">
            </label>
            <label >
                <img src= "movie poster/titanic.jpeg"  alt="titanic" class = "movie" width = "200" height = "250" >
                <input type="radio"      class= "radioformat" name = "poster" Value="Romance">
            </label>
            <label >
                <img src= "movie poster/avatar.jpeg"  alt="avatar" class = "movie" width = "200" height = "250" >
                <input type="radio"      class= "radioformat" name = "poster" Value="Science Fiction">
            </label>

            <script>
                const images = document.querySelectorAll('.movie');
                function removeselected(){
                    images.forEach(otherImage => {
                            otherImage.classList.remove('selected');
                        });}
                    
                images.forEach(image => {
                    image.addEventListener('click', function() {
                    removeselected();
                    this.classList.add('selected');
                    });
                });
            </script>

        </div>

        <br>
        <br>

        <div class = "finish">
            <input type="submit" value = "Finish" >
        </div>
    </form>
    
</body>
</html>
