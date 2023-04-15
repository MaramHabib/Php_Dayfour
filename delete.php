<?php
    require_once "conn.php";
    $id = $_GET["del"];
    $query = "DELETE FROM students WHERE st_id = '$id'";
    if (mysqli_query($conn, $query)) {
        header("location: index.php");
    } else {
         echo "Something went wrong. Please try again later.";
    }
?>