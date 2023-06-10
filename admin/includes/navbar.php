<?php
include('config.php');
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>
<div class="p-3 bg-white border-bottom">
  <!-- top navbar -->
  <div class="container">
    <div class="row gy-3">
      <!-- Left elements -->
      <div class="col-lg-2 col-sm-4 col-4">
        <h1 class="text-success fw-bold ">TechAlien</h1>
      </div>
    </div>
    <!-- top navbar -->
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-success " id="navbar">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?= $page == 'index.php' ? 'active fw-bold' : '' ?>" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $page == 'product_nav.php' ? 'active fw-bold' : '' ?>" " href=" product_nav.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $page == 'categories.php' ? 'active fw-bold' : '' ?>" " href=" categories.php">Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $page == 'about.php' ? 'active fw-bold' : '' ?>" " href=" about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $page == 'contact.php' ? 'active fw-bold' : '' ?>" " href=" contact.php">Contact</a>
            </li>
          </ul>
          <form action="search_product.php" method="POST" class="d-flex" id="search">
            <input class="form-control me-2" type="text" placeholder="search products..." aria-label="Search" name="search_data">
            <input type="submit" class="btn btn-outline-light" name="search_data_product" value="Search">
          </form>
          <?php
          if (isset($_SESSION['auth'])) {
            $uid = $_SESSION['auth_user']['user_id'];
            $select_rows = mysqli_query($conn, "SELECT * FROM carts WHERE user_id='$uid'");
            $cart_count = mysqli_num_rows($select_rows);
          ?>
            <li class="navbar-nav nav-item ">
              <a class=" ms-1 text-reset  nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i><span class="badge rounded-pill badge-notification bg-danger"><?= $cart_count; ?></span></a>
            </li>
            <div class="dropdown ps-2">
              <button class="btn  bg-success dropdown-toggle text-dark" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user"></i> <?= $_SESSION['auth_user']['fullname'] ?>
              </button>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="my-orders.php"><i class="fa fa-shopping-cart "></i>&nbsp;My Orders</a></li>
                <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
                <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out "></i>&nbsp;LogOut</a></li>
              </ul>

            </div>
          <?php
          } else {
          ?>
            <a href="signup.php" class="me-1  text-dark py-1 ms-2  nav-link d-flex " target="_blank">
              <p class="d-none d-md-block mb-0"><i class="fa fa-user-plus ">&nbsp;</i>Register</p>
            </a>
            <a href="login.php" class="me-1  text-dark py-1 ms-2  nav-link d-flex " target="_blank">
              <p class="d-none d-md-block mb-0"><i class="fa fa-user"></i>&nbsp;Login</p>
            </a>
          <?php
          }
          ?>
        </div>
      </div>
    </nav>
    <!-- navbar -->