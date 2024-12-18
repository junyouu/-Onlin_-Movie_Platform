<?php
if(!ISSET($_GET['search_title'])){
    header("Location: mainpage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="header.css">
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
                    session_start();
                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM user_profile WHERE user_id = $user_id";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res) > 0){
                        while($user = mysqli_fetch_assoc($res)){
                            $user_age = $user['user_age']; ?>
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
    
    
    
    <div class="content">
        <?php
        include "conn.php";
        $search_title = $_GET['search_title']; 
        
        if($user_age > 12){
            $sql = "SELECT * FROM movie WHERE title LIKE '%".$search_title."%'";
        }elseif($user_age <= 12){
            $sql = "SELECT * FROM movie WHERE (title LIKE '%".$search_title."%') AND movie.genre = 'For Kids'";
        }
        $res = mysqli_query($conn, $sql);
        ?>


        <?php
        if(mysqli_num_rows($res) > 0){ ?>
            <h1 class="search_result">Search Result for '<?=$search_title?>'</h1>
            <?php
            while($movie = mysqli_fetch_assoc($res)){ ?>


                <div class="container">
                    <div class="image">
                        <img src="poster/<?=$movie['poster_url']?>" alt="">
                    </div>
                    <div class="textbox">
                        <div class="text">
                            <h1 class="movietitle"> <?=$movie['title']?> </h1>
                            <p> <?=$movie['date']?> | <?=$movie['length']?> | <?=$movie['genre']?> </p>
                            <p> <?=$movie['info']?> </p>
                            <button id=<?=$movie['movie_id']?> onclick="MovieInfo(this)">Watch Now</button>
                        </div>
                    </div>
                </div> 
        
        <script>
            function MovieInfo(movie){
                var movie_id = movie.id;
                window.location.href = "movie_info.php?movie_id=" + movie_id;
            }
        </script>


        <?php        
            }
        }else{ ?>
             <h1 class="search_result">No Result Found for '<?=$search_title?>'</h1>
        <?php
        }
        ?>
    </div>
    
</body>
</html>