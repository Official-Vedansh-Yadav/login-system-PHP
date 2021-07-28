<!-- 
    // SQL Query to make any Column unique
   Query ==  ALTER TABLE `users` ADD UNIQUE(`username`); 
 -->
<?php 
    session_start();
    $registered = false;
    include "partials/_dbconnect.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        // Check Wheteher the USERNAME Already exists or not
        $existsql = "SELECT * FROM `users` WHERE `username` = '$username'";
        $result = mysqli_query($conn,$existsql);
        $numExistrows = mysqli_num_rows($result);
        if ($numExistrows > 0){
            $exist = true;
        }else{
            $exist = false;
            // SQL Query to insert data to MYSQL DATABASE
            if (($password == $cpassword) && ($exist == false) && ($username != "" && $password != "" && $cpassword != "") && (strlen($password) >= 8)){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp())";
                $result = mysqli_query($conn,$sql);
                if($result ) {
                    $registered = true;
                }}}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <style>
        #signup{
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
     <!-- navbar -->
    <?php require "partials/_nav.php"; ?>
    <!-- Form errors -->
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($username == "" || $password == "" || $cpassword == ""){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>ERROR! </strong> - Please enter all details
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }else{
        if ($exist) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>ERROR! </strong> - Username already Exists | Please Enter any Other UserName
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";    
        }else{
            if ($password != $cpassword) {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>ERROR! </strong> - Passwords do not Match , Please Enter Same Passwords
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            } 
            if (strlen($password) < 8) {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>WARNING! </strong> - PASSWORD SHOULD BE OF ATLEAST 8 CHARACTERS
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }}
        if ($registered){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success! </strong> - Your Account is created successfully You can login now !
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            }
        }
    }
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            if(isset($_SESSION['USERNAME'])){
                echo " <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>ALERT! </strong> - YOU IS ALREADY LOGGED IN AND CANNOT SIGNUP AFTER LOGIN | PLEASE LOGOUT TO SIGNUP AGAIN
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }}          
    ?>
        <!-- form -->
        <div class="container my-4">
            <h1 class="text-center">Signup to Our Website</h1>
                <div class="container mt-3" style="display: flex; flex-direction: column; align-items: center;">
                <form action = "/login system/signup.php" method = "POST" style="width: 100%; display: flex; flex-direction: column; align-items: center;">
                <div class="mb-3 flex" style="width: 100%;">
                <label for="username" class="form-label">User-Name</label>
                <input type="text" maxlength="25" style="width: 50%;" class="col-md-6 form-control" id="username" name = "username" aria-describedby="emailHelp" placeholder='Type any User-Name' <?php if(isset($_SESSION['USERNAME'])){echo "disabled";} ?>>
                </div>
                <div class="mb-3 flex" style="width: 100%;">
                <label for="password" class="form-label mt-2">Password</label>
                <input type="password" maxlength="20" style="width: 50%;" class="col-md-6 form-control" name = "password" id="password" placeholder="Enter your Password" <?php if(isset($_SESSION['USERNAME'])){echo "disabled";} ?>>
                </div>
                <div class="mb-3 flex" style="width: 100%;">
                <label for="c-password" class="form-label mt-2">Confirm Password</label>
                <input type="password" maxlength="20" style="width: 50%;" class="col-md-6 form-control" name = "cpassword" id="c-password" placeholder="Confirm Your password" <?php if(isset($_SESSION['USERNAME'])){echo "disabled";} ?>>
                </div>
                <button type="submit" class="btn btn-primary">Signup</button>
                </form>
                </div>
        </div>
        <!-- form ends here -->
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/jquery.js"></script>
</body>
</html>