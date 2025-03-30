<p style="width: 97.5%; text-align: center; font-size: 30px; font-weight: 700px; padding: 10px 0; margin: 20px; border-bottom: 1px solid black">
    Order Management
</p>

<div class='cart_products' style='border: none'>
    <?php
        $sql = "SELECT * FROM orders_waiting";
            
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) == 0) { ?>
            <div style="display: flex; flex-direction: column; align-items: center; margin-top: 40px; width: 100%">
                <i class="fa-solid fa-clipboard-list" style="font-size: 100px"></i>
                <p style="margin-top: 20px; font-size: 30px; font-weight: 700; ">No orders from Customers!</p>
            </div>
        <?php }
        else { 
    ?>
    <table>
        <thead>
            <tr>
                <th>Full_name</th>
                <th>Product_name</th>
                <th>Type</th>
                <th>Image</th>
                <th>Unit_price</th>
                <th>Quantity</th>
                <th>Total_price</th>
                <th>Email</th>
                <th>Phone_number</th>
                <th>Address</th>
                <th>order_date</th>
                <th>Status</th>
                <th colspan="2">Tools</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                while ($row = mysqli_fetch_array($result)) {
                    $user_id = $row['user_id'];

            ?>
                <tr>
                    <td><?php echo $row['full_name'];?></td>
                    <td><?php echo $row['product_name'];?></td>
                    <td><?php echo $row['type'];?></td>
                    <td><img src="https://docker-project-image-server-production.up.railway.app/images/product/<?php echo $row['image'];?>" alt="<?php echo $row['image'];?>"></td>
                    <td><?php echo $row['unit_price'];?></td>
                    <td><?php echo $row['quantity'];?></td>
                    <td>$<?php echo $row['total_price'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phone_number'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['order_date'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td><span><a href="accept_order.php?this_id=<?php echo $user_id ?>&product_id=<?php echo $row['product_id'];?>">Accept</a></span></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } ?>
</div>