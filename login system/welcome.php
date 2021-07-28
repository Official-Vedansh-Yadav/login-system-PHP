<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
         header("location: login.php");
         exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome - <?php echo $_SESSION['USERNAME']?> </title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <style>
    .flex{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    }
    .uppercase{
      text-transform: uppercase;
    }
    </style>
</head>
<body>
    <?php require "partials/_nav.php"; ?>

  <div class="container my-3">
    <div class='container alert alert-success alert fade show col-md-6' role='alert'>
            <h3 class="uppercase">Welcome - <?php echo $_SESSION['USERNAME']?></h3>
            <hr>
            <p>Hello You is logged in to our website as <?php echo $_SESSION['USERNAME']?> and can enjoy here. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto officiis, eligendi iusto velit qui optio!</p>
            <span>You can logout by click on this link - </span><a href="/login system/logout.php">logout</a>
    </div>
  </div>  

    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/jquery.js"></script>
</body>
</html>