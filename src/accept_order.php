<?php
    include 'connect.php';

    session_start();

    $user_id = $_GET['this_id'];
    $product_id = $_GET['product_id'];

    $sql = "SELECT * FROM orders_waiting WHERE user_id='$user_id' AND product_id='$product_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $full_name = $row['full_name'];
    $product_name = $row['product_name'];
    $type = $row['type'];
    $image = $row['image'];
    $unit_price = $row['unit_price'];
    $quantity = $row['quantity'];
    $total_price = $row['total_price'];
    $email = $row['email'];
    $phone_number = $row['phone_number'];
    $address = $row['address'];
    $order_date = $row['order_date'];
    $status = $row['status'];

    $sql1 = "INSERT INTO orders (user_id, product_id, full_name, product_name, type, image, unit_price, quantity, total_price, email, phone_number, address, order_date, status) 
            VALUES ('$user_id', '$product_id', '$full_name', '$product_name', '$type', '$image', '$unit_price', '$quantity', '$total_price', '$email', '$phone_number', '$address', '$order_date', 'Accepted')";
    
    mysqli_query($conn, $sql1);
    
    $sql2 = "DELETE FROM orders_waiting WHERE user_id='$user_id' AND product_id='$product_id'";

    mysqli_query($conn, $sql2);

    header("Location: index.php?act=order_management");
    exit();
?>