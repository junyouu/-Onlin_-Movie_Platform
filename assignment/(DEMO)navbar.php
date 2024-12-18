<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="header.css">
    <style>
        body{
            padding: 0px;
            margin: 0px;
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
                </li>
                <li><a href="watchlist.php">Watchlist</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div> 
        
        <div class="navbar">
            <label><a href="mainpage.php" class="logo">NOTFLIX</a></label>
            <ul>
                <li><a href="#forYou">For You</a></li>
                <li><a href="#newRelease">New Release</a></li>
                <li>
                    <form action="search.php" method="post">
                        <input type="text" class="searchbar" name="search_title" placeholder="Please enter movie title here" required >
                        <input type="submit" value="Search" class="search_button">
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>
