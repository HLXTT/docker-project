<?php
    include 'connect.php';

    if (isset($_GET['this_id'])) {
        $poster_id = $_GET['this_id'];

        $sql = "SELECT * FROM posters WHERE poster_id = '$poster_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        unlink('http://localhost:8081/images/posters/'. $row['image']);

        $sql1 = "DELETE FROM posters WHERE poster_id = '$poster_id'";

        mysqli_query($conn, $sql1);
    }

    header("Location: index.php?act=poster");
    exit();
?>