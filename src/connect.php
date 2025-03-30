<?php

    $server = 'mysql.railway.internal';
    $user = 'root';
    $pass = 'LNNDnPHPdoqCZHZbudFhiDqEbVneScdF';
    $database = 'railway';

    $conn = new mysqli($server, $user, $pass, $database);

    if ($conn) {
        mysqli_query($conn, 'SET NAMES "utf8"');
        // echo "Connected successfully";
    }
    else {
        echo "Failed to connect";
    }
    
?>