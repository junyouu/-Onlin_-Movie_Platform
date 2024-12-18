<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Movie</title>
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
    </style>
</head>
<body>
    <?php
        include "conn.php";
        $movie_id = $_GET['movie_id'];
        $sql = "SELECT * FROM movie WHERE movie.movie_id = $movie_id";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0){
            while($movie = mysqli_fetch_assoc($res)){ 
                $movie_url = $movie['movie_url'];
            }
        }
    ?>

    <video controls autoplay width=100% height=auto>
        <source src="movie/<?=$movie_url?>">
    </video>

</body>
</html>