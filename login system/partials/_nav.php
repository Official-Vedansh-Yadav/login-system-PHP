<?php 
    echo 
    "<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
        <div class='container-fluid'>
          <a class='navbar-brand' href='/login system' style='color: aqua;'><h3>Login System</h3></a>
          <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
          </button>
          <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
              <li class='nav-item'>
                <a class='nav-link active' id='home' aria-current='page' href='/login system/welcome.php' style='font-size: 20px; color: var(--bs-purple);'>Home</a>
              </li>" ;
              if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
                echo "<li class='nav-item'>
                <a class='nav-link active' id='login' aria-current='page' href='/login system/login.php'>Login</a>
              </li>
              <li class='nav-item'>
                <a class='nav-link active' id='signup' aria-current='page' href='/login system/signup.php'>Signup</a>
              </li>";
              }else{
                echo "<li class='nav-item'>
                <a class='nav-link active' id='logout' aria-current='page' href='/login system/logout.php'>Logout</a>
              </li>";
              }
              echo "</ul>
            <form class='d-flex'>
              <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
              <button class='btn btn-outline-success' type='submit'>Search</button>
            </form>
          </div>
        </div>
</nav>";
?>
