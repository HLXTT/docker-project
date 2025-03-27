<?php 
    include 'connect.php';
    header('location: index.php?act=product');

    $this_id = $_GET['this_id'];
    $table = $_GET['table'];
    $array = ['new_products', 'popular_products', 'products'];
    echo $this_id;
    echo $table;

    if ($table == 'products') {
        foreach ($array as $i) {

            $sql = "DELETE FROM $i WHERE product_id='$this_id' ";

            if ($i == 'products') {
            $image_sql = "SELECT * FROM products WHERE product_id='$this_id'";

            $image_result = mysqli_query($conn, $image_sql);

            $image_row = mysqli_fetch_assoc($image_result);

            unlink('/usr/share/nginx/html/images/product/'.$image_row['image']);
            }

            mysqli_query($conn, $sql);
        }
    } 

    else {
    $sql = "DELETE FROM $table WHERE product_id='$this_id' ";
    mysqli_query($conn, $sql);
    }

    
?>