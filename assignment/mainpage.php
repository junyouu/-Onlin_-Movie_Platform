<?php
include "conn.php";
session_start();
$user_id = $_SESSION['user_id'];
$login_id = $_SESSION['login_id'];

$sql = "SELECT * FROM login_credentials WHERE login_id = {$login_id}";
$res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0){
    while($rows = mysqli_fetch_assoc($res)){
        if($rows['subscription'] == NULL){
            header("Location: subscription.php");
            exit();
        }
    }
}

$sql = "SELECT * FROM user_profile WHERE user_id = $user_id";
$res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0){
    while($user_profile = mysqli_fetch_assoc($res)){
        $user_age = $user_profile['user_age'];
        $user_preferences = $user_profile['user_preferences'];
        if($user_profile['user_preferences'] == NULL){
            if($user_profile['user_age'] > 12){
                $sql = "UPDATE user_profile SET user_preferences = 'For Kids' WHERE user_id = $user_id";
                $res = mysqli_query($conn, $sql);
            } else{
                header("Location: preferences.php");
                exit();
            }
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="mainpage.css">
</head>
<body>
    <nav class="header">
        <input type="checkbox" id="checkbox" class="check">
        <label for="checkbox" class="more_button">
            <span class="bar">&#9776;</span>
        </label>

        <div class="sidebar">
            <input type="checkbox" id="checkbox" class="check">
            <label for="checkbox" class="more_button">
                <span class="close">&#10006;</span>
            </label>
            <ul>
                <li> 
                    <?php 
                    $sql = "SELECT * FROM user_profile WHERE user_id = $user_id";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res) > 0){
                        while($user = mysqli_fetch_assoc($res)){?>
                            <div class="account_details">
                                <h1><?=$user['profile_name']?></h1>
                                <i><?=$user['user_email']?></i>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </li>
                <li><a href="watchlist.php">Watchlist</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div> 
        
        <div class="navbar">
            <label><a href="mainpage.php" class="logo">NOTFLIX</a></label>
            <ul>
                <li><a href="mainpage.php#forYou">For You</a></li>
                <li><a href="mainpage.php#newRelease">New Release</a></li>
                <li>
                    <form action="search.php" method="post">
                        <input type="text" class="searchbar" name="search_title" placeholder="Please enter movie title here" required >
                        <input type="submit" value="Search" class="search_button">
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="popular_movie">
        <?php
        $sql = "SELECT movie_id, ROUND(AVG(rating_star), 2) AS avg_rating FROM rating GROUP BY movie_id ORDER BY avg_rating DESC LIMIT 1";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res) > 0){
            while($rows = mysqli_fetch_assoc($res)){ 
                $movie_id = $rows['movie_id'];
                $sql = "SELECT * FROM movie WHERE movie_id = $movie_id";
                $res = mysqli_query($conn, $sql);
                if(mysqli_num_rows($res) > 0){
                    while($movie = mysqli_fetch_assoc($res)){
                ?>
                <style>
                    .fullscreen{
                        background: url('background-image/<?=$movie['image_url']?>')
                    }
                </style>
                <div class="fullscreen">
                    <div class="container">
                        <div class="textbox">
                            <h1 class="movietitle"> <?=$movie['title']?> </h1>
                            <p> <?=$movie['date']?> | <?=$movie['length']?> | <?=$movie['genre']?> </p>
                            <p> <?=$movie['info']?> </p>
                            <div class="button_container">
                                <button onclick="playVideo()">&#9658; Play</button>
                                <form action="add_to_watchlist.php" method="post">
                                    <input type="hidden" name="movie_id" value="<?=$movie_id?>">
                                    <button type="submit">&#10010; Watchlist</button>
                                </form>
                                <a href="movie_info.php?movie_id=<?=$movie_id?>"><button id="info_button">i</button></a>
                            </div>
                        </div>   
                    </div>
                </div>
        <?php
                    }
                }
            }
        }
        ?>
        <script>
            function playVideo(){
                var movie_id = <?=$movie_id?>;
                window.location.href = "play_movie.php?movie_id=" + movie_id;
            }
        </script>
    </div>
   

    

    
    <div class="row_container">
        <h1 id="forYou">FOR YOU</h1>
        <div class="poster_container">
            <?php
            $sql ="SELECT * FROM movie WHERE genre = '{$user_preferences}' LIMIT 5";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0){
                while($movie = mysqli_fetch_assoc($res)){ ?>
                    <img src="poster/<?=$movie['poster_url']?>" alt="" id="<?=$movie['movie_id']?>" onclick="handleImageClick(this)">
            <?php
                }
            }
            ?>
        </div>
    </div>
    
    <div class="row_container">
        <h1 id="newRelease">NEW RELEASE</h1>
        <div class="poster_container">
            <?php
            if($user_age <= 12){
                $sql ="SELECT * FROM movie WHERE genre = 'For Kids' ORDER BY date DESC LIMIT 5";
            }else{
                $sql ="SELECT * FROM movie ORDER BY date DESC LIMIT 5";
            }
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0){
                while($movie = mysqli_fetch_assoc($res)){ ?>
                    <img src="poster/<?=$movie['poster_url']?>" alt="" id="<?=$movie['movie_id']?>" onclick="handleImageClick(this)">
            <?php
                }
            }
            ?>
        </div>
    </div>

    
    
    <!-- <?php
    include "conn.php";
    // change to select based on genre later
    $sql = "SELECT * FROM movie LIMIT 5";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0){
        while($movie = mysqli_fetch_assoc($res)) { ?>
        
        <img src="poster/<?=$movie['poster_url']?>" alt="" id="<?=$movie['movie_id']?>" onclick="handleImageClick(this)">
    
    <?php } }?> -->
    
    <script>
        function handleImageClick(poster) {
            var movie_id = poster.id;
            window.location.href = "movie_info.php?movie_id=" + movie_id;
        }
    </script>
    
</body>
</html>