<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./product-info.css">
</head>
<body>
    <?php
        include 'connect.php';
        
        if(isset($_POST['btnBuy']))
        {
            $product_id = $_POST['product_id'];
            $name = $_POST['name'];
            $type = $_POST['type'];
            $brand = $_POST['brand'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $final_price = $price - ($price * $discount / 100);
            $final_price = round($final_price, 2);
            $warranty_period = $_POST['warranty_period'];
            $stock_quantity = $_POST['stock_quantity'];
            $status = $_POST['status'];
            $features = $_POST['features'];
            $image = $_POST['image']; //Lấy tên ảnh
    
                
            $sql = "SELECT * FROM products WHERE product_id = '$product_id'";

            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);
        }
    ?>

    <div class='product-info'>
        <div class='product-info-content'>
            <div class='product-info-content-left'>
                <img src="https://docker-project-image-server-production.up.railway.app/images/product/<?php echo $row['image']?>" alt="">
            </div>
            <div class='product-info-content-right'> 
                <h1><?php echo $row['name']?></h1>
                <div class="price">
                    <p id="final_price">Price: $<?php echo $row['final_price']?></p>
                    <p id="price">$<?php echo $row['price']?></p>
                    <p id="discount">-<?php echo round($row['discount'], 0)?>%</p>
                </div>
                <div class="info">
                    <p>Product ID: <?php echo $row['product_id']?></p>
                    <p>Type: <?php echo $row['type']?></p>
                    <p>Brand: <?php echo $row['brand']?></p>
                    <p>Warranty Period: <?php echo $row['warranty_period']?></p>
                    <p>Stock Quantity: <?php echo $row['stock_quantity']?></p>
                    <p>Status: <?php echo $row['status']?></p>
                </div>
                <div class="product-info-button">
                    <?php 
                        if (!$row['stock_quantity'] == 0) { ?>
                            <form action="./buy.php" method="post" >
                                <label for="quantity" style="font-size: 16px; font-weight: 600px">Quantity:</label>
                                <input type="text" id="quantity" name="quantity" style='width: 100px; font-size: 16px' value=1><br><br>

                                <button id="btnBuy" type="submit" name="btnBuy">Buy</button>
                                <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
                                <input type="hidden" name="name" value="<?php echo $row['name'];?>">
                                <input type="hidden" name="type" value="<?php echo $row['type'];?>">
                                <input type="hidden" name="brand" value="<?php echo $row['brand'];?>">
                                <input type="hidden" name="price" value="<?php echo $row['price'];?>">
                                <input type="hidden" name="discount" value="<?php echo $row['discount'];?>">
                                <input type="hidden" name="final_price" value="<?php echo $row['final_price'];?>">
                                <input type="hidden" name="image" value="<?php echo $row['image'];?>">
                                <input type="hidden" name="warranty_period" value="<?php echo $row['warranty_period'];?>">
                                <input type="hidden" name="stock_quantity" value="<?php echo $row['stock_quantity'];?>">
                                <input type="hidden" name="status" value="<?php echo $row['status'];?>">
                                <input type="hidden" name="features" value="<?php echo $row['features'];?>">
                            </form>
                            <form action="./add_to_cart.php" method="post" onsubmit="syncQuantity()">
                                <button id="btnAddToCart" type="submit" name="btnAddToCart">Add to <i class="fa-solid fa-cart-shopping"></i></button>
                                <input type="hidden" name="quantity" id="cartQuantity">
                                <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
                                <input type="hidden" name="name" value="<?php echo $row['name'];?>">
                                <input type="hidden" name="type" value="<?php echo $row['type'];?>">
                                <input type="hidden" name="brand" value="<?php echo $row['brand'];?>">
                                <input type="hidden" name="price" value="<?php echo $row['price'];?>">
                                <input type="hidden" name="discount" value="<?php echo $row['discount'];?>">
                                <input type="hidden" name="final_price" value="<?php echo $row['final_price'];?>">
                                <input type="hidden" name="image" value="<?php echo $row['image'];?>">
                                <input type="hidden" name="warranty_period" value="<?php echo $row['warranty_period'];?>">
                                <input type="hidden" name="stock_quantity" value="<?php echo $row['stock_quantity'];?>">
                                <input type="hidden" name="status" value="<?php echo $row['status'];?>">
                                <input type="hidden" name="features" value="<?php echo $row['features'];?>">
                            </form>
                        <?php } else {?>
                            <p style="font-size: 30px; font-weight: 600px; color: red;">Out of stock</p>
                        <?php }?>
                </div>
                <div class='product-info-detail'>
                    <h3>Details</h3>
                    <p><?php echo nl2br(htmlspecialchars($row['features']))?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
