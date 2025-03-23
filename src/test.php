<?php
    session_start();

    $user_id = $_SESSION['mySession'];
    echo $user_id;
?>
