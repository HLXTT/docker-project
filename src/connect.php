<?php

    $server = 'db';
    $user = 'user';
    $pass = 'password';
    $database = 'website';

    $conn = new mysqli($server, $user, $pass, $database);

    if ($conn) {
        mysqli_query($conn, 'SET NAMES "utf8"');
        // echo "Connected successfully";
    }
    else {
        echo "Failed to connect";
    }
    
?>