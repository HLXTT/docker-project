<?php 
    include 'connect.php';
    header('location: index.php?act=cart');

    $product_id = $_GET['product_id'];
    $this_id = $_GET['this_id'];
    echo $this_id;
    echo $product_id;

    $sql = "DELETE FROM cart WHERE user_id='$this_id' AND product_id='$product_id'";

    mysqli_query($conn, $sql);

    
    exit();
?>