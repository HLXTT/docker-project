<?php 
    include 'connect.php';

    session_start();

    if (!isset($_SESSION['mySession'])) {
        header('location: login.php');
    }
    else {
        if (isset($_POST['btnAddToCart'])) {
            $user_id = $_SESSION['mySession'];
            $product_id = $_POST['product_id'];
            $name = $_POST['name'];
            $image = $_POST['image']; //Lấy tên ảnh
            $type = $_POST['type'];
            $brand = $_POST['brand'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $final_price = $price - ($price * $discount / 100);
            $final_price = round($final_price, 2);
            $warranty_period = $_POST['warranty_period'];
            $stock_quantity = $_POST['stock_quantity'];
            $quantity = $_POST['quantity'];
            if ($stock_quantity > 0) {
                $status = 'in stock';
            }
            else {
                $status = 'out of stock';
            }
            $features = $_POST['features'];
            $total_price = round($final_price * $quantity,2);

            $sql = "INSERT INTO cart (user_id, product_id, product_name, product_image, product_type, unit_price, quantity, discount, total_price) 
            VALUES ('$user_id', '$product_id', '$name', '$image', '$type', '$price', '$quantity', '$discount', '$total_price')";

            mysqli_query($conn, $sql);

            header('location: index.php?act=cart');
            exit();
        }
    }
?>