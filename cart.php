<?php
include('userfunctions.php');
include('includes/header.php');
//  include('authenticate.php'); 
?>

<div class="py-3">
    <div class="container">
        <div class="message">
            <?php include('admin/message.php'); ?>
        </div>
        <h6 class=" float-end fs-4 text-success">
            <a class="text-success" href="index.php">
                Home/
            </a>
            <a class="text-success" href="cart.php">
                Cart
            </a>
        </h6>
    </div>
</div>


<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-12">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <h6>Product</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Price</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Quantity</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Remove</h6>
                        </div>
                    </div>
                    <div id="mycart">
                        <?php $items = getCartItems();
                        // if (isset($_POST['addToCart'])) {
                        // }
                        if (mysqli_num_rows($items) > 0) {
                            while ($citem = mysqli_fetch_assoc($items)) {
                        ?>
                        <div class="card product_data  ">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="admin/uploads/products/<?= $citem['image'] ?>" alt="Image" width="80px">
                                </div>
                                <div class="col-md-3">
                                    <h5><?= $citem['name'] ?></h5>
                                </div>
                                <div class="col-md-3">
                                    <h5>Rs <?= $citem['selling_price'] ?></h5>
                                </div>
                                <div class="col-md-2">
                                    
                                    <form action="handlecart.php" method="post">
                                        <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                        <div class="input-group mb-3" style="width:150px">
                                            <?php $products = fetchProductQuantity($citem['prod_id']);
                                            if (mysqli_num_rows($products) > 0) {
                                                while ($pitem = mysqli_fetch_assoc($products)){//DISPLAY ADDTOCART ITEMS SELECTED PROD QUANTITY
                                            ?>
                                            <!-- UPDATE QUANT -->
                                                    <form action="handlecart.php" method="post">
                                                        <input type="hidden" name="cart_id" value="<?= $citem['cid'] ?>">
                                                        <input type="number" name="prod_qty" class="form-control text-center input-qty bg-white" min="1" max="<?php if ($pitem['quantity'] >= 10) {
                                                                echo "10";
                                                            } else {
                                                                echo $pitem['quantity'];
                                                            } ?>" value="<?= $citem['prod_qty']; ?>">
                                                        <button type="submit" name="update" class="input-group-text updateQty" value="<?= $citem['prod_id']; ?>">Update</button>
                                                    </form>
                                            <?php }
                                            }
                                            ?>
                                        </div>
                                </div>
                                        <div class="col-md-2">
                                            <form action="handlecart.php" method="post">
                                                <input type="hidden" name="cart_id" value="<?= $citem['cid'] ?>">
                                                <button name="delete" class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid'] ?>">
                                                    <i class="fa fa-trash me-2"></i>Remove</button>
                                            </form>
                                        </div>
                                </div>
                                <?php } ?>
                                <a href="checkout.php" class="btn btn-outline-success">Proceed To Checkout</a>
                                </div>
                            <?php
                        } else {
                            ?>
                                <div class="card card-body shadow text-center">
                                    <h4 class="py-3">Your cart is empty</h4>
                                </div>
                            <?php
                        }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include('includes/footer.php'); ?>