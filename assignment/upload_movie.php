<?php
include "conn.php";

$title = $_POST['title'];
$genre = $_POST['genre'];
$info = $_POST['info'];
$date = $_POST['date'];
$length = $_POST['length'];

// create image url
$poster_name = $_FILES['poster']['name'];
$poster_temp_file = $_FILES['poster']['tmp_name'];
$poster_files_format =  strtolower(pathinfo($poster_name, PATHINFO_EXTENSION)); 
$poster_url = uniqid('IMG-', True).'.'.$poster_files_format;

// upload image into folder
$poster_path = 'poster/'.$poster_url;
move_uploaded_file($poster_temp_file, $poster_path);

// repeat the same thing for background image
$image_name = $_FILES['image']['name'];
$image_temp_file = $_FILES['image']['tmp_name'];
$image_files_format =  strtolower(pathinfo($image_name, PATHINFO_EXTENSION)); 
$image_url = uniqid('IMG-', True).'.'.$image_files_format;

$image_path = 'background-image/'.$image_url;
move_uploaded_file($image_temp_file, $image_path);

// movie
$movie_name = $_FILES['movie']['name'];
$movie_temp_file = $_FILES['movie']['tmp_name'];
$movie_files_format =  strtolower(pathinfo($movie_name, PATHINFO_EXTENSION)); 
$movie_url = uniqid('VID-', True).'.'.$movie_files_format;

$movie_path = 'movie/'.$movie_url;
move_uploaded_file($movie_temp_file, $movie_path);

// upload data to database
$sql = "INSERT INTO movie(title, genre, info, date, length, poster_url, image_url, movie_url) 
        VALUES ('$title', '$genre ', '$info', '$date', '$length', '$poster_url', '$image_url', '$movie_url')";
$res = mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Movie Updated Successfully!');
              window.location.href = 'upload_movie.html';</script>";
}else{
        echo "<script>alert('Movie Added Successfully!');</script>";
}
?>