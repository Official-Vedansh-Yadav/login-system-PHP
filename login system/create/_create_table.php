<?php 
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "user33";

    $conn = mysqli_connect($server,$user,$password,$database);

    if (!$conn){
        die("CANNOT CONNECT DUE TO ERROR --=>" . mysqli_connect_error());
    }

    $sql = "CREATE TABLE `user33`.`users` ( `s.r.` INT(11) NOT NULL AUTO_INCREMENT ,  `username` VARCHAR(200) NOT NULL ,  `password` VARCHAR(300) NOT NULL ,  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`s.r.`)) ENGINE = InnoDB;";
    $result = mysqli_query($conn,$sql);

    if ($result){
        header("location: /login system/signup.php");
    }
?>