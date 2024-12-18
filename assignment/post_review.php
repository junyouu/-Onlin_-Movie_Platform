<?php
session_start();
$user_id = $_SESSION['user_id'];
$review_text = $_POST['review'];
$movie_id = $_POST['movie_id'];

include "conn.php";
$sql = "INSERT INTO review(movie_id, user_id, review_text)
        VALUES ('$movie_id', '$user_id', '$review_text')";
$res = mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn) > 0){
    header("Location: movie_info.php?movie_id=".$movie_id);
}else{
    echo "Problem occurs when posting review!";
}
?>

