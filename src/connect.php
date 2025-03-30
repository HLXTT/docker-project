<?php

    $server = 'switchback.proxy.rlwy.net';
    $port = '13633';
    $user = 'root';
    $pass = 'LNNDnPHPdoqCZHZbudFhiDqEbVneScdF';
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