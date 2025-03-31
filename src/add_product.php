<?php 
    include "connect.php";

    if (isset($_POST['btnAdd'])) { //Sử dụng $_POST vì phần form cho method="post", kiểm tra xem nút có tồn tại hay không
        $name = $_POST['name'];
        $type = $_POST['type'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $final_price = $price - ($price * $discount / 100);
        $final_price = round($final_price, 2);
        $warranty_period = $_POST['warranty_period'];
        $stock_quantity = $_POST['stock_quantity'];
        $id = $conn->insert_id;


        if ($stock_quantity > 0) {
            $status = 'in stock';
        }
        else {
            $status = 'out of stock';
        }
        
        $features = $_POST['features'];
        $image = $_FILES['image']['name']; //Lấy tên ảnh
        $image_tmp_name = $_FILES['image']['tmp_name']; //Lấy địa chỉ của ảnh

        $uploadDir = '/usr/share/nginx/html/images/product/';

// Kiểm tra và tạo thư mục nếu chưa có
        if (!file_exists($uploadDir)) {
            if (!mkdir($uploadDir, 0775, true)) {
                die("Lỗi: Không thể tạo thư mục upload!");
            }
            chown($uploadDir, 'www-data');
            chmod($uploadDir, 0775);
        }

        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            echo "Upload thành công: " . basename($_FILES['image']['name']);
        } else {
            echo "Upload thất bại! Kiểm tra quyền ghi hoặc đường dẫn!";
            print_r(error_get_last());
        }




        $sql2 = "SELECT * FROM products WHERE name = '$name'";
        $result = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($result);

        if(isset($_GET['table'])) {
            if ($_GET['table'] != 'products') {
                if (!mysqli_num_rows($result) == 0) {
                    $id = $row['product_id'];
                    $name = $row['name'];
                    $type = $row['type'];
                    $brand = $row['brand'];
                    $price = $row['price'];
                    $discount = $row['discount'];
                    $final_price = $price - ($price * $discount / 100);
                    $final_price = round($final_price, 2);
                    $warranty_period = $row['warranty_period'];
                    $stock_quantity = $row['stock_quantity'];
            
                    if ($stock_quantity > 0) {
                        $status = 'in stock';
                    }
                    else {
                        $status = 'out of stock';
                    }
                    
                    $features = $row['features'];
                    $image = $row['image']; //Lấy tên ảnh   
                }
            
                $table = $_GET['table'];

                $sql1 = "INSERT INTO $table (product_id, name, type, brand, price, discount, final_price, image, warranty_period, stock_quantity, status, features) 
                        VALUES ('$id', '$name', '$type', '$brand', '$price', '$discount', '$final_price', '$image', '$warranty_period', '$stock_quantity', '$status', '$features')" ;

                mysqli_query($conn, $sql1);
                }
        }

        if (mysqli_num_rows($result) == 0) {

            $sql = "INSERT INTO products (name, type, brand, price, discount, final_price, image, warranty_period, stock_quantity, status, features) 
            VALUES ( '$name', '$type', '$brand', '$price', '$discount', '$final_price', '$image', '$warranty_period', '$stock_quantity', '$status', '$features')" ;

            mysqli_query($conn, $sql);
        }

        #header('location: index.php?act=product');
        exit();
   } 
?>

<div class="edit-product-form">
    <form action="index.php?act=add_product&table=<?php echo $_GET['table'] ?>" method="post" enctype="multipart/form-data">
        <div style="display: flex; align-items: center; text-align: center; width: 100%"><h3 style="width: 100%; font-size: 25px; margin: 20px 0">Add Product</h3></div>
        <table>
                <tr>
                    <td>
                        <label for="name">Name: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" id="name" name="name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="type">Type: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" id="type" name="type">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="brand">Brand: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" id="brand" name="brand">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="price">Price: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" id="price" name="price" value=0>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="discount">Discount: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" id="discount" name="discount" value=0>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="image">Image: &nbsp</label>
                    </td>
                    <td>
                        <input type="file" id="image" name="image">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="warranty_period">Warranty period: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" id="warranty_period" name="warranty_period" value=12>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="stock_quantity">Stock quantity: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" id="stock_quantity" name="stock_quantity" value=0>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="status">Status: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" id="status" name="status">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="features">Features: &nbsp</label>
                    </td>
                    <td>
                        <textarea id="features" name="features" rows="20" cols="50"></textarea>
                    </td>
                </tr>
            </table>
            <button id="add" name="btnAdd">Add</button>
        </form>
    </div>
</div>