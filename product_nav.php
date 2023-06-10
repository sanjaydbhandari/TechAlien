<?php
include('userfunctions.php');
include('includes/header.php');
//  include('authenticate.php'); 
?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Products</h2>
                <hr>
                <div class="row">
                    <?php
                    $products = fetch('products');
                    if (mysqli_num_rows($products) > 0) {
                        foreach ($products as $item) {
                    ?>
                            <div class="col-md-3 mb-2">
                                <div class="card m-2" style="width: 18rem;">
                                    <a href="product-view.php?product=<?= $item['slug']; ?>">
                                        <img src="admin/uploads/products/<?= $item['image']; ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text text-center bottom"><?= $item['name']; ?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No data available";
                    }
                    ?>
                </div>
            </div>
        </div>