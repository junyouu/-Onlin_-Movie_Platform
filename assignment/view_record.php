<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Movie Record</title>
    <link rel="stylesheet" href="view_record.css">
</head>
<body>
    <a href="admin.php"><img src="back icon.png" alt=""></a>
    <h1>Movie Database</h1>
    <table>
        <tr>
            <th>Movie ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Info</th>
            <th>Release Date</th>
            <th>Movie Length</th>
            <th>Poster URL</th>
            <th>Image URL</th>
            <th>Video URL</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        include "conn.php";

        $sql = "SELECT * FROM movie";
        $res = mysqli_query($conn,$sql);

        if(mysqli_num_rows($res) > 0){
            while($movie = mysqli_fetch_assoc($res)){ ?>
        <tr>
            <td><?=$movie['movie_id']?></td>
            <td><?=$movie['title']?></td>
            <td><?=$movie['genre']?></td>
            <td class="info"><?=$movie['info']?></td>
            <td><?=$movie['date']?></td>
            <td><?=$movie['length']?></td>
            <td><?=$movie['poster_url']?></td>
            <td><?=$movie['image_url']?></td>
            <td><?=$movie['movie_url']?></td>
            <td><a href="edit.php?movie_id=<?=$movie['movie_id']?>"><button>Edit</button></a></td>
            <td><a href="delete.php?movie_id=<?=$movie['movie_id']?>"><button>Delete</button></a></td>
        </tr>
        <?php
            }
        }

        ?>

        
    </table>
</body>
</html>

