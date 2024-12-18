<?php
$movie_id = $_GET['movie_id'];

if(ISSET($_GET['confirm']) && $_GET['confirm'] == 'True'){
    include "conn.php";

    $sql = "DELETE FROM history_movie WHERE movie_id = $movie_id";
    $res = mysqli_query($conn, $sql);

    $sql = "DELETE FROM watchlist_movie WHERE movie_id = $movie_id";
    $res = mysqli_query($conn, $sql);

    $sql = "DELETE FROM movie WHERE movie_id = $movie_id";
    $res = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Movie Deleted Successfully!');
        window.location.href = 'view_record.php'</script>";
    }else{
        echo "<script>alert('Delete Not Successful!');
        window.location.href = 'view_record.php'</script>";
    }
    exit();
}

echo 
"<script>
if(confirm('Are you sure you want to delete this item?')){
    window.location.href = 'delete.php?movie_id=$movie_id&confirm=True';
}else{
    window.history.back();
}
</script>";
?>


