<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Watchlist</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="manage_watchlist.css">
</head>
<body>
    <a href="watchlist.php"><img src="back icon.png" alt=""></a>
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
    <div class="content">
        <div class="container">
            <h1>Manage Watchlist</h1>
            <table>
                <tr>
                    <th>Movie Name</th>
                    <th>Movie Length</th>
                    <th>Delete</th>
                <?php
                include "conn.php";
                $user_id = $_SESSION['user_id'];

                $sql = "SELECT movie.* FROM movie, watchlist, watchlist_movie 
                        WHERE watchlist.user_id = $user_id 
                        AND watchlist.watchlist_id = watchlist_movie.watchlist_id
                        AND movie.movie_id = watchlist_movie.movie_id
                        ORDER BY timestamp DESC";
                $res = mysqli_query($conn, $sql); 

                if(mysqli_num_rows($res) > 0){
                    while($movie = mysqli_fetch_assoc($res)){ ?>
                        <tr>
                            <td><?=$movie['title']?></td>
                            <td><?=$movie['length']?></td>
                            <td><a href="delete_from_watchlist.php?movie_id=<?=$movie['movie_id']?>"><button>Delete</button></a></td>
                        </tr>
                    <?php
                    }    
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>