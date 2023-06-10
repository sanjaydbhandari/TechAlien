<?php
include('authentication.php');
include('includes/header.php');
?>

<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="message">
      <?php include('message.php'); ?>
    </div>

    <div class="row text-white">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner ps-3">

          <?php
            $select_ord_rows = mysqli_query($conn, "SELECT * FROM orders");
            $orders_count = mysqli_num_rows($select_ord_rows);

            $select_users_rows = mysqli_query($conn, "SELECT * FROM users");
            $users_count = mysqli_num_rows($select_users_rows);

            $select_cat_rows = mysqli_query($conn, "SELECT * FROM categories");
            $categories_count = mysqli_num_rows($select_cat_rows);

            $select_prod_rows = mysqli_query($conn, "SELECT * FROM products");
            $products_count = mysqli_num_rows($select_prod_rows);
            // echo $cart_count;
            ?>

            <p class="fs-4 fw-bold text-center">Orders</p>
          </div>
          <div class="icon text-white text-center">
            <i class="fas fa-shopping-cart fa-3x ">&nbsp;</i><span class="badge rounded-pill badge-notification bg-danger"><?=$orders_count;?></span>
          </div>
          <a href="orders.php" class=" text-white bg-success ps-2 small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner ps-2">
            <p class="fs-4 fw-bold text-center">Order History</p>
          </div>
          <div class="icon text-white text-center">
            <i class="fas fa-clock fa-3x ">&nbsp;</i><span class="badge rounded-pill badge-notification bg-danger"><?=$users_count;?></span>
          </div>
          <a href="order-history.php" class=" text-white bg-success ps-2 small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner  ps-3">
            <!-- <h3>44</h3> -->

            <p class="fs-4 fw-bold text-center">Categories</p>
          </div>

          <div class="icon text-white text-center">
            <i class="fas fa-list fa-3x ">&nbsp;</i><span class="badge rounded-pill badge-notification bg-danger"><?=$categories_count;?></span>
          </div>
          <a href="category.php" class=" text-white bg-success ps-2 small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner  ps-3">
            <!-- <h3>65</h3> -->

            <p class="fs-4 fw-bold text-center">Products</p>
          </div>
          <div class="icon text-white text-center">
            <i class="fas fa-mobile fa-3x ">&nbsp;</i><span class="badge rounded-pill badge-notification bg-danger"><?= $products_count ;?></span>
          </div>
          <a href="product.php" class=" text-white bg-success ps-2 small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
  </div><!-- /.container-fluid -->
</section>


<?php include('includes/footer.php'); ?>