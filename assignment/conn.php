<?php
$name = "localhost";
$username = "root";
$password = "";
$db_name = "assignment_backup";

$conn = mysqli_connect($name, $username, $password, $db_name);

if(mysqli_connect_errno()){
    die("<script>alert('Connection failed: Please check yout SQL connection!');</script>");
}
?>