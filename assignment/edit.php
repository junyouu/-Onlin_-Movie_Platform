<?php
include "conn.php";
$movie_id = $_GET['movie_id'];
$sql = "SELECT * FROM movie WHERE movie_id = $movie_id";
$res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0){
    while($movie = mysqli_fetch_assoc($res)){
        $title = $movie['title'];
        $genre = trim($movie['genre']);
        $info = $movie['info'];
        $date = $movie['date'];
        $length = $movie['length'];
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie Record</title>
    <link rel="stylesheet" href="upload_movie.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h1>Update Movie Record</h1>
    <div class="container1"> 
   
    <form action="edit.php?movie_id=<?=$_GET['movie_id']?>" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?=$title?>"> 
        <br>
        <br>
        <label for="genre">Genre:</label>
            <select name="genre" id="">
                <option value="">Please Select</option>
                <option value="Romance" <?= ($genre == 'Romance') ? 'selected' : '' ?>>Romance</option>
                <option value="Superhero" <?= ($genre == 'Superhero') ? 'selected' : '' ?>>Superhero</option>
                <option value="Science Fiction" <?= ($genre == 'Science Fiction') ? 'selected' : '' ?>>Science Fiction</option>
                <option value="For Kids" <?= ($genre == 'For Kids') ? 'selected' : '' ?>>For Kids</option>
            </select>
        <div class="movieinfobox">
        <br>
        <label for="info">Movie Info: </label>
        <input type="text" name="info" value="<?=$info?>">
        </div>
        <br>
        <label for="date">Release Date:</label>
        <input type="date" name="date" value="<?=$date?>">
        <br>
        <br>
        <label for="length">Movie Length:</label>
        <input type="text" name="length" value="<?=$length?>">
        <br>
        <br>
        <label for="poster">Poster (Thumbnail):</label>
        <input type="file" name="poster">
        <div class="poster">
            <span><i class="fa fa-cloud-upload"></i><p>Click to upload</p></span> 
        </div>
        <br>
        
        <label for="image">Image:</label>
        <input type="file" name="image">
        <div class="image">
            <span><i class="fa fa-cloud-upload"></i><p>Click to upload</p></span>
        </div>
        <br>
        
        <label for="movie">Movie File:</label>
        <input type="file" name="movie">
        <div class="movie">
            <span><i class="fa fa-cloud-upload"></i><p>Click to upload</p></span>
        </div>
        <br>
        
        <div class="uploadbutton_container">
            <div class="uploadbutton">
                <input type="submit" name="upload" value="Update">
            </div>
        </div>  
    </form>
    </div>
</body>
</html>



<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "conn.php";
    $movie_id = $_GET['movie_id'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $info = $_POST['info'];
    $date = $_POST['date'];
    $length = $_POST['length'];

    $sql = "UPDATE movie SET
            title = '$title',
            genre = '$genre',
            info = '$info',
            date = '$date',
            length = '$length'";
    
    if($_FILES['poster']['error'] !== UPLOAD_ERR_NO_FILE){
        // create image url
        $poster_name = $_FILES['poster']['name'];
        $poster_temp_file = $_FILES['poster']['tmp_name'];
        $poster_files_format =  strtolower(pathinfo($poster_name, PATHINFO_EXTENSION)); 
        $poster_url = uniqid('IMG-', True).'.'.$poster_files_format;

        // upload image into folder
        $poster_path = 'poster/'.$poster_url;
        move_uploaded_file($poster_temp_file, $poster_path);

        $sql .= ", poster_url = '$poster_url'";
    }
    if($_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE){
        // repeat the same thing for background image
        $image_name = $_FILES['image']['name'];
        $image_temp_file = $_FILES['image']['tmp_name'];
        $image_files_format =  strtolower(pathinfo($image_name, PATHINFO_EXTENSION)); 
        $image_url = uniqid('IMG-', True).'.'.$image_files_format;

        $image_path = 'background-image/'.$image_url;
        move_uploaded_file($image_temp_file, $image_path);

        $sql .= ", image_url = '$image_url'";
    }
    if($_FILES['movie']['error'] !== UPLOAD_ERR_NO_FILE){
        // movie
        $movie_name = $_FILES['movie']['name'];
        $movie_temp_file = $_FILES['movie']['tmp_name'];
        $movie_files_format =  strtolower(pathinfo($movie_name, PATHINFO_EXTENSION)); 
        $movie_url = uniqid('VID-', True).'.'.$movie_files_format;

        $movie_path = 'movie/'.$movie_url;
        move_uploaded_file($movie_temp_file, $movie_path);

        $sql .= ", movie_url = '$movie_url'";
    }

    $sql .= " WHERE movie_id = '$movie_id'";

    // echo $sql;

    $res = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Movie Updated Successfully!');
              window.location.href = 'view_record.php';</script>";
    }else{
        echo "<script>alert('Update Not Successful!');</script>";
    }

}

?>