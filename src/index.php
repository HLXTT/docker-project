<?php
    session_start();
    include 'connect.php';
    
    include 'header.php';

    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'cart':
                include 'cart.php';
                break;
            case 'product':
                include 'product.php';
                break;
            case 'product-info':
                include 'product-info.php';
                break;
            case 'all_products':
                include 'all_products.php';
                break;
            case 'edit_product':
                include 'edit_product.php';
                break;
            case 'add_product':
                include 'add_product.php';
                break;
            case 'order_management':
                include 'order_management.php';
                break;
            case 'orders':
                include 'orders.php';
                break;
            case 'personnel_management':
                include 'personnel_management.php';
                break;
            case 'add_staff':
                include 'add_staff.php';
                break;
            case 'poster':
                include 'poster.php';
                break;
            case 'add_poster':
                include 'add_poster.php';
                break;
            case 'user_info':
                include 'user_info.php';
                break;
            default:
                include 'home.php';
                break;
        }
    }
    else if (isset($_GET['filter']) or isset($_GET['table'])) {
        include 'filter_product.php';
    }
    else {
        include 'home.php';
    }

    include 'footer.php';
?>