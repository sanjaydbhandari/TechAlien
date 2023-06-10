<?php
include('userfunctions.php');
include('includes/header.php');
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<div class="py-3">
    <div class="container">
        <h6 class=" float-end fs-4 text-success text-success ">
            <a href="index.php" class="text-success">
                Home/
            </a>
            <a href="checkout.php" class="text-success">
                Checkout
            </a>
        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="message">
            <?php include('admin/message.php'); ?>
        </div>
        <div class="card">
            <div class="card-body shadow">
                <form action="placeorder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Enter your full name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">E-mail</label>
                                    <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone</label>
                                    <input type="text" name="phone" id="phone" placeholder="Enter your phone number" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Pin Code</label>
                                    <input type="text" name="pincode" id="pincode" placeholder="Enter your pin code" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Address</label>
                                    <textarea name="address" id="address" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Order Details</h5>
                            <hr>
                            <?php $items = getCartItems();
                            $totalPrice = 0;
                            foreach ($items as $citem) {
                            ?>
                                <div class="mb-1 border">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="admin/uploads/products/<?= $citem['image'] ?>" alt="Image" width="60px">
                                        </div>
                                        <div class="col-md-3">
                                            <label><?= $citem['name'] ?></label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Rs <?= $citem['selling_price'] ?></label>
                                        </div>
                                        <div class="col-md-1">
                                            <label>X<?= $citem['prod_qty'] ?></label>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Rs<?= $citem['selling_price'] * $citem['prod_qty'] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                            }
                            ?>
                            <hr>
                            <h5>Total Price: <span class="float-end fw-bold">Rs <?= $totalPrice ?> </span> </h5>
                            <div class="box">
                                <input type="hidden" name="payment_mode" value="COD">
                                <input type="hidden" name="totalprice" id="totalprice" value="<?= $totalPrice ?>">
                                <button type="submit" name="placeOrderBtn" class="btn btn-outline-success mt-3 w-100">Cash On Delivery</button>
                                <input type="button" value="Pay With Rayzorpay" name="paywithrazorpay" class="btn btn-outline-success mt-3 w-100" onclick="pay_now()"></input>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function pay_now() {
        var name = jQuery('#name').val();
        var email = jQuery('#email').val();
        var phone = jQuery('#phone').val();
        var pincode = jQuery('#pincode').val();
        var address = jQuery('#address').val();
        var payment_mode = jQuery('#payment_mode').val();
        var payment_id = jQuery('#payment_id').val();
        var totalprice = jQuery('#totalprice').val();
        var placeOrderBtn = true;
        var options = {
            "key": "rzp_test_VqIdkt0aIfImsJ",
            "amount": totalprice * 100,
            "currency": "INR",
            "name": "TechAlien",
            "description": "Test Transaction",
            "image": "https://example.com/your_logo",
            "handler": function(response) {
                payment_id = response.razorpay_payment_id;
                jQuery.ajax({
                    type: 'post',
                    url: 'placeorder.php',
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        pincode: pincode,
                        address: address,
                        payment_mode: 'Paid Using Razorpay',
                        payment_id: payment_id,
                        totalprice: totalprice,
                        payment_id: response.razorpay_payment_id,
                        placeOrderBtn: true,
                    },
                    success: function(result) {
                        window.location.href = "placeorder.php";
                        if (response == 201) {
                            alert("201");
                            $_SESSION['msg'] = "Order Placed Sucessfully";
                            window.location.href = "my-orders.php";
                        } else {
                            alert("202");
                        }
                    }
                });
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    }
</script>
<?php include('includes/footer.php'); ?>