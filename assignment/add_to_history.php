<?php
include "conn.php";
session_start();
$user_id = $_SESSION['user_id'];
$movie_id = $_GET['movie_id'];

$sql = "SELECT * FROM history WHERE user_id = $user_id";
$res =mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0){
    while($rows = mysqli_fetch_assoc($res)){
        $history_id = $rows['history_id'];
    }
}

$sql = "SELECT * FROM history_movie WHERE history_id = $history_id AND movie_id = $movie_id";
$res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0 ){
    $sql = "UPDATE history_movie SET timestamp = NOW() WHERE history_id = $history_id AND movie_id = $movie_id";
    $res = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) > 0){
        header("Location: play_movie.php?movie_id=".$movie_id);
    }else{
        echo "<script>alert('Problem occurs!');
        window.history.back();</script>";
    }
    exit();
}

$sql = "INSERT INTO history_movie(history_id, movie_id) VALUES('$history_id', '$movie_id')";
$res = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn) > 0){
    header("Location: play_movie.php?movie_id=".$movie_id);
}else{
    echo "<script>alert('Problem occurs!');
    window.history.back();</script>";
}
?>