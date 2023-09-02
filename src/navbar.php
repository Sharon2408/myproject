<?php
include("cdn.html");
session_start();
echo "<div class='container-fluid'>
<div class='row'>
    <nav class='navbar navbar-expand-lg navbar-dark text-light bg-primary'>
        <div class='container-fluid'>
          <a class='navbar-brand' href='#'>CRUD</a>
          <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
          </button>
          <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav'>
              <li class='nav-item'>
                <a class='nav-link active' aria-current='page' href='#'>Home</a>
              </li>
              </ul>
              <ul class='navbar-nav ms-auto'>
              <li class='nav-item'>
              <a class='nav-link active' href='Cart.php'><i class='fa-solid fa-cart-shopping fa-xl mt-2 position-relative'></i></a>
            </li>
              <li class='nav-item'>
                <a class='nav-link active' href='#'>" . $_SESSION['u_name'] . "</a>
              </li>
              <li class='nav-item'>
              <form action='logout.php' method='post'>
              <button type='submit' class='nav-link btn btn-primary  active' name='submit' >Logout</button>
              </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</div>
</div>";
?>