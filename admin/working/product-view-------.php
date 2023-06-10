<?php
include('userfunctions.php');
include('includes/header.php');

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products", $product_slug);
    $product = mysqli_fetch_array($product_data);

    if ($product) {
?>
        <!-- <div class="py-3 ">
            <div class="container">
                <h6 class=" float-end fs-4 text-success">
                    <a class="text-success" href="index.php">
                        Home/
                    </a>
                    <a class="text-success" href="categories.php">
                        Categories
                    </a>
                </h6>


            </div>
        </div> -->




        <div class="py-3">
            <div class="container">
                <h6 class="float-end fs-4 text-success">
                    <a class="text-success" href="index.php">
                        Home/
                    </a>
                    <a class="text-success" href="categories.php">
                        Collections/
                    </a>
                    <?= $product['name']; ?>
                </h6>
                <div class="message">
        <?php include('admin/message.php');?>
      </div>
            </div>
        </div>
        <div class="bg-light py-4">
            <div class="container product_data mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow">
                            <img src="admin/uploads/products/<?= $product['image']; ?>" alt="Product Image" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="fw-bold"><?= $product['name']; ?>
                            <!-- <span class="float-end text-danger"><?php if ($product['trending']) {
                                                                            echo "Trending";
                                                                        } ?></span> -->
                        </h4>
                        <hr>
                        <p><?= $product['small_description']; ?></p>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Rs.<span class="text-success fw-bold"><?= $product['selling_price']; ?></span></h4>
                            </div>
                            <div class="col-md-6">
                                <h5>Rs.<s class="text-danger"><?= $product['original_price']; ?></s></h5>
                            </div>
                        </div>
                        <!-- <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group mb-3" style="width:130px">
                                            <input type="text" class="form-control text-center input-qty bg-white" value="1" >
                                            <button class="input-group-text decrement-btn">-</button>
                                            <input type="text" class="form-control text-center input-qty bg-white" value="1">
                                            <button class="input-group-text increment-btn">+</button>
                                        </div>
                                    </div>
                                </div> -->
                        <form action="handlecart.php" method="post">
                            <div class="input-group mb-3" style="width:130px">
                                <input type="text" name="prod_qty" value="1">
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <input type="hidden" name="prod_id" value="<?= $product['id']; ?>">
                                    <button type="submit" name="addtocart" class="btn btn-success px-4 addToCartBtn w-100"><i class="fa fa-shopping-cart me-2"></i>Add to cart</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="addtowishlist" class="btn btn-danger px-4 w-100"><i class="fa fa-heart me-2"></i>Add to wishlist</button>
                                </div>
                            </div>
                        </form>
                        <hr>

                        <h5>Product Description:</h5>
                        <p><?= $product['description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "Product Not Found";
    }
} else {

    echo "something went wrong";
}
include('includes/footer.php'); ?>