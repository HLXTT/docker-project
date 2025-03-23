<?php
    include 'connect.php';

    session_start();

    $username = $_GET['this_name'];

    $sql = "DELETE FROM accounts WHERE username = '$username'";

    mysqli_query($conn, $sql);

    header('location: index.php?act=personnel_management');
    exit();
?>