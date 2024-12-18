<?php
include "conn.php";
session_start();
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="movie_info.css">
    <title>Movie Info</title>
    <link rel="stylesheet" href="header.css">
    <style>
        <?php
             $movie_id = $_GET['movie_id'];
             include "conn.php";
             $sql = "SELECT * FROM movie WHERE movie_id = $movie_id";
             $res = mysqli_query($conn, $sql);
             if (mysqli_num_rows($res) > 0){
                while($movie = mysqli_fetch_assoc($res)){ 
                    $image_url = $movie['image_url'];
                }
             }
        ?>
        .fullscreen{
            background: url('background-image/<?=$image_url?>')
        }
    </style>
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
                    include "conn.php";
                    $user_id = $_SESSION['user_id'];
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
    <?php
    $movie_id = $_GET['movie_id'];
    include "conn.php";
    $sql = "SELECT * FROM movie WHERE movie_id = $movie_id";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0){
        while($movie = mysqli_fetch_assoc($res)){ ?>

            <div class="fullscreen">
                <div class="container">
                    <div class="textbox">
                        <h1 class="movietitle"> <?=$movie['title']?> </h1>
                        <p> <?=$movie['date']?> | <?=$movie['length']?> | <?=$movie['genre']?> </p>
                        <p> <?=$movie['info']?> </p>
                        <div class="button_container">
                            <button onclick="add_to_history()">&#9658; Play</button>
                            <form action="add_to_watchlist.php" method="post">
                                <input type="hidden" name="movie_id" value="<?=$movie_id?>">
                                <button type="submit">&#10010; Watchlist</button>
                            </form>
                        </div>
                    </div>   
                </div>
            </div>

    <?php
        }
    }
    ?>

    <script>
        function add_to_history(){
            var movie_id = <?=$movie_id?>;
            window.location.href = "add_to_history.php?movie_id=" + movie_id;
        }
    </script>


    <div class="section1">

        <div class="rating">
            <div class="avg_rating">
                <h1>Rating</h1>
                <?php
                include "conn.php";
                $sql = "SELECT ROUND(AVG(rating_star), 2) AS avg_rating FROM rating GROUP BY movie_id HAVING movie_id = $movie_id";
                $res = mysqli_query($conn, $sql);
                if(mysqli_num_rows($res) > 0){ 
                    $avg_rating = mysqli_fetch_assoc($res)['avg_rating']; ?>
                    <h2><?=$avg_rating?></h2>
                <?php
                }else{ ?>
                    <h2>0.00</h2>
                <?php
                }
                ?>

            </div>
        </div>

        <div class="rating_count">
            <h1>Rating Count</h1>
            <?php
            $sql = "SELECT COUNT(*) AS rating_count FROM rating WHERE movie_id = $movie_id";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0){
                $rating_count = mysqli_fetch_assoc($res)['rating_count'];
            }
            ?>
            <h2><?=$rating_count?></h2>

        </div>

        <div class="user_rating">
            <?php

            $sql = "SELECT * FROM rating WHERE user_id = '$user_id' AND movie_id = '$movie_id'";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0){ 
                while($rows = mysqli_fetch_assoc($res)){ ?>

                    <form action="rate_movie.php" method="post">
                        <input type="hidden" name="movie_id" value="<?=$_GET['movie_id']?>">
                        <div class="star">
                            <input type="hidden" name="movie_id" value="<?=$_GET['movie_id']?>">
                            <input type="radio" name="rating" id="5star" value="5" <?=($rows['rating_star'] == '5')?'checked':'';?> >
                            <label for="5star">&#9733;</label>
                            <input type="radio" name="rating" id="4star" value="4" <?=($rows['rating_star'] == '4')?'checked':'';?>>
                            <label for="4star">&#9733;</label>
                            <input type="radio" name="rating" id="3star" value="3" <?=($rows['rating_star'] == '3')?'checked':'';?>>
                            <label for="3star">&#9733;</label>
                            <input type="radio" name="rating" id="2star" value="2" <?=($rows['rating_star'] == '2')?'checked':'';?>>
                            <label for="2star">&#9733;</label>
                            <input type="radio" name="rating" id="1star" value="1" <?=($rows['rating_star'] == '1')?'checked':'';?>>
                            <label for="1star">&#9733;</label>
                        </div>
                        <input type="submit" name="submit" value="Update">
                        <p>You already rated this movie.</p>
                    </form>

            <?php
                }
            }else{ 
            ?>
                <form action="rate_movie.php" method="post">
                    <div class="star">
                        <input type="hidden" name="movie_id" value="<?=$_GET['movie_id']?>">
                        <input type="radio" name="rating" id="5star" value="5">
                        <label for="5star">&#9733;</label>
                        <input type="radio" name="rating" id="4star" value="4">
                        <label for="4star">&#9733;</label>
                        <input type="radio" name="rating" id="3star" value="3">
                        <label for="3star">&#9733;</label>
                        <input type="radio" name="rating" id="2star" value="2">
                        <label for="2star">&#9733;</label>
                        <input type="radio" name="rating" id="1star" value="1">
                        <label for="1star">&#9733;</label>
                    </div>
                    <input type="submit" name="submit" value="Rate">
                </form>
            <?php
            }
            ?>
            

        </div>

    </div>
    
    <div class="review_section">
        <form action="post_review.php" method="post">
            <input type="hidden" name="movie_id" value="<?=$_GET['movie_id']?>">
            <input type="text" class="review_bar" name="review" id="review_text" 
            placeholder="   What do you think about the movie?" required>
            <input type="submit" class="post_button" value="POST">
        </form>
    </div>
    
    
    <?php
    $sql = "SELECT COUNT(*) AS review_count FROM review WHERE movie_id = $movie_id";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0){
        $review_count = mysqli_fetch_assoc($res)['review_count'];
    }
    ?>

    <div class="review">
        <div class="review_count">
            <h1>Reviews (<?=$review_count?>)</h1>
        </div>

        <?php
        $sql = "SELECT review_text, profile_name FROM review, user_profile 
                WHERE movie_id = $movie_id AND review.user_id = user_profile.user_id";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res) > 0){
            while($rows = mysqli_fetch_assoc($res)){ ?>
                        <div class="comment_box">
                            <h2><?=$rows['profile_name']?></h2>
                            <p><?=$rows['review_text']?></p>
                        </div>          
        <?php
            }
        }  
        ?>

    </div>


    </div>
    


    
</body>
</html>