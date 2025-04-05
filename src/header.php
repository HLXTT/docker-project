<?php
    ob_start();
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hyper Tech</title>
    <link rel="stylesheet" href="https://docker-project-production.up.railway.app/Style.css">
    <link rel="stylesheet" href="https://docker-project-production.up.railway.app/product.css">
    
</head>
<body>

    <!-- Đầu Trang -->
    <div class="header">
        <div class="header-left">
            <!-- Logo thương hiệu -->
            <div class="logo">
                <a href="index.php"><img src="https://docker-project-image-server-production.up.railway.app/images/logo.jpg" alt="logo" class="logo-img"></a>
            </div>
        </div>

        <div class="header-between">
            <!-- Tìm kiếm -->
            <div class="search">
                <form action="./index.php?act=all_products" method="post">
                    <input type="text" name="search" placeholder="Search">
                    <button type="submit" name='btnSearch'><a href='index.php.'></a><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
        </div>

        <div class="header-right">
            <!-- Giỏ hàng -->
            <div class="cart">
                <button><a href="./cart_session_check.php"><i class="fa-solid fa-cart-shopping"></i></a></button>
            </div>


            <!-- Đơn hàng  -->
            <div class="orders">
            <?php if (isset($_SESSION['mySession'])) {?>
                    <button><a href="index.php?act=orders"><i class="fa-regular fa-clipboard"></a></i></button> 
            <?php } else { ?>
                    <button><a href="login.php"><i class="fa-regular fa-clipboard"></i></a></i></button>
            <?php } ?>
                
            </div>

            <!-- Người dùng -->
            <div class="user">
                <button id='user' onclick="openSide('UserSide')"><i class="fa-regular fa-user"></i></button>
                <div id="UserSide" class="UserSide">
                    <a href="javascript:void(0)" class="closebtn"
                    onclick="closeSide('UserSide')"> &times; </a>

                    <div class="User-info">
                        <?php
                            if (isset($_SESSION['mySession'])) {
                                $user_id = $_SESSION['mySession'];

                                $sql = "SELECT * FROM accounts WHERE user_id = '$user_id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);

                                $user_name = $row['username']; ?>

                                <img src="https://docker-project-image-server-production.up.railway.app/images/user_avatars/<?php echo $row['user_image']?>" alt="" style="border: 2px solid white">


                                <div style="display: flex; justify-content: center; width: 100%">
                                    <p style="color: white;"><?php echo $row['username'] ?></p>
                                    <a href="index.php?act=user_info" style="font-size: 20px; color: white; bottom: 10%; right: 0"><i class="fa-solid fa-pen-to-square"></i></a>
                                </div>

                        <?php } 
                            else {?>
                                <img src="#" alt="">

                                <p style="color: white"><?php echo 'User' ?></p>

                            <?php }?>
                        <?php                   
                            if (isset($_SESSION['mySession'])) { ?>
                                <a id='Logout' href="logout.php">Logout</a>
                            <?php }
                            else { ?>
                                <a id='Login' href="login.php">Login</a>
                            <?php }?>
                                <br>
                        <?php                        
                            if (isset($_SESSION['mySession'])) {
                                $user_id = $_SESSION['mySession'];
                                if ($user_id == 1) 
                                { ?>
                                    <a id='edit_product' href="./index.php?act=product">Edit Product</a>
                                    <a id='order_management' href="./index.php?act=order_management">Orders Manage</a>
                                    <a id='personnel_management' href="./index.php?act=personnel_management">Personnel Manage</a>
                                    <a id='edit_poster' href="./index.php?act=poster">Edit Poster</a>
                          <?php }
                        }?>
                    </div>
                </div>    
            </div>
        </div>
    </div>

    <!-- Danh sách -->
    <div class="menu">
        <ul>
            <li><button onclick="openSide('mysidenav')"><i class="fa-solid fa-bars"></i> &nbsp All</button></li>
            <div id="mysidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn"
                onclick="closeSide('mysidenav')"> &times; </a>
                <a href="./index.php"><i class="fa-solid fa-house"></i>&nbsp Home </a>
                <a href="./index.php?act=introduction"><i class="fa-solid fa-address-card"></i>&nbsp Introduction </a>
                <a href="./index.php?act=categories"><i class="fa-solid fa-list"></i>&nbsp Categories </a>
                <a href="./index.php?act=contact"><i class="fa-solid fa-phone"></i>&nbsp Contact </a>
                <a href="./index.php?act=help"><i class="fa-solid fa-book"></i>&nbsp Help </a>
            </div>

            <li><a href="./index.php"><i class="fa-solid fa-house"></i>&nbsp Home</a></li>
            <li><a href="./index.php?filter=smartphone"><i class="fa-solid fa-mobile-screen-button"></i>&nbsp Smartphone</a></li>
            <li><a href="./index.php?filter=laptop"><i class="fa-solid fa-laptop"></i>&nbsp Laptop</a></li>
            

            <li>
                <div class="computer_accessories">
                    <a href="#"><i class="fa-solid fa-desktop"></i>&nbsp Computer accessories</a>
                    <ul class="accessories_list">
                        <li><a href="./index.php?filter=screen"><i class="fa-solid fa-display"></i>&nbsp screen</a></li>
                        <li><a href="./index.php?filter=keyboard"><i class="fa-regular fa-keyboard"></i>&nbsp keyboard</a></li>
                        <li><a href="./index.php?filter=mouse"><i class="fa-solid fa-computer-mouse"></i>&nbsp mouse</a></li>
                        <li><a href="./index.php?filter=headphone"><i class="fa-solid fa-headphones"></i>&nbsp headphone</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="main">
