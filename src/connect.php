<?php

    $server = 'shortline.proxy.rlwy.net';
    $port = '14163';
    $user = 'root';
    $pass = 'UMbVWTEfYmhsqbOUSxvZSHSEoeFJPJqd';
    $database = 'railway';

    $conn = new mysqli($server, $user, $pass, $database, $port);

    if ($conn) {
        mysqli_query($conn, 'SET NAMES "utf8"');
        // echo "Connected successfully";
    }
    else {
        echo "Failed to connect";
    }
    
?>