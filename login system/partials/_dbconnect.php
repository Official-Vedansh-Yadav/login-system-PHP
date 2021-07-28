<?php
// Connectng to the database
$server = "localhost";
$user = "root"; 
$password = "";
$database = "user33";
$conn = mysqli_connect($server,$user,$password,$database);
if (!$conn) {
    header("location: /login system/create/_create_database.php");
}
?>