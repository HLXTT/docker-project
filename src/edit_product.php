<?php 
    include 'connect.php';

    $this_id = $_GET['this_id'];

    $sql = "SELECT * FROM products WHERE product_id='$this_id' ";

    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query);

    if (isset($_POST['btnUpdate'])) {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $final_price = $price - ($price * $discount / 100);
        $final_price = round($final_price, 2);
        $warranty_period = $_POST['warranty_period'];
        $stock_quantity = $_POST['stock_quantity'];
        if ($stock_quantity > 0) {
            $status = 'in stock';
        }
        else {
            $status = 'out of stock';
        }
        $features = $_POST['features'];

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image = $_FILES['image']['name']; //Lấy tên ảnh
            $image_tmp_name = $_FILES['image']['tmp_name']; //Lấy địa chỉ của ảnh
            move_uploaded_file($image_tmp_name, '/usr/share/nginx/html/images/product/'.$image);
        }
        else {
            // Nếu không có file mới, giữ lại đường dẫn cũ
            $image = $row['image'];
        }

        $sql = "UPDATE products SET name='$name', type='$type', brand='$brand', price='$price', discount='$discount', final_price='$final_price', image='$image', warranty_period='$warranty_period', stock_quantity='$stock_quantity', status='$status', features='$features' WHERE product_id = '$this_id' ";

        mysqli_query($conn, $sql);

        $sql1 = "UPDATE new_products SET name='$name', type='$type', brand='$brand', price='$price', discount='$discount', final_price='$final_price', image='$image', warranty_period='$warranty_period', stock_quantity='$stock_quantity', status='$status', features='$features' WHERE product_id = '$this_id' ";

        mysqli_query($conn, $sql1);

        $sql2 = "UPDATE popular_products SET name='$name', type='$type', brand='$brand', price='$price', discount='$discount', final_price='$final_price', image='$image', warranty_period='$warranty_period', stock_quantity='$stock_quantity', status='$status', features='$features' WHERE product_id = '$this_id' ";

        mysqli_query($conn, $sql2);

        header('location: index.php?act=product');
        exit();
    }
?>

<div class="edit-product-form">
    <form method="post" enctype="multipart/form-data">
        <div style="display: flex; align-items: center; text-align: center; width: 100%"><h3 style="width: 100%; font-size: 25px; margin: 20px 0">Edit Product</h3></div>
        <table>
            <tr>
                <td>
                    <label for="name">Name:</label>
                </td>
                <td>
                    <input type="text" id="name" name="name" value="<?php echo $row['name'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="type">Type:</label>
                </td>
                <td>
                    <input type="text" id="type" name="type" value="<?php echo $row['type'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="brand">Brand:</label>
                </td>
                <td>
                    <input type="text" id="brand" name="brand" value="<?php echo $row['brand'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="price">Price:</label>
                </td>
                <td>
                    <input type="text" id="price" name="price" value="<?php echo $row['price'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="discount">Discount:</label>
                </td>
                <td>
                    <input type="text" id="discount" name="discount" value="<?php echo $row['discount'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="image"><img src="http://localhost:8081/images/product/<?php echo $row['image'] ?>" alt="" style='width: 100px; height: 100px'></label>
                </td>
                <td>
                    <input type="file" id="image" name="image" value="<?php echo $row['image'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="warranty_period">Warranty period:</label>
                </td>
                <td>
                    <input type="text" id="warranty_period" name="warranty_period" value="<?php echo $row['warranty_period'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="stock_quantity">Stock quantity:</label>
                </td>
                <td>
                    <input type="text" id="stock_quantity" name="stock_quantity" value="<?php echo $row['stock_quantity'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="status">Status:</label>
                </td>
                <td>
                    <input type="text" id="status" name="status" value="<?php echo $row['status'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="features">Features:</label>
                </td>
                <td>
                    <textarea id="features" name="features" rows="20" cols="50"><?php echo $row['features'] ?></textarea>
                </td>
            </tr>
        </table>
        <button name="btnUpdate">Update</button>
    </form>
</div>
