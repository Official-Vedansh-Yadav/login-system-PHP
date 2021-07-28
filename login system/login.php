<?php
    $login = false;
    include "partials/_dbconnect.php";
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ( ($username != "" && $password != "") && (strlen($password) >= 8)){
            // $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
            $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            if ($num == 1){
                while ($row = mysqli_fetch_assoc($result)) {
                    if (password_verify($password,$row['password'])){
                        $login = true;
                        $_SESSION['loggedin'] = true;
                        $_SESSION['USERNAME'] = $username;
                        header("location: welcome.php");
                    }}
                  }
                }
            }
    //  Form validation using mysqli_fetch_assoc() function and While loop
    // while($row = mysqli_fetch_assoc($result)){
    //     if (($row['username'] == $username) && ($row['password'] == $password)){
    //         $_SESSION['USERNAME'] = $username;
    //         $_SESSION['PASSWORD'] = $password;
    //         $login = true;
    //         break;
    //     }
    // }
    // if(isset($_SESSION['USERNAME'])){echo $_SESSION['USERNAME'];}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <style>
        #login{
            color: gray;
        }
        .flex{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <?php require "partials/_nav.php"; ?>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ( $username == "" || $password == ""){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>ERROR! </strong> - Please Fill All Entries to Login
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }else{
            if ($login){
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>SUCCESS! </strong> - You is logged in successfully
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
            if(strlen($password) < 8) {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>WARNING! </strong> - PASSWORD SHOULD BE OF ATLEAST 8 CHARACTERS
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }else{
                if (!$login) {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>ERROR! </strong> - Username or Password is wrong | IF YOU NOT SIGNED UP TO OUR WEBSITE PLEASE SIGNUP FIRST TO LOGIN HERE
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                }
            }
        }
    }  
    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        if(isset($_SESSION['USERNAME'])){
            echo " <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>ALERT! </strong> - YOU IS ALREADY LOGGED IN AND CANNOT LOGIN AGAIN
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }}      
    ?>
        
    <div class="container my-4">
    <h1 class="text-center">Login to our Website</h1>
    <div class="container mt-3">
    <div class="container mt-3" style="display: flex; flex-direction: column; align-items: center;">
    <form action = "/login system/login.php" method = "POST" class="my-3" style="width: 100%; display: flex; flex-direction: column; align-items: center;">
    <div class="mb-3 flex" style="width: 100%;">
    <label for="username" class="form-label">User-Name</label>
    <input type="text" maxlength="25" style="width: 50%;" class="col-md-6 form-control" id="username" name = "username" aria-describedby="emailHelp" placeholder='Enter Your User-Name' <?php if(isset($_SESSION['USERNAME'])){echo "disabled";} ?> >
    </div>
    <div class="mb-3 flex" style="width: 100%;">
    <label for="password" class="form-label mt-2">Password</label>
    <input type="password" maxlength="20" style="width: 50%;" class="col-md-6 form-control" name = "password" id="password" placeholder="Enter your Password" <?php if(isset($_SESSION['USERNAME'])){echo "disabled";} ?> >
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>
    </div>

    <!-- Javascript Files -->
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/jquery.js"></script>
</body>
</html>