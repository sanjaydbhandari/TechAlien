<?php 

$page=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>


<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0  fixed-start bg-success" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <span class="ms-1 fs-2 text-center font-weight-bold text-white">TechAlien</span>
      </a>
    </div>
    <hr class="horizontal bg-danger light mt-0 mb-1">
    <hr class="horizontal bg-danger light mt-0 mb-1">
    <hr class="horizontal bg-danger light mt-0 mb-1">
    <!-- <div class="collapse navbar-collapse w-auto  max-height-vh-100" id="sidenav-collapse-main"> -->
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'index.php'?'active bg-gradient-danger':'' ?>" href="index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-home "></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item bg-gradient-success border mx-3 p-2 text-center ">
        <div class="text-white text-center  d-flex align-items-center justify-content-center">
              <span class="text-white bold">Category</span>
            </div>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-white <?= $page == 'category.php'?'active bg-gradient-danger ':'' ?>" href="category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-list "></i>
            </div>
            <span class="nav-link-text ms-1">Categories</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'add_category.php'?'active bg-gradient-danger ':'' ?>" href="add_category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-plus "></i>
            </div>
            <span class="nav-link-text ms-1">Add Category</span>
          </a>
        </li>
        <li class="nav-item bg-gradient-success border mx-3 p-2 text-center ">
        <div class="text-white text-center  d-flex align-items-center justify-content-center">
              <span class="text-white bold">Product</span>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'product.php'?'active bg-gradient-danger ':'' ?>" href="product.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-mobile "></i>
            </div>
            <span class="nav-link-text ms-1">Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'add_product.php'?'active bg-gradient-danger ':'' ?>" href="add_product.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-plus "></i>
            </div>
            <span class="nav-link-text ms-1">Add Product</span>
          </a>
        </li>
        <li class="nav-item bg-gradient-success border mx-3 p-2 text-center ">
        <div class="text-white text-center  d-flex align-items-center justify-content-center">
              <span class="text-white bold">Orders</span>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'orders.php'?'active bg-gradient-danger ':'' ?>" href="orders.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-shopping-cart "></i>
            </div>
            <span class="nav-link-text ms-1">Orders</span>
          </a>
        </li>
        <li class="nav-item bg-gradient-success border mx-3 p-2 text-center ">
        <div class="text-white text-center  d-flex align-items-center justify-content-center">
              <span class="text-white bold">Admin</span>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'admins.php'?'active bg-gradient-danger ':'' ?>" href="admins.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-user-tie "></i>
            </div>
            <span class="nav-link-text ms-1">Admins</span>
          </a>
        </li>
        <li class="nav-item">
          <div class="align-bottom">

            <a class="nav-link text-white <?= $page == 'logout.php'?'active bg-gradient-danger ':'' ?>" href="../logout.php">
              <div class="text-white float-bottom text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-sign-out "></i>
              </div>
              <span class="nav-link-text ms-1">LogOut</span>
            </a>
          </div>
        </li>
      </ul>
    <!-- </div> -->
  </aside>