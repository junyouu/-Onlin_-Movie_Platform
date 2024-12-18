<?php
$movie_id = $_GET['movie_id'];

if(ISSET($_GET['confirm']) && $_GET['confirm'] == 'True'){
    session_start();
    $user_id = $_SESSION['user_id'];
    include "conn.php";

    $sql = "SELECT watchlist_id FROM watchlist WHERE user_id = $user_id";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0){
        while($rows = mysqli_fetch_assoc($res)){
            $watchlist_id = $rows['watchlist_id'];
        }
    }
    $sql = "DELETE FROM watchlist_movie WHERE movie_id = $movie_id AND watchlist_id = $watchlist_id";
    $res = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Movie Deleted From Watchlist Successfully!');
        window.location.href = 'manage_watchlist.php';</script>";
    }else{
        echo "<script>alert('Delete Not Successful!');
        window.location.href = 'manage_watchlist.php';</script>";
    }
    exit();
}

echo 
"<script>
if(confirm('Are you sure you want to delete this item?')){
    window.location.href = 'delete_from_watchlist.php?movie_id=$movie_id&confirm=True';
}else{
    window.history.back();
}
</script>";
?>



