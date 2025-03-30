<!-- Nội dung -->
<div class="content">
    <div class="slides-show">
        <?php 
        include "connect.php";
        
        $sql = "SELECT * FROM posters WHERE poster_type = 'main_poster'";
        $result = mysqli_query($conn, $sql);

        $count = 0;
        $totalSlides = mysqli_num_rows($result);
        
        while ($row = mysqli_fetch_array($result)) { 
            if ($count == $totalSlides) {
                $count = 1;
            }
            $count += 1 ?>
            <div class="slide">
                <img src="https://docker-project-image-server-production.up.railway.app/images/posters/<?php echo $row['poster_image'] ?>" alt="<?php $row['poster_image'] ?>">
                <div class="numbertext" style="font-size: 30px; font-weight: 700"><?php echo $count ?> / <?php echo $totalSlides ?></div>
            </div>
        <?php }?>

        <button class="prev" onclick="plusSlide(-1, 'slide')"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="next" onclick="plusSlide(1, 'slide')"><i class="fa-solid fa-chevron-right"></i></button>
    </div>


    <div class="popular">
        <div class="title">
            <a href="index.php?table=popular_products">Popular products</a>
            <div class="left-right-button">
                <button class="prev" onclick="plusSlide(-1, 'popular-products')"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="next" onclick="plusSlide(1, 'popular-products')"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>

        <!-- Hiển thị sản phẩm -->
        <div class="products-show">
            <div class="popular-products">
            <?php 
                    include "connect.php";

                    $limit = 5;
                    $start = 0;

                    $sql = "SELECT * FROM popular_products LIMIT $limit OFFSET $start";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {      
                ?>
                    <a href="#" class="product_a">
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
                <?php } ?>
            </div>


            <div class="popular-products">
            <?php 
                    include "connect.php";

                    $limit = 5;
                    $start = 5;

                    $sql = "SELECT * FROM popular_products LIMIT $limit OFFSET $start";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {      
                ?>
                    <a href="#" class="product_a">
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
                <?php } ?>
            </div>

            <div class="popular-products">
            <?php 
                    include "connect.php";

                    $limit = 5;
                    $start = 10;

                    $sql = "SELECT * FROM popular_products LIMIT $limit OFFSET $start";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {      
                ?>
                    <a href="#" class="product_a">
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
                <?php } ?>
            </div>
        </div>
    </div>


    <div class="new">
        <div class="title">
            <a href="index.php?table=new_products">New products</a>
            <div class="left-right-button">
                <button class="prev" onclick="plusSlide(-1, 'new-products')"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="next" onclick="plusSlide(1, 'new-products')"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>
        <div class="products-show">
            <div class="new-products">
            <?php 
                    include "connect.php";

                    $limit = 5;
                    $start = 0;

                    $sql = "SELECT * FROM new_products LIMIT $limit OFFSET $start";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {      
                ?>
                    <a href="#" class="product_a">
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
                <?php } ?>
            </div>

            <div class="new-products">
            <?php 
                    include "connect.php";

                    $limit = 5;
                    $start = 5;

                    $sql = "SELECT * FROM new_products LIMIT $limit OFFSET $start";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {      
                ?>
                    <a href="#" class="product_a">
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
                <?php } ?>
            </div>

            <div class="new-products">
            <?php 
                    include "connect.php";

                    $limit = 5;
                    $start = 10;

                    $sql = "SELECT * FROM new_products LIMIT $limit OFFSET $start";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {      
                ?>
                    <a href="#" class="product_a">
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
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="deal">
        <?php 
            $sql = "SELECT * FROM posters WHERE poster_type = 'deal_poster'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
        ?>
            <a href="index.php?table=deal" class="poster"><img src="https://docker-project-image-server-production.up.railway.app/images/posters/<?php echo $row['poster_image'] ?>" alt="Sale off"></a>
        <?php }?>

        <div class="show-area">
            <button class="prev" onclick="plusSlide(-1, 'deal-products')"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="next" onclick="plusSlide(1, 'deal-products')"><i class="fa-solid fa-chevron-right"></i></button>
            
            <div class="deals-show">
                <div class="deal-products">
                    <?php 
                        include "connect.php";

                        $limit = 4;
                        $start = 0;

                        $sql = "SELECT * FROM products WHERE discount >= 15 LIMIT $limit OFFSET $start ";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($result)) {      
                    ?>
                    <a href="#" class="product_a">
                        <div class="product" style="margin: 10px !important;">
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
                <?php } ?>
                </div>

                <div class="deal-products">
                <?php 
                        include "connect.php";

                        $limit = 4;
                        $start = 4;

                        $sql = "SELECT * FROM products WHERE discount >= 15 LIMIT $limit OFFSET $start ";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($result)) {      
                    ?>
                    <a href="#" class="product_a">
                    <div class="product" style="margin: 10px !important;">
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
                <?php } ?>
                </div>

                <div class="deal-products">
                <?php 
                        include "connect.php";

                        $limit = 4;
                        $start = 8;

                        $sql = "SELECT * FROM products WHERE discount >= 15 LIMIT $limit OFFSET $start ";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($result)) {      
                    ?>
                    <a href="#" class="product_a">
                    <div class="product" style="margin: 10px !important;">
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
                <?php } ?>
                </div>
            </div>
        </div>
    </div>


    <div class="others">
        <div class="title">
            <a href="index.php?table=products">Others</a>
            <div class="left-right-button">
                <button class="prev" onclick="plusSlide(-1, 'other-products')"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="next" onclick="plusSlide(1, 'other-products')"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>


        <div class="products-show">
            <div class="other-products">
            <?php 
                    include "connect.php";

                    $limit = 5;
                    $start = 0;

                    $sql = "SELECT * FROM products LIMIT $limit OFFSET $start";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {      
                ?>
                    <a href="#" class="product_a">
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
                <?php } ?>

            </div>

            <div class="other-products">
            <?php 
                    include "connect.php";

                    $limit = 5;
                    $start = 5;

                    $sql = "SELECT * FROM products LIMIT $limit OFFSET $start";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {      
                ?>
                    <a href="#" class="product_a">
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
                <?php } ?>
            </div>

            <div class="other-products">
            <?php 
                    include "connect.php";

                    $limit = 5;
                    $start = 10;

                    $sql = "SELECT * FROM products LIMIT $limit OFFSET $start";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {      
                ?>
                    <a href="#" class="product_a">
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
                <?php } ?>
            </div>
        </div>
    </div>
</div>