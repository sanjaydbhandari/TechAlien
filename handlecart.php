<?php

session_start();
include('config.php');
include('redirect.php');

if (isset($_SESSION['auth'])) {
    if (isset($_POST['addToCart'])) {
        $prod_id = $_POST['prod_id'];
        $prod_qty = $_POST['prod_qty'];
        $prod_img = $_POST['prod_img'];
        $user_id = $_SESSION['auth_user']['user_id'];
        $product = $_POST['prod'];//prod_slug
        $chk_existing_cart = "SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id' ";
        $chk_existing_cart_run = mysqli_query($conn, $chk_existing_cart);

        if (mysqli_num_rows($chk_existing_cart_run) > 0) {
            redirect('product-view.php?product=' . $product, 'Product already in cart');
        } else {
            $insert_query = "INSERT INTO carts(user_id,prod_id,prod_qty) VALUES('$user_id','$prod_id','$prod_qty')";
            $insert_query_run = mysqli_query($conn, $insert_query);

            if ($insert_query_run) {
                redirect('product-view.php?product=' . $product, 'Product Added to Cart');
            } else {
                redirect('product-view.php?product=' . $product, 'Something Went Wrong1');
            }
        }
    } else if (isset($_POST['update'])) {
        $prod_id = $_POST['update'];
        $prod_qty = $_POST['prod_qty'];

        $user_id = $_SESSION['auth_user']['user_id'];

        $chk_existing_cart = "SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id' ";
        $chk_existing_cart_run = mysqli_query($conn, $chk_existing_cart);

        if (mysqli_num_rows($chk_existing_cart_run) > 0) {
            $update_query = "UPDATE carts SET prod_qty='$prod_qty' WHERE prod_id='$prod_id' AND user_id='$user_id' ";
            $update_query_run = mysqli_query($conn, $update_query);
            if ($update_query_run) {
                redirect('cart.php', 'Quantity Update Successfully');
            } else {
                redirect('cart.php', 'Something Went Wrong2');
            }
        }
    } else if (isset($_POST['delete'])) {

        $cart_id = $_POST['cart_id'];
        // $prod_id = $_POST['prod_id'];

        $user_id = $_SESSION['auth_user']['user_id'];

        $chk_existing_cart = "SELECT * FROM carts WHERE id='$cart_id' AND user_id='$user_id' ";
        $chk_existing_cart_run = mysqli_query($conn, $chk_existing_cart);

        if (mysqli_num_rows($chk_existing_cart_run) > 0) {
            $delete_query = "DELETE FROM carts WHERE id='$cart_id' ";
            $delete_query_run = mysqli_query($conn, $delete_query);
            if ($delete_query_run) {
                redirect('cart.php', 'Product Remove Successfully');
            } else {
                redirect('cart.php', 'something went wrong3');
            }
            redirect('cart.php', 'something went wrong4');
        }
    } else {
        redirect('product-view.php?product=' . $product, 'Something Went Wrong5');
    }
} else {
    redirect("login.php", 'Login To Continue');
}
