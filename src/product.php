<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .edit-product thead tr th, 
        .edit-product tbody tr td, 
        .cart_products thead tr th, 
        .cart_products tbody tr td {
            text-align: center;
            padding: 5px;
            font-size: 14px;
            outline: 2px solid black;
            word-wrap: break-word;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap; /* Ngăn văn bản xuống dòng */
            max-width: 150px; /* Đặt chiều rộng tối đa (có thể tùy chỉnh) */
        }
    </style>
</head>
<body>
<div class='edit-product'>
    <p>Products</p>
    <div class="edit-product-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Final price</th>
                    <th>Image</th>
                    <th>Warranty period</th>
                    <th>Stock_quantity</th>
                    <th>Status</th>
                    <th>Features</th>
                    <th colspan="2">Tools</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    include "connect.php";

                    $sql = "SELECT * FROM products";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                ?>
                    <tr>
                        <td><?php echo $row['product_id'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['type'];?></td>
                        <td><?php echo $row['brand'];?></td>
                        <td>$<?php echo $row['price'];?></td>
                        <td><?php echo $row['discount'];?>%</td>
                        <td>$<?php echo $row['final_price'];?></td>
                        <td><img src="http://localhost:8081/images/product/<?php echo $row['image'];?>" alt="<?php echo $row['name'];?>"></td>
                        <td><?php echo $row['warranty_period'];?></td>
                        <td><?php echo $row['stock_quantity'];?></td>
                        <td><?php echo $row['status'];?></td>
                        <td><?php echo $row['features'];?></td>
                        <td><span><a href="delete_product.php? this_id=<?php echo $row['product_id']?>&table=products">Delete</a></span></td>
                        <td><span><a href="index.php?act=edit_product&this_id=<?php echo $row['product_id'];?>">Edit</a></span></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div id="add"><a href="index.php?act=add_product&table=products">Add</a></div> 
</div>


<div class='edit-product'>
    <p>New Products</p>
    <div class="edit-product-tables">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Final price</th>
                    <th>Image</th>
                    <th>Warranty period</th>
                    <th>Stock_quantity</th>
                    <th>Status</th>
                    <th>Features</th>
                    <th colspan="2">Tools</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    include "connect.php";

                    $sql = "SELECT * FROM new_products";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                ?>
                    <tr>
                        <td><?php echo $row['product_id'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['type'];?></td>
                        <td><?php echo $row['brand'];?></td>
                        <td>$<?php echo $row['price'];?></td>
                        <td><?php echo $row['discount'];?>%</td>
                        <td>$<?php echo $row['final_price'];?></td>
                        <td><img src="http://localhost:8081/images/product/<?php echo $row['image'];?>" alt="<?php echo $row['name'];?>"></td>
                        <td><?php echo $row['warranty_period'];?></td>
                        <td><?php echo $row['stock_quantity'];?></td>
                        <td><?php echo $row['status'];?></td>
                        <td><?php echo $row['features'];?></td>
                        <td><span><a href="delete_product.php? this_id=<?php echo $row['product_id']?>&table=new_products">Delete</a></span></td>
                        <td><span><a href="index.php?act=edit_product&this_id=<?php echo $row['product_id'];?>">Edit</a></span></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div id="add"><a href="index.php?act=add_product&table=new_products" >Add</a></div> 
</div>


<div class='edit-product'>
    <p>Popular Products</p>
    <div class="edit-product-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Final price</th>
                    <th>Image</th>
                    <th>Warranty period</th>
                    <th>Stock_quantity</th>
                    <th>Status</th>
                    <th>Features</th>
                    <th colspan="2">Tools</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    include "connect.php";

                    $sql = "SELECT * FROM popular_products";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                ?>
                    <tr>
                        <td><?php echo $row['product_id'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['type'];?></td>
                        <td><?php echo $row['brand'];?></td>
                        <td>$<?php echo $row['price'];?></td>
                        <td><?php echo $row['discount'];?>%</td>
                        <td>$<?php echo $row['final_price'];?></td>
                        <td><img src="http://localhost:8081/images/product/<?php echo $row['image'];?>" alt="<?php echo $row['name'];?>"></td>
                        <td><?php echo $row['warranty_period'];?></td>
                        <td><?php echo $row['stock_quantity'];?></td>
                        <td><?php echo $row['status'];?></td>
                        <td><?php echo nl2br(htmlspecialchars($row['features']));?></td>
                        <td><span><a href="delete_product.php? this_id=<?php echo $row['product_id']?>&table=popular_products">Delete</a></span></td>
                        <td><span><a href="index.php?act=edit_product&this_id=<?php echo $row['product_id'];?>">Edit</a></span></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div id="add"><a href="index.php?act=add_product&table=popular_products">Add</a></div>
</div>
</body>
</html>

