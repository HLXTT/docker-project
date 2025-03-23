<?php
    include 'connect.php';

    session_start();

        if (isset($_POST['btnBuy'])) {
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
            $quantity = $_POST['quantity'];
            $stock_quantity = $_POST['stock_quantity']-$quantity;
            if ($stock_quantity > 0) {
                $status = 'in stock';
            }
            else {
                $status = 'out of stock';
            }
            $features = $_POST['features'];
            $total_price = round($final_price * $quantity,2);

            $sql2 = "SELECT * FROM accounts WHERE user_id = $user_id";

            $result = mysqli_query($conn, $sql2);

            $row = mysqli_fetch_assoc($result);

            $full_name = $row['full_name'];
            $phone_number = $row['phone_number'];
            $email = $row['email'];
            $address = $row['address'];

            $order_date = date("d-m-Y");

            $sql1 = "UPDATE products SET stock_quantity = '$stock_quantity', status = '$status' WHERE product_id='$product_id'";

            $sql = "INSERT INTO orders_waiting (user_id, product_id, full_name, product_name, type, image, unit_price, quantity, total_price, email, phone_number, address, order_date, status) 
            VALUES ('$user_id', '$product_id', '$full_name', '$name', '$type', '$image', '$final_price', '$quantity', '$total_price', '$email', '$phone_number', '$address', '$order_date', 'have not accepted')";


            mysqli_query($conn, $sql1);

            mysqli_query($conn, $sql);
        }
        else {
            $product_id = $_GET['this_id'];
            $sql = "SELECT * FROM products WHERE product_id='$product_id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $user_id = $_SESSION['mySession'];
            $product_id = $row['product_id'];
            $name = $row['name'];
            $image = $row['image']; //Lấy tên ảnh
            $type = $row['type'];
            $brand = $row['brand'];
            $price = $row['price'];
            $discount = $row['discount'];
            $final_price = $price - ($price * $discount / 100);
            $final_price = round($final_price, 2);
            $warranty_period = $row['warranty_period'];

            $sql1 = "SELECT quantity FROM cart WHERE product_id='$product_id'";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($result1);

            $quantity = $row1['quantity'];
            $stock_quantity = $row['stock_quantity']-$quantity;

            if ($stock_quantity > 0) {
                $status = 'in stock';
            }
            else {
                $status = 'out of stock';
            }
            $features = $row['features'];
            $total_price = round($final_price * $quantity,2);

            $sql2 = "SELECT * FROM accounts WHERE user_id = $user_id";

            $result = mysqli_query($conn, $sql2);

            $row = mysqli_fetch_assoc($result);

            $full_name = $row['full_name'];
            $phone_number = $row['phone_number'];
            $email = $row['email'];
            $address = $row['address'];

            $order_date = date("d-m-Y");

            $sql3 = "UPDATE products SET stock_quantity = '$stock_quantity', status = '$status' WHERE product_id='$product_id'";

            $sql4 = "INSERT INTO orders_waiting (user_id, product_id, full_name, product_name, type, image, unit_price, quantity, total_price, email, phone_number, address, order_date, status) 
            VALUES ('$user_id', '$product_id', '$full_name', '$name', '$type', '$image', '$final_price', '$quantity', '$total_price', '$email', '$phone_number', '$address', '$order_date', 'have not accepted')";

            mysqli_query($conn, $sql3);

            mysqli_query($conn, $sql4);

            $sql5 = "DELETE FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";

            mysqli_query($conn, $sql5);
        }
        header('location: index.php?act=cart');
        exit();
?>