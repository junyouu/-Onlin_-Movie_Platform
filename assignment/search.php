<?php
// PRG post-redirect-get pattern
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search_title'])) {
    header("Location: search_result.php?search_title=" . urlencode($_POST['search_title']));
    exit(); 
}else{
    echo "<script>alert('Something went wrong!');
    window.history.back();</script>";
}
?>