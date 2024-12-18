<?php
session_start();
include "conn.php";

$user_id = $_SESSION['user_id'];
$sql = "SELECT watchlist_id FROM watchlist WHERE user_id = $user_id";
$res= mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0){
    while($rows = mysqli_fetch_assoc($res)){
        $watchlist_id = $rows['watchlist_id'];
    }
}

$movie_id = $_POST['movie_id'];
$sql = "SELECT * FROM watchlist_movie WHERE watchlist_id = $watchlist_id AND movie_id = $movie_id";
$res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0 ){
    echo "<script>alert('Movie already in Watchlist!'); 
    window.history.back();</script>";
    exit();
}


$sql = "INSERT INTO watchlist_movie(watchlist_id, movie_id) VALUES('$watchlist_id', '$movie_id')";
$res = mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn) > 0){
    echo "<script>alert('Movie Added Successfully!');
    window.history.back();</script>";
}else{
    echo "<script>alert('Problem occurs while adding movie to watchlist.');
    window.history.back();</script>";
}

?>