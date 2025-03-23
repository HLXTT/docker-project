<?php
    session_start();

    if(!isset($_SESSION['mySession'])) {
        header('location: login.php');
        exit();
    }
    else { 
        header('location: index.php?act=cart');
        exit();
    }
?>