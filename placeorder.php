<?php
include('config.php');
require 'userfunctions.php';
if (isset($_SESSION['auth'])) {
    if (isset($_POST['placeOrderBtn']) || isset($_POST['paywithrazorpay'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);

        if (empty(trim($name)) || empty(trim($email)) || empty(trim($phone)) || empty(trim($address)) || empty(trim($pincode))) {
            $_SESSION['msg'] = "All fields are mandatory";
            header('Location: checkout.php');
            exit(0);
        } else if (empty($name)) {
            $_SESSION['msg'] = "Please Enter your name";
            header('location:checkout.php');
        } else if (!preg_match('/^[\p{L} ]+$/u', $name)) {
            $_SESSION['msg'] = "Name must contain letters and spaces only!";
            header('location:checkout.php');
        } else if (!preg_match('/^[6-9][0-9]{9}$/', $phone)) {
            $_SESSION['msg'] = "Mobile Number is not Valid";
            header('location:checkout.php');
        } else if (strlen($pincode) != 6 || !preg_match("/^\\d+$/", $pincode)) {
            $_SESSION['msg'] = "Pincode must contain 6 digit ";
            header('location:checkout.php');
        } else if (strlen($address) > 50 || strlen($address) < 3) {
            $_SESSION['msg'] = "Address must be more then 3 character less then 50 character ";
            header('location:checkout.php');
        } else {
            $userId = $_SESSION['auth_user']['user_id'];
            // FETCHING CART DETAILS BEASED ON USERID
            $query = "SELECT c.id as cid, c.prod_id,  c.prod_qty,p.id as pid, p.name, p.image,p.selling_price 
                FROM carts c,products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC ";
            $query_run = mysqli_query($conn, $query);
            $totalPrice = 0;//INITIALIZING
            foreach ($query_run as $citem) {//TOTALPRICE
                $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
            }
            $tracking_no = "TechAliens" . rand(1111, 9999) . substr($phone, 2);
            $insert_query = "INSERT INTO orders(tracking_no,user_id,name,email,phone,address,pincode,total_price,payment_mode,payment_id) 
        VALUES('$tracking_no','$userId','$name','$email','$phone','$address','$pincode','$totalPrice','$payment_mode','$payment_id')";
            $insert_query_run = mysqli_query($conn, $insert_query);

            if ($insert_query_run) {
                $order_id = mysqli_insert_id($conn);//ID AUTOINCREMENT AND REMAIN SAME FOR ALL PLACED ITEM
                foreach ($query_run as $citem) {
                    $prod_id = $citem['prod_id'];
                    $prod_qty = $citem['prod_qty'];
                    $price = $citem['selling_price'];
                    //INSERTING INTO ORDER_ITEMS
                    $insert_items_query = "INSERT INTO order_items(order_id,prod_id,qty,price) VALUES('$order_id','$prod_id','$prod_qty','$price')";
                    $insert_items_query_run = mysqli_query($conn, $insert_items_query);
                    //FOR UPDATING QUANTITY (DECREASING) SEARCHING PRODUCT
                    $product_query = "SELECT * FROM products WHERE id='$prod_id' LIMIT 1 ";
                    $product_query_run = mysqli_query($conn, $product_query);
                    //FETCHING CURRENT QUANTITY
                    $productData = mysqli_fetch_array($product_query_run);
                    $current_qty = $productData['quantity'];
                    // UPDATE CURRENT QUANTITY
                    $new_qty = $current_qty - $prod_qty;

                    $updateQty_query = "UPDATE products SET quantity='$new_qty' WHERE id='$prod_id' ";
                    $updateQty_query_run = mysqli_query($conn, $updateQty_query);
                }
                // REMOVING ITEMS FROM CARTS
                $deleteCartQuery = "DELETE FROM carts WHERE user_id='$userId' ";
                $deleteCartQuery_run = mysqli_query($conn, $deleteCartQuery);

                if ($payment_mode == "COD") {
                    $_SESSION['msg'] = "Order placed successfully";
                    header('Location:my-orders.php');
                    die();
                }
            }
        }
    }
} else {
    header('Location:../index.php');
}
?>
