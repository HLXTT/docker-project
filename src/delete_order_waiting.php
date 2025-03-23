<?php
    include 'connect.php';

    session_start();

    $user_id = $_GET['this_id'];
    $product_id = $_GET['product_id'];

    $sql = "DELETE FROM orders_waiting WHERE user_id='$user_id' AND product_id='$product_id'";

    mysqli_query($conn, $sql);
    header('location: index.php?act=cart');
?>