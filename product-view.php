<?php
include('userfunctions.php');
include('includes/header.php');

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products", $product_slug);
    $product = mysqli_fetch_array($product_data);

    if ($product) {
?>
        <div class="py-3">
            <div class="container">
                <div class="nav2">
                    <h6 class="float-end fs-4 text-success">
                        <a class="text-success" href="index.php">
                            Home/
                        </a>
                        <a class="text-success" href="categories.php">
                            <?= $_SESSION['category_name']; ?>/
                        </a>
                        <?= $product['name']; ?>
                    </h6>
                </div>
            </div>
            <div class="message">
                <?php include('admin/message.php'); ?>
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
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width:130px">
                                    <form action="handlecart.php" method="post">
                                        <br>
                                        <?php
                                        if ($product["quantity"] > 0) {
                                        ?>
                                            <label><b>Quantity</b></label>
                                            <input type="number" name="prod_qty" class="form-control text-center input-qty bg-white" min="1" max="<?php if ($product["quantity"] > 10) {
                                                                                                                                                        echo "10";
                                                                                                                                                    } else {
                                                                                                                                                        echo $product['quantity'];
                                                                                                                                                    } ?>" value="<?php if ($product['quantity'] > 0) {
                                                                                                                                                                                                                                                echo "1";
                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                echo "0";
                                                                                                                                                                                                                                            } ?>">
                                        <?php
                                        }
                                        ?>
                                        <input type="hidden" name="prod_img" class="form-control text-center bg-white" value="<?= $product['image']; ?>">
                                        <input type="hidden" name="org_qty" class="form-control text-center bg-white" value="<?= $product['quantity']; ?>">
                                        <input type="hidden" name="prod_id" class="form-control text-center input-qty bg-white" value="<?= $product['id']; ?>">
                                        <input type="hidden" name="prod" class="form-control text-center input-qty bg-white" value="<?= $product_slug; ?>">
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($product["quantity"] > 0) {
                        ?>
                            <button type="submit" name="addToCart" class="btn btn-success w-100 px-4" value="<?= $product['id']; ?>"><i class="fa fa-cart-plus me-2"></i>Add to cart</button>
                        <?php
                        } else {
                        ?>
                            <div name="addToCart" class="btn btn-danger w-100 px-4"><i class="fa fa-cart-plus me-2"></i>Out Of Stock</div>
                        <?php
                        }
                        ?>
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