<?php
    $server = "localhost";
    $user = "root";
    $password = "";

    $conn = mysqli_connect($server,$user,$password);

    if (!$conn) {
        die("CANNOT CONNECT DUE TO ERROR --=>" . mysqli_connect_error());
    }

    $sql = "CREATE DATABASE user33";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        header("location: /login system/create/_create_table.php");
    } else {
       echo "ERROR TO CREATE DATABASE";
    }
    