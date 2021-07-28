<?php
    session_start();
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <style>
    #logout{
        color: gray;
    }
    .flex{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        }
    .h-80vh{
        height: 80vh !important;
    }
    </style>
</head>
<body>
    <?php require "partials/_nav.php"; ?>

    <div class="container flex h-80vh">
        <h1 class="text-center">YOU IS LOGGED OUT AND CAN LOGIN AGAIN</h1>
        <div class="buttons">
        <a href="/login system/login.php" class="btn btn-primary px-4 py-2 my-3">Login</a>
        <a href="/login system/signup.php" class="btn btn-primary px-4 py-2 my-3 mx-3">Signup</a>
        </div>
    </div>


    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/jquery.js"></script>
</body>
</html>