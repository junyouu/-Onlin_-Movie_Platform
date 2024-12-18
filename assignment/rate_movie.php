<?php
session_start();

$user_id = $_SESSION['user_id'];
$rating = $_POST['rating'];
$movie_id = $_POST['movie_id'];
$submit_value = $_POST['submit'];

include "conn.php";

if($submit_value == "Update"){
    $sql = "UPDATE rating SET rating_star = $rating WHERE user_id = $user_id AND movie_id = $movie_id";
    $res = mysqli_query($conn, $sql);
}elseif($submit_value == "Rate"){
    $sql = "INSERT INTO rating(rating_star, user_id, movie_id)
            VALUES ('$rating', '$user_id', '$movie_id')";
    $res = mysqli_query($conn, $sql);
}


if(mysqli_affected_rows($conn) > 0){
    header("Location: movie_info.php?movie_id=".$movie_id);
}else{
    echo "Problem occurs when rating the movie!";
}

?>