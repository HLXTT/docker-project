<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="allproduct.css">
</head>
<body>
    <?php
        include "connect.php";

        if (isset($_POST['btnSearch'])) {
            $search = $_POST['search'];
            $search_array = explode(' ', $search);

            $formatted_words = array_map(function($word) {
                return '%' . $word . '%';
            }, $search_array);

            $search_result = implode('', $formatted_words);;
        }
        else {
            header('location: index.php');
        }
    
        $sql = "SELECT * FROM products WHERE name LIKE '%$search_result%'";

        $result = mysqli_query($conn, $sql);
    ?>

    <div class="search-product">

        <h1>Result for <?php echo $search ?></h1>

        <?php
            while ($row = mysqli_fetch_assoc($result)) {      
                ?>
                    <a href="#">
                        <div class="product">
                            <img src="https://docker-project-image-server-production.up.railway.app/images/product/<?php echo $row['image'];?>" alt="product">
                            <div class="product-info">
                                <h4><?php echo $row['name'];?></h4>
                                <div class="price">
                                    <p>Price: $<?php echo $row['final_price'];?></p>
                                    <?php
                                        if ($row['discount'] > 0) {
                                           ?>
                                                <span class="discount">-<?php echo round($row['discount'])?>%</span>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <form action="./index.php?act=product-info" method="post">
                                    <button type="Submit" name="btnBuy">Buy</button>
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
                            </div>
                        </div>
                    </a>
                <?php } 
        ?>
    </div>
</body>
</html>
